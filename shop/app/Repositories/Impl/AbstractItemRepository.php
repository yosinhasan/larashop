<?php

namespace App\Repositories\Impl;

/**
 * Abstract item repository.
 * 
 * @author Yosin Hasan<yosinhasan@gmail.com>
 * 
 */
abstract class AbstractItemRepository extends AbstractBaseRepository implements \App\Repositories\ItemRepository {

    public function getAllByIds($ids) {
        throw new Exception("method is not implemented");
    }

}
