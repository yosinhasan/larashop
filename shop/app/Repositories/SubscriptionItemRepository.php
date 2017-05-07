<?php

namespace App\Repositories;

/**
 * Subscription item repository.
 * 
 * @author Yosin Hasan<yosinhasan@gmail.com>
 */
interface SubscriptionItemRepository extends BaseRepository {

    function getBySubscriptionId($id);

    public function addItems($data);
}
