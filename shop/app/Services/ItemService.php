<?php

namespace App\Services;

/**
 * Item service.
 * 
 * @author Yosin Hasan<yosinhasan@gmail.com>
 * 
 */
interface ItemService extends BaseService {

    function getAllByIds($ids);
}
