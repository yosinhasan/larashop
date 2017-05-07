<?php

namespace App\Services\Impl;

use App\Services\CartService;

/**
 * User service implementation.
 * 
 * @author Yosin Hasan<yosinhasan@gmail.com>
 * 
 */
final class CartServiceImpl implements CartService {

    private $repository;

    public function __construct($repository) {
        if (!$repository instanceof \App\Repositories\CartRepository) {
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

    public function add($id, $amount) {
        return $this->repository->add($id, $amount);
    }

    public function flush() {
        return $this->repository->flush();
    }

    public function sub($id, $amount) {
        return $this->repository->sub($id, $amount);
    }

}
