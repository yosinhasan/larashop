<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DeliveryController extends Controller {

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
        $items = $this->getDeliveries();
        return view('delivery.index', compact('items'));
    }

    public function export() {
        $deliveries = $this->deliveryService->readAll();
        $csv = \League\Csv\Writer::createFromFileObject(new \SplTempFileObject());
        $csv->insertOne(['delivery id', 'order_id', 'sent_at', 'created_at', 'total(eur)', 'user_id', 'name', 'email']);
        $deliveries->each(function($item) use($csv) {
            $csv->insertOne($item->toArray());
        });
        $csv->output('deliveries.csv');
    }

    private function getDeliveries() {
        $user = Auth::user();
        if ($user->hasRole('manager')) {
            $items = $this->deliveryService->readAll();
        } else {
            $items = $this->deliveryService->getAllByUserId($user->id);
        }
        return $items;
    }

}
