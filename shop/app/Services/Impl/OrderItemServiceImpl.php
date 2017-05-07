<?php

namespace App\Services\Impl;

use App\Services\OrderItemService;

/**
 * Order item service implementation.
 * 
 * @author Yosin Hasan<yosinhasan@gmail.com>
 * 
 */
final class OrderItemServiceImpl implements OrderItemService {

    private $repository;

    public function __construct($repository) {
        if (!$repository instanceof \App\Repositories\OrderItemRepository) {
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

    public function getByOrderId($id) {
        return $this->repository->getByOrderId($id);
    }

    public function addItems($data) {
        return $this->repository->addItems($data);
    }

}
