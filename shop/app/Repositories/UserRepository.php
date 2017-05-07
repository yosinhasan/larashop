<?php

namespace App\Repositories;

/**
 * User repository.
 * 
 * @author Yosin Hasan<yosinhasan@gmail.com>
 * 
 */
interface UserRepository extends BaseRepository {

    function getUsersByPaidOrderAmount($minPaidOrderAmount, $statusId);

    function getUsersWithActiveSubscriptionAndPaidOrderAmount($minPaidOrderAmount, $statusId);

    function getUsersWithInactiveSubscriptionByOrderStatusId($orderStatusId);
}
