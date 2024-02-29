<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class WelcomeNotification extends Notification implements ShouldQueue
{
    use Queueable;

     private $details;

    /**
     * Create a new notification instance.
     */
    public function __construct($details)
    {
        $this->details=$details;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via( $notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail($notifiable)
    {
        $resetLink = url('/login');

        return (new MailMessage)
            ->subject('Welcome to Laravel!')
            ->greeting('Hello!')
            ->line('Thank you for joining Laravel.')
            ->line('Below are your login details:')
            ->line('Registered Email: ' . $notifiable->email)
            ->line('Password: ' . $this->details['password'])
            ->line('For logging in, click the button below:')
            ->action('Login', $resetLink)
            ->salutation('Regards, Laravel Team');
    }
    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            //
        ];
    }
}
