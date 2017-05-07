<?php

namespace App\Factory;

/**
 * Factory interface. 
 * 
 * @author Yosin Hasan<yosinhasan@gmail.com>
 * 
 * 
 */
interface Factory {

    function getUserService();

    function getDeliveryService();

    function getItemService();

    function getOrderService();

    function getOrderItemService();

    function getOrderStatusService();

    function getSubscriptionService();

    function getCartService();

    function getSubscriptionItemService();
}
