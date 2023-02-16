<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class DefaultNotification extends Notification implements ShouldQueue
{
    use Queueable;
    private $_request;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        $this->_request = $data;
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
        if(count($this->_request['data']) > 0)
        {
            if(isset($this->_request['data']['attachment']) && isset($this->_request['data']['filename']) && isset($this->_request['data']['filetype']))
            {
                return (new MailMessage)
                ->view('emails.'.$this->_request['view'], ['info' => $this->_request['data']])
                ->subject($this->_request['data']['subject'])
                ->attach($this->_request['data']['attachment'], ['as' => $this->_request['data']['filename'], 'mime' => $this->_request['data']['filetype']]);
            }
            else
            {
                return (new MailMessage)
                ->view('emails.'.$this->_request['view'], ['info' => $this->_request['data']])
                ->subject($this->_request['data']['subject']);
            }

        }

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
