<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AnswerNotification extends Model
{
    use HasFactory;
    const UPDATED_AT = null;

    public function user() 
    {
        return $this->belongsTo(User::class);
    }
    public function answer()
    {
        return $this->belongsTo(Answer::class);
    }
    public function reply()
    {
        return $this->belongsTo(Reply::class);
    }
    
    protected $fillable = [
        'user_id',
        'answer_id',
    ];
}
