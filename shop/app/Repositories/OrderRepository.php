<?php

namespace App\Repositories;

/**
 * Order repository.
 * 
 * @author Yosin Hasan<yosinhasan@gmail.com>
 */
interface OrderRepository extends BaseRepository {

    function getAllByUserId($id);

    function addOrders($data);

    function getUsersLastPaidOrder();

    function readAllByOrderStatus($id);

    function getAllByUserIdAndOrderStatus($userId, $statusId);
}
