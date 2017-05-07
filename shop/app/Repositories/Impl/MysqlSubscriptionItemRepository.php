<?php

namespace App\Repositories\Impl;

use App\Models\SubscriptionItem;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

/**
 * Mysql subscription item repository implementation.
 * 
 * @author Yosin Hasan<yosinhasan@gmail.com>
 * 
 */
final class MysqlSubscriptionItemRepository extends AbstractBaseRepository implements \App\Repositories\SubscriptionItemRepository {

    public function create($data) {
        $item = new SubscriptionItem();
        $item->subscription_id = $data->get('subscription_id');
        $item->item_id = $data->get('item_id');
        $item->amount = $data->get('amount');
        $item->save();
        return $item;
    }

    public function read($id) {
        $id = (int) $id;
        if ($id < 0) {
            return null;
        }
        return SubscriptionItem::findOrFail($id);
    }

    public function readAll($limit = null) {
        return SubscriptionItem::all();
    }

    public function getBySubscriptionId($id) {
        return SubscriptionItem::join('items', 'subscription_items.item_id', '=', 'items.id')
                        ->select('subscription_items.*', 'items.name', 'items.price')
                        ->where('subscription_items.subscription_id', $id)
                        ->get();
    }

    public function addItems($data) {
        return SubscriptionItem::insert($data);
    }

}
