<?php

namespace App\Repositories;

/**
 * Delivery repository.
 * 
 * @author Yosin Hasan<yosinhasan@gmail.com>
 * 
 */
interface DeliveryRepository extends BaseRepository {
 
    function getAllByUserId($userId);
        
}
