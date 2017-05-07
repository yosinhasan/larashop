<?php

namespace App\Repositories\Impl;

use App\Models\Order;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

/**
 * Mysql order repository implementation.
 * 
 * @author Yosin Hasan<yosinhasan@gmail.com>
 * 
 */
final class MysqlOrderRepository extends AbstractOrderRepository {

    public function create($data) {
        $item = new Order();
        $item->user_id = $data->user_id;
        $item->subscription_id = $data->get('subscription_id');
        $item->total = $data->total;
        $item->paid_at = $data->get('paid_at');
        $item->created_at = Carbon::now();
        $item->save();
        return $item;
    }

    public function read($id) {
        $id = (int) $id;
        if ($id < 0) {
            return null;
        }
        return Order::findOrFail($id);
    }

    public function update($data, $id) {
        $item = $this->read($id);
        $item->status_id = $data->get('status_id');
        return $item->save();
    }

    public function delete($id) {
        $id = (int) $id;
        if ($id < 0) {
            return false;
        }
        return Order::destroy($id);
    }

    public function readAll($limit = null) {
        return Order::join('order_status', 'order_status.id', '=', 'orders.status_id')
                        ->select('orders.*', 'order_status.name')
                        ->get();
    }

    public function getAllByUserId($id) {
        return Order::join('order_status', 'order_status.id', '=', 'orders.status_id')
                        ->select('orders.*', 'order_status.name')
                        ->where('orders.user_id', '=', $id)->orderBy('orders.created_at', 'desc')->get();
    }

    public function addOrders($data) {
        return Order::insert($data);
    }

    public function getUsersLastPaidOrder() {
        return Order::max('paid_at')->groupBy('user_id')->get();
    }

    public function getAllByUserIdAndOrderStatus($userId, $statusId) {
        return Order::join('order_status', 'order_status.id', '=', 'orders.status_id')
                        ->select('orders.*', 'order_status.name')
                        ->where('orders.user_id', '=', $userId)
                        ->where('orders.status_id', '=', $statusId)
                        ->orderBy('orders.created_at', 'desc')->get();
    }

    public function readAllByOrderStatus($id) {
        return Order::join('order_status', 'order_status.id', '=', 'orders.status_id')
                        ->select('orders.*', 'order_status.name')
                        ->where('orders.status_id', '=', $id)
                        ->orderBy('orders.created_at', 'desc')->get();
    }

}
