<?php

namespace App\Repositories\Impl;

use App\Repositories\BaseRepository;

/**
 * Abstract base repository.
 * 
 * @author Yosin Hasan<yosinhasan@gmail.com>
 * 
 */
abstract class AbstractBaseRepository implements BaseRepository {

    public function create($data) {
        throw new Exception("method is not implemented");
    }

    public function read($id) {
        throw new Exception("method is not implemented");
    }

    public function update($data, $id) {
        throw new Exception("method is not implemented");
    }

    public function delete($id) {
        throw new Exception("method is not implemented");
    }

    public function readAll($limit = null) {
        throw new Exception("method is not implemented");
    }

}
