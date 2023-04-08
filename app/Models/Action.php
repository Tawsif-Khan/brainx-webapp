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

    protected $fillable = [
        'job_id',
        'sender_id',
        'action_type'

    ];
}
