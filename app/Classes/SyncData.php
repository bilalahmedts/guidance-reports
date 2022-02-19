<?php

namespace App\Classes;

use App\Models\User;
use App\Models\Campaign;
use App\Models\Designation;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

use Illuminate\Support\Facades\Http;

class SyncData
{
    public function campaign()
    {
        $response = Http::get('https://api.touchstoneleads.com/MyService.svc/GetCampaignList?Accesskey=4321Touch1234')->body();

        $response = json_decode($response, true);

        if ($response["isInserted"]) {
            $hrms_campaigns = json_decode($response["DataList"]);
        }

        if (count($hrms_campaigns) > 0) {
            foreach ($hrms_campaigns as $hrms_campaign) {
                if ($hrms_campaign->CampaignID > 1) {
                    $campaign = Campaign::where('hrms_id', $hrms_campaign->CampaignID)->first();

                    if (!$campaign) {
                        $campaign = new Campaign;
                    }

                    $campaign->hrms_id = $hrms_campaign->CampaignID;
                    $campaign->name = $hrms_campaign->CampaignName;
                    $campaign->status = ($hrms_campaign->Active) ? 1 : 0;

                    $campaign->save();
                }
            }
        }
    }
    public function designations()
    {

        $response = Http::get('https://api.touchstoneleads.com/MyService.svc/GetDesignationsList?Accesskey=4321Touch1234')->body();

        $response = json_decode($response, true);

        if ($response["isInserted"]) {
            $hrms_designations = json_decode($response["DataList"]);
        }

        if (count($hrms_designations) > 0) {
            foreach ($hrms_designations as $hrms_designation) {
                if ($hrms_designation->DesignationID > 1) {
                    $designation = Designation::where('hrms_id', $hrms_designation->DesignationID)->first();

                    if (!$designation) {
                        $designation = new Designation;
                    }

                    $designation->hrms_id = $hrms_designation->DesignationID;
                    $designation->name = $hrms_designation->Designation;
                    $designation->status = ($hrms_designation->Active) ? 1 : 0;

                    $designation->save();
                }
            }
        }
    }


    public function users()
    {

        $response = Http::get('https://api.touchstoneleads.com/MyService.svc/GetEmployeeList?Accesskey=4321Touch1234')->body();

        $response = json_decode($response, true);

        if ($response["isInserted"]) {
            $hrms_users = json_decode($response["DataList"]);
        }

        if (count($hrms_users) > 0) {
            foreach ($hrms_users as $hrms_user) {
                $user = User::where('hrms_id', $hrms_user->ID)->first();

                if ($user) {
                    if ($this->checkEmail($user, $hrms_user->EmailAddress)) {
                        $this->updateUser($hrms_user, $user);
                    }
                } else {
                    if ($this->checkEmail($user, $hrms_user->EmailAddress)) {
                        $this->addUser($hrms_user);
                    }
                }
            }
        }
    }

    public function updateUser($hrms_user, $user)
    {
        $user->name = $hrms_user->Name;

        $user->email = $hrms_user->EmailAddress;

        $user->password = Hash::make($hrms_user->Password);

        $user->status = ($hrms_user->Active) ? 1 : 0;

        $user->save();
    }

    public function addUser($hrms_user)
    {
        $user = new User;
        $user->hrms_id = $hrms_user->ID;
        $user->name = $hrms_user->Name;
        $user->email = $hrms_user->EmailAddress;
        $user->password = Hash::make($hrms_user->Password);
        $user->status = ($hrms_user->Active) ? 1 : 0;
        $user->save();
    }
    public function checkEmail($user, $new_email){

        $user_id = 0;
        if($user == false){
            $old_email = $new_email;
        }
        else{
            $user_id = $user->id;
            $old_email = $user->email;
        }

        $email_counts = User::where('email', $old_email)->where('id', '!=', $user_id)->count();

        if($email_counts == 0){
            return true;
        }
        return false;
    }

}
