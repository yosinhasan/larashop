<?php

namespace App\Services\Impl;

use App\Services\OrderService;

/**
 * Order service implementation.
 * 
 * @author Yosin Hasan<yosinhasan@gmail.com>
 * 
 */
final class OrderServiceImpl implements OrderService {

    private $repository;

    public function __construct($repository) {
        if (!$repository instanceof \App\Repositories\OrderRepository) {
            throw new \Exception("Given repository instance has incorrect type");
        }
        $this->repository = $repository;
    }

    public function create($data) {
        return $this->repository->create($data);
    }

    public function read($id) {
        return $this->repository->read($id);
    }

    public function update($data, $id) {
        return $this->repository->update($data, $id);
    }

    public function delete($id) {
        return $this->repository->delete($id);
    }

    public function readAll($limit = null) {
        return $this->repository->readAll($limit);
    }

    public function getAllByUserId($id) {
        return $this->repository->getAllByUserId($id);
    }

    public function addOrders($data) {
        return $this->repository->addOrders($data);
    }

    public function getUsersLastPaidOrder() {
        return $this->repository->getUsersLastPaidOrder();
    }

    public function getAllByUserIdAndOrderStatus($userId, $statusId) {
        return $this->repository->getAllByUserIdAndOrderStatus($userId, $statusId);
    }

    public function readAllByOrderStatus($id) {
        return $this->repository->readAllByOrderStatus($id);
    }

}
