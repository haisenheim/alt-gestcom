<?php

namespace App\Repositories;
use App\User;
use App\Models\UserNotification;
use App\Repositories\Contracts\NotificationRepositoryInterface;

class NotificationResponsitory implements NotificationRepositoryInterface
{
    public function getPushNotifications($userId)
    {
        try {
            return UserNotification::where('userId', $userId)
                ->where('status', config('custom.notification_status.not_seen'))
                ->where(function ($query) {
                    $query->where('expire_status', config('custom.notification_expire_status.default'))
                          ->orwhere('expire_status', config('custom.notification_expire_status.not_expired'));
                })
                ->select('*')
                ->get();

        }  catch (\Exception $e) {
            throw new \Exception($e);
        } 
    }
}
