<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    use HasFactory;
    const UPDATED_AT = null;
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function question()
    {
        return $this->belongsTo(Question::class);
    }
    public function replies()
    {
        return $this->hasMany(Reply::class);
    }
    public function answernotification()
    {
        return $this->hasOne(AnswerNotification::class);
    }
    
    
    protected $fillable = [
        'user_id',
        'question_id',
        'body',
    ];
    
    /*answerモデルが保存されたときにnotificationsテーブルに情報を保存
    protected static function boot()
    {
        parent::boot();
        static::created(function ($answer) {
            $answer->createNotification();
        });
    }
    public function createNotification()
    {
        $notificationData = [
            'user_id' => $this->question->user_id,
            'answer_id' => $this->id,
        ];
        Notification::create($notificationData);
    }*/
}
