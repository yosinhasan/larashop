<?php

namespace App\Repositories\Impl;

use App\Repositories\UserRepository;

/**
 * Abstract user repository.
 * 
 * @author Yosin Hasan<yosinhasan@gmail.com>
 * 
 */
abstract class AbstractUserRepository extends AbstractBaseRepository implements UserRepository {

    public function getUsersByPaidOrderAmount($minPaidOrderAmount, $statusId) {
        throw new Exception("method is not implemented");
    }

    public function getUsersWithActiveSubscriptionAndPaidOrderAmount($minPaidOrderAmount, $statusId) {
        throw new Exception("method is not implemented");
    }

    public function getUsersWithInactiveSubscriptionByOrderStatusId($orderStatusId) {
        throw new Exception("method is not implemented");
    }

}
