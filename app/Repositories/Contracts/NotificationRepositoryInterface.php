<?php

namespace App\Repositories\Contracts;

interface NotificationRepositoryInterface
{
    public function getPushNotifications($userId);
}
