<?php

namespace App\Services\Impl;

use App\Services\SubscriptionService;

/**
 * Subscription service implementation.
 * 
 * @author Yosin Hasan<yosinhasan@gmail.com>
 * 
 */
final class SubscriptionServiceImpl implements SubscriptionService {

    private $repository;

    public function __construct($repository) {
        if (!$repository instanceof \App\Repositories\SubscriptionRepository) {
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

    public function activate($id, $userId) {
        return $this->repository->activate($id, $userId);
    }

    public function changeActivationStatus($id, $userId, $isActivated) {
        return $this->changeActivationStatus($id, $userId, $isActivated);
    }

    public function deactivate($id, $userId) {
        return $this->repository->deactivate($id, $userId);
    }

    public function getByUserId($id, $userId) {
        return $this->repository->getByUserId($id, $userId);
    }

    public function getSubscriptionsByNextOrderDate($date) {
        return $this->repository->getSubscriptionsByNextOrderDate($date);
    }

    public function getSubscriptionsByNextOrderDateOrStartDate($date) {
        return $this->repository->getSubscriptionsByNextOrderDateOrStartDate($date);
    }

    public function updateSubscriptionsNextOrderDateByCurrentDate() {
        return $this->repository->updateSubscriptionsNextOrderDateByCurrentDate();
    }

    public function updateSubscriptionsNextOrderDateByDate($date) {
        return $this->repository->updateSubscriptionsNextOrderDateByDate($date);
    }

}
