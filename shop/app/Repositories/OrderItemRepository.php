<?php

namespace App\Repositories;

/**
 * Order item repository.
 * 
 * @author Yosin Hasan<yosinhasan@gmail.com>
 */
interface OrderItemRepository extends BaseRepository {

    function getByOrderId($id);

    function addItems($data);
}
