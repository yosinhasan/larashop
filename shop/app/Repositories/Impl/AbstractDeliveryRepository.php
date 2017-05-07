<?php

namespace App\Repositories\Impl;

use App\Repositories\DeliveryRepository;

/**
 * Abstract delivery repository.
 * 
 * @author Yosin Hasan<yosinhasan@gmail.com>
 * 
 */
abstract class AbstractDeliveryRepository extends AbstractBaseRepository implements DeliveryRepository {

    public function getAllByUserId($userId) {
        throw new Exception("method is not implemented");
    }

}
