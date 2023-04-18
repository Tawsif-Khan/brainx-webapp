<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contract extends Model
{
    use HasFactory;

    // public function job(){
    //     return $this->belongsTo(Job::class);
    // }

    public function milestones(){
        return $this->hasMany(Milestone::class);
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'contract_name',
        'description',
        'contract_type',
        'fixed_price',
        'service_fee',
        'talent_receive',
        'job_id'

    ];
}
