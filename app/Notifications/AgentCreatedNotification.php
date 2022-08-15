<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class AgentCreatedNotification extends Notification implements ShouldQueue
{
    use Queueable;
    private array $agentData;


    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(array $agentData)
    {
        $this->agentData = $agentData;

    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        $data = $this->agentData;

        return (new MailMessage)
        ->greeting('Hello')
        ->line($data['body'])
        ->action('Reset Password',$data['url'])
        ->line($data['thankyou']);
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
