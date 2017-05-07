<?php

namespace App\Repositories\Impl;

use App\Models\Delivery;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

/**
 * Mysql delivery repository implementation.
 * 
 * @author Yosin Hasan<yosinhasan@gmail.com>
 * 
 */
final class MysqlDeliveryRepository extends AbstractDeliveryRepository {

    public function create($data) {
        $item = new Delivery();
        $item->order_id = $data->get('id');
        $item->sent_at = $data->get('sent_at');
        $item->created_at = Carbon::now();
        $item->save();
        return $item;
    }

    public function read($id) {
        $id = (int) $id;
        if ($id < 0) {
            return null;
        }
        return Delivery::findOrFail($id);
    }

    public function update($data, $id) {
        $item = $this->read($id);
        $item->order_id = $data->get('order_id');
        $item->sent_at = $data->get('sent_at');
        return $item->save();
    }

    public function delete($id) {
        $id = (int) $id;
        if ($id < 0) {
            return false;
        }
        return Delivery::destroy($id);
    }

    public function readAll($limit = null) {
        return Delivery::join('orders', 'orders.id', '=', 'deliveries.order_id')
                ->join('users', 'users.id', '=', 'orders.user_id')
                ->select('deliveries.*', 'orders.total', 'orders.user_id', 'users.name', 'users.email')
                ->get();
    }

    public function getAllByUserId($userId) {
//        DB::enableQueryLog();
        $items = Delivery::join('orders', 'orders.id', '=', 'deliveries.order_id')
                ->select('deliveries.*', 'orders.total', 'orders.user_id')
                ->where('orders.user_id', '=', $userId)
                ->get();
//        dd(DB::getQueryLog());
        return $items;
    }

}
