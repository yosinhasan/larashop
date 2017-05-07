<?php

namespace App\Services\Impl;

use App\Services\SubscriptionItemService;

/**
 * Subscription item service implementation.
 * 
 * @author Yosin Hasan<yosinhasan@gmail.com>
 * 
 */
final class SubscriptionItemServiceImpl implements SubscriptionItemService {

    private $repository;

    public function __construct($repository) {
        if (!$repository instanceof \App\Repositories\SubscriptionItemRepository) {
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

    public function getBySubscriptionId($id) {
        return $this->repository->getBySubscriptionId($id);
    }

    public function addItems($data) {
        return $this->repository->addItems($data);
    }

}
