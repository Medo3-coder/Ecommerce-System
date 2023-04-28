<?php

namespace App\Traits;

trait NotificationMessageTrait
{

    public function getTitle(string $type, $local = 'ar')
    {
        return trans('notification.title_' . $type, [], $local);
    }

    public function getBody(array $notification_data, $local = 'ar')
    {
        if ('admin_notify' == $notification_data['type']) {
            return $notification_data['body_' . $local]; //! check dashboard input name
        } else {
            return $this->transTypeToBody($notification_data, $local);
        }
    }

    private function transTypeToBody($notification_data, $local)
    {
        $transData = [];
        if (isset($notification_data['order_num'])) {
            $transData['order_num'] = $notification_data['order_num'];
        }

        if (isset($notification_data['amount'])) {
            $transData['amount'] = $notification_data['amount'];
        }

        $msg = trans('notification.body_' . $notification_data['type'], $transData, $local);
        return $msg;
    }

}
