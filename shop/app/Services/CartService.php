<?php

namespace App\Services;

/**
 * Cart service.
 * 
 * @author Yosin Hasan<yosinhasan@gmail.com>
 * 
 */
interface CartService extends BaseService {

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
