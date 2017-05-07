<?php

namespace App\Services;

/**
 * User service.
 * 
 * @author Yosin Hasan<yosinhasan@gmail.com>
 * 
 */
interface UserService extends BaseService {

    function getUsersByPaidOrderAmount($minPaidOrderAmount, $statusId);

    function getUsersWithActiveSubscriptionAndPaidOrderAmount($minPaidOrderAmount, $statusId);

    function getUsersWithInactiveSubscriptionByOrderStatusId($orderStatusId);
}
