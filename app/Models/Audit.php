<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class Audit extends Model
{
    use HasFactory, Sortable;
    protected $fillable = [
        'outcome',
        'notes',
        'customer_name',
        'customer_phone',
        'record_id',
        'recording_link',
        'recording_duration',
        'user_id',
        'percentage',
        'call_date',
    ];
    protected $table = 'evaluations';
    public $sortable = ['user_id','percentage','campaign_id','call_date','recording_duration'];
    public function user()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }

}
