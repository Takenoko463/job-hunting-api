<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobHuntingStatus extends Model
{
    use HasFactory;

    // 登録・更新可能なカラムの指定
    protected $fillable = [
        'corporation_id',
        'user_id',
        'priority',
        'way_id',
        'note',
        'status_id',
        'submit',
        'interview1',
        'interview2',
        'interview_last',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function corporation()
    {
        return $this->belongsTo(Corporation::class);
    }
}
