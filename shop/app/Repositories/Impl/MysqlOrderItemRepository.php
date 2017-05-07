<?php

namespace App\Repositories\Impl;

use App\Models\OrderItem;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

/**
 * Mysql order item repository implementation.
 * 
 * @author Yosin Hasan<yosinhasan@gmail.com>
 * 
 */
final class MysqlOrderItemRepository extends AbstractBaseRepository implements \App\Repositories\OrderItemRepository {

    public function create($data) {
        $item = new OrderItem();
        $item->order_id = $data->get('order_id');
        $item->item_id = $data->get('item_id');
        $item->price = $data->get('price');
        $item->amount = $data->get('amount');
        $item->save();
        return $item;
    }

    public function readAll($limit = null) {
        return OrderItem::all();
    }

    public function getByOrderId($id) {
        return OrderItem::join('items', 'order_items.item_id', '=', 'items.id')
                        ->select('order_items.*', 'items.name')
                        ->where('order_items.order_id', $id)
                        ->get();
    }

    public function addItems($data) {
        return OrderItem::insert($data);
    }

}
