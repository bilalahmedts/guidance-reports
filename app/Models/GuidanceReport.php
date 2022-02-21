<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GuidanceReport extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id', 'categories_id', 'transfer_per_day', 'call_per_day', 'rea_sign_up', 
        'tbd_assigned', 'no_of_matches', 'leads', 'conversations', 'inbound'];
    protected $table = 'stats';
}