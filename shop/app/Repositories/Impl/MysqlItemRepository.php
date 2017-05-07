<?php

namespace App\Repositories\Impl;

use App\Models\Item;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

/**
 * Mysql item repository implementation.
 * 
 * @author Yosin Hasan<yosinhasan@gmail.com>
 * 
 */
final class MysqlItemRepository extends AbstractItemRepository {

    public function create($data) {
        $item = new Item();
        $item->name = $data->get('name');
        $item->price = $data->get('price');
        $item->details = $data->get('details');
        $item->save();
        return $item;
    }

    public function read($id) {
        $id = (int) $id;
        if ($id < 0) {
            return null;
        }
        return Item::findOrFail($id);
    }

    public function update($data, $id) {
        $item = $this->read($id);
        $item->name = $data->get('name');
        $item->price = $data->get('price');
        $item->details = $data->get('details');
        return $item->save();
    }

    public function delete($id) {
        $id = (int) $id;
        if ($id < 0) {
            return false;
        }
        return Item::destroy($id);
    }

    public function readAll($limit = null) {
        return Item::all();
    }

    public function getAllByIds($ids) {
        return Item::whereIn('items.id', $ids)->get();
    }

}
