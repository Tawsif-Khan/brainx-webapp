<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Action extends Model
{
    use HasFactory;

    
    public function sender(){
        return $this->belongsTo(User::class, 'sender_id');
    }

    public function message(){
        return $this->hasOne(Message::class, 'action_id');
    }

    public function job(){
        return $this->belongsTo(Job::class, 'job_id','job_id');
    }

    public function projectRequest(){
        return $this->hasOne(ProjectRequest::class,'action_id','id');
    }

    protected $fillable = [
        'job_id',
        'sender_id',
        'action_type',
        'receiver_id'

    ];
}
