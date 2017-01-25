<?php

namespace AppBundle\Services;

use AppBundle\Beans\NotificationBean;
use Symfony\Component\EventDispatcher\Tests\Service;

class BaseService extends Service
{
    protected $data;

    public function setData(NotificationBean $data)
    {
        $this->data = $data;
    }
}