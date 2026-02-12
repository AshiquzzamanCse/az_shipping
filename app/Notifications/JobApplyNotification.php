<?php
namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class JobApplyNotification extends Notification implements ShouldQueue
{
    use Queueable;

    public $application;

    public function __construct($application)
    {
        $this->application = $application;
    }

    // ✅ Choose notification channels
    public function via($notifiable)
    {
        return ['mail', 'database'];
        // use ['database'] if you don't want email
    }

    // ✅ Email Notification
    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->subject('New Job Application Received')
            ->greeting('Hello Admin,')
            ->line('A new job application has been submitted.')
            ->line('Name: ' . $this->application->name)
            ->line('Email: ' . $this->application->email)
            ->line('Phone: ' . $this->application->phone)
            ->action('View Application', url('/admin/applications/' . $this->application->id))
            ->line('Thank you.');
    }

    // ✅ Database Notification
    public function toDatabase($notifiable)
    {
        return [
            'application_id' => $this->application->id,
            'name'           => $this->application->name,
            'email'          => $this->application->email,
            'job_id'         => $this->application->job_id,
        ];
    }
}
