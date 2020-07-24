<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class VotingNotification extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public $chama , $user ;
    public function __construct( $chama,$user)
    {
        $this->chama = $chama ;
        $this->user = $user ;
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
        $chama= $this->chama ;
        $user = $this->user ;
        return (new MailMessage)
                    ->subject('Voting notification')
                    ->line('You can vote.')
                    ->greeting('Hello' , $user->firstName  )
                    ->line('This is to notify you that you can cast your vote for '. $chama->name )
                    ->action('Click  to vote', url(route('user.chama.subscribed.single',$chama->id)))
                    ->line('Thank you for being with us!');
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
