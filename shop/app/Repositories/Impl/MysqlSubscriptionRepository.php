<?php

namespace App\Repositories\Impl;

use App\Models\Subscription;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

/**
 * Mysql subscription repository implementation.
 * 
 * @author Yosin Hasan<yosinhasan@gmail.com>
 * 
 */
final class MysqlSubscriptionRepository extends AbstractSubscriptionRepository {

    public function create($data) {
        $item = new Subscription();
        $item->user_id = $data->user_id;
        $item->start_date = $data->get('start_date');
        $item->next_order_date = $data->next_order_date;
        $item->day_iteration = $data->get('day_iteration');
        $item->activated_at = $data->activated_at;
        $item->save();
        return $item;
    }

    public function read($id) {
        $id = (int) $id;
        if ($id < 0) {
            return null;
        }
        return Subscription::findOrFail($id);
    }

    public function update($data, $id) {
        $item = $this->read($id);
        $item->user_id = $data->user_id;
        $item->start_date = $data->get('start_date');
        $item->next_order_date = $data->next_order_date;
        $item->day_iteration = $data->get('day_iteration');
        $item->activated_at = $data->activated_at;
        return $item->save();
    }

    public function delete($id) {
        $id = (int) $id;
        if ($id < 0) {
            return false;
        }
        return Subscription::destroy($id);
    }

    public function readAll($limit = null) {
        return Subscription::all();
    }

    public function getAllByUserId($id) {
        return Subscription::where('user_id', '=', $id)->get();
    }

    public function activate($id, $userId) {
        return $this->changeActivationStatus($id, $userId, true);
    }

    public function deactivate($id, $userId) {
        return $this->changeActivationStatus($id, $userId);
    }

    public function getByUserId($id, $userId) {
        return Subscription::where('id', '=', $id)->where('user_id', '=', $userId)->get();
    }

    public function changeActivationStatus($id, $userId, $isActivated = false) {
        $time = null;
        if ($isActivated) {
            $time = Carbon::now();
        }
        return Subscription::where('id', '=', $id)->where('user_id', '=', $userId)->update(['activated_at' => $time]);
    }

    public function getSubscriptionsByNextOrderDate($date) {
        return Subscription::join('subscription_items', 'subscriptions.id', '=', 'subscription_items.subscription_id')
                        ->join('items', 'subscription_items.item_id', '=', 'items.id')
                        ->select('subscriptions.*', DB::raw('SUM(items.price*subscription_items.amount) as total'))
                        ->where('subscriptions.next_order_date', '=', $date)
                        ->whereNotNull('subscriptions.activated_at')
                        ->groupBy('subscriptions.id')
                        ->get();
    }

    public function getSubscriptionsByNextOrderDateOrStartDate($date) {
        return Subscription::join('subscription_items', 'subscriptions.id', '=', 'subscription_items.subscription_id')
                        ->join('items', 'subscription_items.item_id', '=', 'items.id')
                        ->select('subscriptions.*', DB::raw('SUM(items.price*subscription_items.amount) as total'))
                        ->whereNotNull('subscriptions.activated_at')
                        ->where(function($query) use($date) {
                            $query->where('subscriptions.next_order_date', '=', $date)
                            ->orWhere('start_date', '=', $date);
                        })
                        ->groupBy('subscriptions.id')
                        ->get();
    }

    public function updateSubscriptionsNextOrderDateByDate($date) {
        return Subscription::where('next_order_date', '=', $date)
                        ->update(['next_order_date' => DB::raw('DATE_ADD(next_order_date, interval day_iteration day)')]);
    }

    public function updateSubscriptionsNextOrderDateByCurrentDate() {
        return Subscription::where('next_order_date', '=', DB::raw('CURDATE()'))
                        ->update(['next_order_date' => DB::raw('DATE_ADD(next_order_date, interval day_iteration day)')]);
    }

}
