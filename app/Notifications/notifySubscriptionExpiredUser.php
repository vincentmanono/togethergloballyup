<?php

namespace App\Notifications;

use App\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class notifySubscriptionExpiredUser extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public $user ;
    public function __construct( $user)
    {
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
        $user =  $this->user ;
        return (new MailMessage)
                    ->error()
                    ->greeting("Dear ". $user->firstName )
                    ->subject("Renew Subscription")
                    ->line('Your Previous Subscription to use our services as Ended')
                    ->line("Please renew your subscription again with KSH 100 Only to continue enjoying our services "  )
                    ->action('Please new Subscription', url(route('profile.index')))
                    ->line('Thank you for using '. config('app.name') . ' .' );
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
