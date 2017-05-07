<?php

namespace App\Repositories;

/**
 * @author Yosin_Hasan<yosinhasan@gmail.com>
 * 
 */
interface CartRepository extends BaseRepository {

    /**
     * Add amount to respective product in storage.
     * 
     * @param type $id product id
     * @param type $amount product amount
     */
    function add($id, $amount);

    /**
     * Sub amount from respective product in storage.
     * 
     * @param type $id product id
     * @param type $amount product amount
     */
    function sub($id, $amount);

    /**
     * Clean storage. 
     */
    function flush();
}
