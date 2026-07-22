<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;

class StudentAddedNotification extends Notification
{
    use Queueable;

    public $student;

    public function __construct($student)
    {
        $this->student = $student;
    }

    public function via($notifiable)
    {
        return ['database'];
    }

    public function toDatabase($notifiable)
    {
        return [
            'title' => 'New Student Registered',
            'message' => $this->student->name . ' has been registered.',
            'type' => 'student',
        ];
    }
}