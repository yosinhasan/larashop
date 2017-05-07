<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller {

    private $itemService;
    private $orderService;
    private $orderItemService;
    private $orderStatusService;
    private $subscriptionItemService;
    private $deliveryService;
    private $userService;

    const ORDER_FAILED_STATUS_ID = 2;
    const ORDER_PAID_STATUS_ID = 3;

    function __construct(\App\Factory\Impl\ServiceFactory $factory) {
        $this->itemService = $factory->getItemService();
        $this->orderService = $factory->getOrderService();
        $this->orderItemService = $factory->getOrderItemService();
        $this->orderStatusService = $factory->getOrderStatusService();
        $this->subscriptionItemService = $factory->getSubscriptionItemService();
        $this->subscriptionService = $factory->getSubscriptionService();
        $this->deliveryService = $factory->getDeliveryService();
        $this->userService = $factory->getUserService();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request) {
        $currentActionId = $request->get('action', 1);
        $users = $this->getUsers($currentActionId);
        return view('user.index', compact('users', 'currentActionId'));
    }

    private function getUsers($id) {
        switch ($id) {
            case 1:
                $users = $this->userService->readAll();
                break;
            case 2:
                $users = $this->userService->getUsersByPaidOrderAmount(1, self::ORDER_PAID_STATUS_ID);
                break;
            case 3:
                $users = $this->userService->getUsersWithActiveSubscriptionAndPaidOrderAmount(1, self::ORDER_PAID_STATUS_ID);
                break;
            case 4:
                $users = $this->userService->getUsersWithInactiveSubscriptionByOrderStatusId(self::ORDER_FAILED_STATUS_ID);
                break;
        }
        return $users;
    }

}
