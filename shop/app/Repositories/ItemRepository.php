<?php

namespace App\Repositories;

/**
 * Item repository.
 * 
 * @author Yosin_Hasan<yosinhasan@gmail.com>
 * 
 */
interface ItemRepository extends BaseRepository {

    function getAllByIds($ids);
}
