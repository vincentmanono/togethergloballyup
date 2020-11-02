<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class UserWon extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public $chama, $user;
    public function __construct($chama, $user)
    {
        $this->chama = $chama;
        $this->user = $user;
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
        $chama = $this->chama ;
        $user =  $this->user ;
        return (new MailMessage)
            ->subject('Voting notification')
            ->line('This is to notify you that a member of your chama won the voting')
            ->line('Voting panel is now closed')
            ->line("Next Voting will take place on ".  date('l jS M Y, h:i a', strtotime($chama->nextVote)))
            ->greeting('Dear ' . $user->name)
            ->action('Confirm the Winner', url(route('admin.chama.show',$chama->id)))
            ->line('Thank you for using our application!');
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
