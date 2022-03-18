<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class GuidanceReport extends Model
{
    use HasFactory, Sortable;
    protected $fillable = [
        'user_id', 'categories_id', 'transfer_per_day', 'call_per_day', 'rea_sign_up', 
        'tbd_assigned', 'no_of_matches', 'leads', 'conversations', 'created_at'];
    protected $table = 'stats';

    public function user()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }
    public function category()
    {
        return $this->hasOne(Category::class, 'id', 'categories_id');
    }


}
