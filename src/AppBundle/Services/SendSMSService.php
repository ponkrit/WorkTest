<?php

namespace AppBundle\Services;


use AppBundle\Beans\NotificationBean;
use ScayTrase\SmsDeliveryBundle\Service\ShortMessageInterface;

class SendMessage implements ShortMessageInterface {
    public function getBody() { }

    public function getRecipient() { }

    public function setRecipient($recipient) { }
}

class SendSMSService extends BaseService
{
    /**
     * @param NotificationBean $notificationData
     * @return bool
     */
    public function sendNotification(NotificationBean $notificationData)
    {
        $this->setData($notificationData);

        $message = new SendMessage($this->data->to, $this->data->message);
        $sender = $this->get('sms_delivery.sender');
        $sender->spoolMessage($message);
        $result = $sender->flush();

        return $result;
    }
}