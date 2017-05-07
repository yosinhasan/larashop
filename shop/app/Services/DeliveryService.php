<?php

namespace App\Services;

/**
 * Delivery service.
 * 
 * @author Yosin Hasan<yosinhasan@gmail.com>
 * 
 */
interface DeliveryService extends BaseService {

    function getAllByUserId($userId);
}
