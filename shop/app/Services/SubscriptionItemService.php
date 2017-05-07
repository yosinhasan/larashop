<?php

namespace App\Services;

/**
 *
 * @author Yosin_Hasan<yosinhasan@gmail.com>
 * 
 */
interface SubscriptionItemService extends BaseService {

    function getBySubscriptionId($id);
}
