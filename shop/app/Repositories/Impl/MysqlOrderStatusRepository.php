<?php

namespace App\Repositories\Impl;

use App\Models\OrderStatus;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

/**
 * Mysql order status repository implementation.
 * 
 * @author Yosin Hasan<yosinhasan@gmail.com>
 * 
 */
final class MysqlOrderStatusRepository extends AbstractBaseRepository implements \App\Repositories\OrderStatusRepository {

    public function read($id) {
        $id = (int) $id;
        if ($id < 0) {
            return null;
        }
        return OrderStatus::findOrFail($id);
    }

    public function readAll($limit = null) {
        return OrderStatus::all();
    }

}
