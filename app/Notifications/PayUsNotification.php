<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class PayUsNotification extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public $user ,$chama,$wepaid ;
    public function __construct($user,$chama,$wepaid)
    {
        $this->user = $user ;
        $this->chama = $chama ;
        $this->wepaid = $wepaid ;
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
        $user = $this->user ;
        $chama = $this->chama ;
        return (new MailMessage)
                    ->error()
                    ->subject('Pay us')
                    ->line('This is to notify you that the Togethergloballyup payed for you ')
                    ->line('We paid for winner of '. $this->chama->name)
                    ->line("Amount you should pay us Ksh ". intval( $this->wepaid))
                    ->action('Deposite on wallet', url(route('user.chama.subscribed.single',$chama->id)))
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
