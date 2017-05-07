<?php

namespace App\Repositories\Impl;

/**
 * Abstract order repository.
 * 
 * @author Yosin Hasan<yosinhasan@gmail.com>
 * 
 */
abstract class AbstractOrderRepository extends AbstractBaseRepository implements \App\Repositories\OrderRepository {

    public function getAllByUserId($id) {
        throw new Exception("method is not implemented");
    }

    public function addOrders($data) {
        throw new Exception("method is not implemented");
    }

    public function getUsersLastPaidOrder() {
        throw new Exception("method is not implemented");
    }

    public function readAllByOrderStatus($id) {
        throw new Exception("method is not implemented");
    }

    public function getAllByUserIdAndOrderStatus($userId, $statusId) {
        throw new Exception("method is not implemented");
    }

}
