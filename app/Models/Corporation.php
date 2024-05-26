<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Corporation extends Model
{
    use HasFactory;
    
    public function job_hunting_statuses(){
        return $this->hasMany(JobHuntingStatus::class);
    }

    protected $fillable = [
        'name',
        'address',
        'home_page'
    ];
}
