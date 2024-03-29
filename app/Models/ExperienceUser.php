<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ExperienceUser extends Model
{
    use HasFactory;
    use SoftDeletes;

    public $table = 'experience_user';

    protected $dates = [
        'updated_at',
        'deleted_at',
        'created_at',
    ];  

    protected $fillable = [
        'detail_user_id',
        'experience',
        'updated_at',
        'deleted_at',
        'created_at',
    ];

    public function detail_user(){
        return $this->belongsTo('App\Models\DetailUser', 'detail_user_id', 'id');
    }

    public function service(){
        return $this->belongsTo('App\Models\Service', 'service_id', 'id');
    }
}
