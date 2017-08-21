<?php

namespace Illuminate\Auth\Notifications;

use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\MailMessage;

class ResetPassword extends Notification
{
    /**
     * The password reset token.
     *
     * @var string
     */
    public $token;

    /**
     * Create a notification instance.
     *
     * @param  string  $token
     * @return void
     */
    public function __construct($token)
    {
        $this->token = $token;
    }

    /**
     * Get the notification's channels.
     *
     * @param  mixed  $notifiable
     * @return array|string
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Build the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->greeting('Përshëndetje!')
            ->subject('Rivendos Fjalëkalimin')
            ->line('Klikoni butonin më poshtë për të rivendosur fjalkalimin tuaj.')
            ->action('Rivendos Fjalëkalimin', url(config('app.url:8000').route('password.reset', $this->token, false)))
            ->line('Nëse nuk keni bërë kërkesë për rivendosje të passwordit , atëherë nuk kërkohen veprime të mëtutjeshme nga ana juaj.');
    }
}
