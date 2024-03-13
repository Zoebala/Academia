<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Messages\NexmoMessage;

class SmsMessage extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['sms'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toNexmo($notifiable)
    {
        return (new NexmoMessage)
                    //suivi des couts des sms par utilisateur 
                    ->clientReference((string) $notifiable->id) 
                    //contenu du message                  
                    ->content('Bienvenue dans notre site')                    
                    ->from(config("app.name","Academia"));                    
                    
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toShortcode($notifiable)
    {
        return [
            //
            'type'=>'alert',
            'custom'=>[
                'code'=>'ABC123'
            ],

        ];
    }
}
