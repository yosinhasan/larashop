<?php

namespace App\Factory\Impl;

use App\Config\Config;
use App\Factory\Factory;

/**
 * Service Factory implementation.
 * 
 * @author Yosin Hasan<yosinhasan@gmail.com>
 * 
 */
final class ServiceFactory implements Factory {

    private $type = Config::MYSQL;

    public function __construct($sourceType = null) {
        if ($sourceType != null) {
            $this->type = $sourceType;
        }
    }

    public function getUserService() {
        if ($this->type == Config::MYSQL) {
            $repository = new \App\Repositories\Impl\MysqlUserRepository();
            return new \App\Services\Impl\UserServiceImpl($repository);
        }
        throw new \Exception("Service not found");
    }

    public function getDeliveryService() {
        if ($this->type == Config::MYSQL) {
            $repository = new \App\Repositories\Impl\MysqlDeliveryRepository();
            return new \App\Services\Impl\DeliveryServiceImpl($repository);
        }
        throw new \Exception("Service not found");
    }

    public function getItemService() {
        if ($this->type == Config::MYSQL) {
            $repository = new \App\Repositories\Impl\MysqlItemRepository();
            return new \App\Services\Impl\ItemServiceImpl($repository);
        }
        throw new \Exception("Service not found");
    }

    public function getOrderItemService() {
        if ($this->type == Config::MYSQL) {
            $repository = new \App\Repositories\Impl\MysqlOrderItemRepository();
            return new \App\Services\Impl\OrderItemServiceImpl($repository);
        }
        throw new \Exception("Service not found");
    }

    public function getOrderService() {
        if ($this->type == Config::MYSQL) {
            $repository = new \App\Repositories\Impl\MysqlOrderRepository();
            return new \App\Services\Impl\OrderServiceImpl($repository);
        }
        throw new \Exception("Service not found");
    }

    public function getOrderStatusService() {
        if ($this->type == Config::MYSQL) {
            $repository = new \App\Repositories\Impl\MysqlOrderStatusRepository();
            return new \App\Services\Impl\OrderStatusServiceImpl($repository);
        }
        throw new \Exception("Service not found");
    }

    public function getSubscriptionService() {
        if ($this->type == Config::MYSQL) {
            $repository = new \App\Repositories\Impl\MysqlSubscriptionRepository();
            return new \App\Services\Impl\SubscriptionServiceImpl($repository);
        }
        throw new \Exception("Service not found");
    }

    public function getCartService() {
        $repository = new \App\Repositories\Impl\SessionCartRepositoryImpl();
        return new \App\Services\Impl\CartServiceImpl($repository);
    }

    public function getSubscriptionItemService() {
        if ($this->type == Config::MYSQL) {
            $repository = new \App\Repositories\Impl\MysqlSubscriptionItemRepository();
            return new \App\Services\Impl\SubscriptionItemServiceImpl($repository);
        }
        throw new \Exception("Service not found");
    }

}
