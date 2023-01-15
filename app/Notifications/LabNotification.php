<?php

namespace App\Notifications;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use NotificationChannels\Fcm\FcmChannel;
use NotificationChannels\Fcm\FcmMessage;
use NotificationChannels\Fcm\Resources\AndroidConfig;
use NotificationChannels\Fcm\Resources\AndroidFcmOptions;
use NotificationChannels\Fcm\Resources\AndroidNotification;
use NotificationChannels\Fcm\Resources\ApnsConfig;
use NotificationChannels\Fcm\Resources\ApnsFcmOptions;


class LabNotification extends Notification
{
    use Queueable;

    protected $body,$topic,$new,$user;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($body,$topic,$new,$user)
    {
        $this->user = $user;
        $this->body = $body;
        $this->new = $new;
        $this->topic = $topic;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return [FcmChannel::class,'database'];
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
                    ->line('The introduction to the notification.')
                    ->action('Notification Action', url('/'))
                    ->line('Thank you for using our application!');
    }

    /**
     * @param $notifiable
     * @return array
     */
    public function toDatabase($notifiable)
    {
        return [
            'title' => $this->new->title,
            'body' => $this->user->name .'-'. $this->body .'-'. $this->new->title,[
                'user' => $this->user->name,
                'new' => $this->new->title
            ],
            'icon' => $this->user->image,
            'url' => route('dashboard.laboratories.news.edit',$this->new->id),
        ];

        /*return [
            'title' => $this->title,
            'body' => $this->body,
            'icon' => $this->user->image,
            'url' => $this->url,
            'topic' => $this->topic
        ];*/
    }

    /**
     * @param $notifiable
     * @return FcmMessage
     */
    public function toFcm($notifiable)
    {
        return FcmMessage::create()
            ->setData([
                'user' => $this->user->name,
                'topic' => $this->topic,
                'title' => $this->new->title,
                'body' => $this->user->name .'-'. $this->body .'-'. $this->new->title,
                'image' => $this->user->image,
                //'to' => '/topics/'.$this->topic,
            ])
            /*->setData([
                'user' => $this->user->name_ar,
                'title' => $this->title,
                'body' => $this->body,
                'image' => $this->user->image,
                'url' => $this->url,
                'topic' => $this->topic,
            ])*/
            ->setNotification(\NotificationChannels\Fcm\Resources\Notification::create()
                ->setTitle($this->new->title)
                ->setBody($this->user->name .'-'.$this->body)
                ->setImage($this->user->image))
            ->setTopic($this->topic)
            ->setAndroid(
            AndroidConfig::create()
                    ->setFcmOptions(AndroidFcmOptions::create()->setAnalyticsLabel('analytics'))
                    ->setNotification(AndroidNotification::create()->setColor('#0A0A0A'))
            )->setApns(
                ApnsConfig::create()
                    ->setFcmOptions(ApnsFcmOptions::create()->setAnalyticsLabel('analytics_ios')));
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
