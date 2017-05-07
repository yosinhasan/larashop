<?php

namespace App\Repositories;

/**
 * Base repository.
 * 
 * @author Yosin Hasan<yosinhasan@gmail.com>
 * 
 */
interface BaseRepository {

    /**
     * Creates object.
     * 
     * @param $data object to create
     * @return boolean. 
     *      Returns created object with its id if the object has been created.
     * @throws Exception
     */
    function create($data);

    /**
     * Reads object from respective data source by id.
     * 
     * @param type $id object id
     * @return Object. 
     *      Returns object, if the object
     *           with given id exists, otherwise null.
     * @throws Exception
     */
    function read($id);

    /**
     * Updates object.
     * 
     * @param $data object to update
     * 
     * @return boolean. 
     *      Returns true if the object has been updated otherwise false.
     * @throws Exception
     */
    function update($data, $id);

    /**
     * Deletes object from respective data source by id.
     * 
     * @param type $id object id to delete
     * @return boolean. 
     *      Returns true if the object has been deleted otherwise false.
     * @throws Exception
     */
    function delete($id);

    /**
     * Reads all objects from respective data source.
     * 
     * @param type $limit limit
     * @return Collection<Object>
     * @throws Exception
     */
    function readAll($limit = null);
}
