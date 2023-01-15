<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ResetPasswordNotification extends Notification
{
    use Queueable;
    public $token;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($token)
    {
        $this->token = $token;
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
        return (new MailMessage)
            ->greeting('مرحبا بك في بوابة روافد التعليمية')
            ->line('لقد قمنا بإرسال هذه الرسالة لك لأنك قمت بطلب إعادة ضبط كلمة مرورك على تطبيقنا (بوابة روافد التعليمية)') // Here are the lines you can safely override
            ->action('إعادة ضبط كلمة المرور', url('/reset-password', $this->token))
            ->line('إذا لم تقم بطلب إعادة ضبط كلمة المرور، لن يتم تغييرها.')
            ->line('شكراً لك لاستخدامك بوابة روافد التعليمية');
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
