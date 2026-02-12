<?php
namespace App\Notifications;

use App\Models\ApplyPost;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

// Import the ApplyPost model

class JobApplyNotification extends Notification
{
    use Queueable;

    public $application;

    /**
     * Create a new notification instance.
     *
     * @param ApplyPost $application
     * @return void
     */
    public function __construct(ApplyPost $application)
    {
        $this->application = $application;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail', 'database']; // Send via both mail and database channels
    }

    /**
     * Get the array representation of the notification to store in the database.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            'name'    => $this->application->name,
            'message' => 'A new application has been submitted.', // You can customize the message
            'subject' => 'New Job Application',                   // Fallback subject
        ];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
            ->line('A new application has been submitted.')
            ->action('Notification Action', url('/'))
            ->line('Thank you for using our application!');
    }
}
