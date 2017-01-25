<?php

namespace AppBundle\Controller;


use AppBundle\Beans\NotificationBean;
use AppBundle\Services\SendEmailService;
use AppBundle\Services\SendSMSService;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class NotificationController extends Controller
{
    public function sendNotificationAction($type, NotificationBean $notificationData)
    {
        switch ($type) {
            case "email":
                $notification = new SendEmailService();
                break;
            case "sms":
                $notification = new SendSMSService();
                break;
            default:
                return false;
                break;
        }

        $notification->sendNotification($notificationData);
    }
}