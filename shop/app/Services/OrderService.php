<?php

namespace App\Services;

/**
 * Order service.
 * 
 * @author Yosin Hasan<yosinhasan@gmail.com>
 */
interface OrderService extends BaseService {

    function getAllByUserId($id);

    function addOrders($data);

    function getUsersLastPaidOrder();

    function readAllByOrderStatus($id);

    function getAllByUserIdAndOrderStatus($userId, $statusId);
}
