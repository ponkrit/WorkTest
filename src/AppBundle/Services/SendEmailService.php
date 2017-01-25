<?php

namespace AppBundle\Services;


use AppBundle\Beans\NotificationBean;

class SendEmailService extends BaseService
{
    /**
     * @param NotificationBean $notificationData
     * @return bool
     */
    public function sendNotification(NotificationBean $notificationData)
    {
        $this->setData($notificationData);

        $message = \Swift_Message::newInstance()
            ->setSubject($this->data->title)
            ->setFrom($this->data->from)
            ->setTo($this->data->to)
            ->setBody($this->data->message, 'text/html');
        
        return $this->get('mailer')->send($message);
    }
}