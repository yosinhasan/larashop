<?php

namespace App\Services;

/**
 * Order item service.
 * 
 * @author Yosin Hasan<yosinhasan@gmail.com>
 */
interface OrderItemService extends BaseService {

    function getByOrderId($id);

    function addItems($data);
}
