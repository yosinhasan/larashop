<?php

namespace App\Repositories\Impl;

/**
 * Abstract subscription repository.
 * 
 * @author Yosin Hasan<yosinhasan@gmail.com>
 * 
 */
abstract class AbstractSubscriptionRepository extends AbstractBaseRepository implements \App\Repositories\SubscriptionRepository {

    public function getAllByUserId($id) {
        throw new Exception("method is not implemented");
    }

    public function getByUserId($id, $userId) {
        throw new Exception("method is not implemented");
    }

    public function deactivate($id, $userId) {
        throw new Exception("method is not implemented");
    }

    public function activate($id, $userId) {
        throw new Exception("method is not implemented");
    }

    public function changeActivationStatus($id, $userId, $isActivated) {
        throw new Exception("method is not implemented");
    }

    public function getSubscriptionsByNextOrderDate($date) {
        throw new Exception("method is not implemented");
    }

    public function getSubscriptionsByNextOrderDateOrStartDate($date) {
        throw new Exception("method is not implemented");
    }

    public function updateSubscriptionsNextOrderDateByDate($date) {
        throw new Exception("method is not implemented");
    }

    public function updateSubscriptionsNextOrderDateByCurrentDate() {
        throw new Exception("method is not implemented");
    }

}
