<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Factory\Impl\ServiceFactory;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller {

    private $itemService;
    private $orderService;
    private $orderItemService;
    private $orderStatusService;
    private $subscriptionItemService;
    private $deliveryService;
    private $userService;

    const ORDER_PAID_STATUS_ID = 3;

    function __construct(ServiceFactory $factory) {
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
        $statusId = $this->getOrderStatusId($request);
        $orders = $this->getOrders($statusId);
        $statuses = $this->orderStatusService->readAll();
        return view('order.index', compact('orders', 'statuses', 'statusId'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        $order = $this->orderService->read($id);
        $user = Auth::user();
        if (!$user->hasRole('manager') && $order->user_id != $user->id) {
            return redirect()->back();
        }
        if ($order->subscription_id != null) {
            $items = $this->subscriptionItemService->getBySubscriptionId($order->subscription_id);
        } else {
            $items = $this->orderItemService->getByOrderId($order->id);
        }
        $orderUser = $this->userService->read($order->user_id);
        $statuses = $this->orderStatusService->readAll();
        return view('order.show', compact('order', 'items', 'statuses', 'orderUser'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(\App\Http\Requests\OrderRequest $request) {
        $this->orderService->update($request, $request->get('id'));
        $isDeliveryAdded = false;
        if ($request->get('status_id') == self::ORDER_PAID_STATUS_ID) {
            $this->deliveryService->create($request);
            $isDeliveryAdded = true;
        }
        return redirect()->back()->with('isDeliveryAdded', $isDeliveryAdded);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        $this->orderService->delete($id);
        return redirect()->back();
    }

    public function createSubscriptionOrders(Request $request) {
        $includeStartDate = $request->get('includeStartDate', 0);
        if ($includeStartDate == 1) {
            $subscriptions = $this->subscriptionService->getSubscriptionsByNextOrderDateOrStartDate(\Carbon\Carbon::now()->toDateString());
        } else {
            $subscriptions = $this->subscriptionService->getSubscriptionsByNextOrderDate(\Carbon\Carbon::now()->toDateString());
        }
        $orders = [];
        $i = 0;
        foreach ($subscriptions as $item) {
            $orders[$i]['user_id'] = $item->user_id;
            $orders[$i]['subscription_id'] = $item->id;
            $orders[$i]['total'] = $item->total;
            $orders[$i++]['created_at'] = \Carbon\Carbon::now();
        }
        if (count($orders) > 0) {
            $orders = $this->orderService->addOrders($orders);
            $this->subscriptionService->updateSubscriptionsNextOrderDateByCurrentDate();
            return redirect()->back()->with('added', count($orders));
        }
        return redirect()->back()->with('wasntAdded', 'true');
    }

    private function getOrderStatusId($request) {
        $statusId = 1;
        if ($request->get('status_id') != null) {
            $id = abs((int) $request->get('status_id'));
            if ($id > 0) {
                $statusId = $id;
            }
        }
        return $statusId;
    }

    private function getOrders($statusId) {
        $user = Auth::user();
        if ($user->hasRole('manager')) {
            $orders = $this->orderService->readAllByOrderStatus($statusId);
        } else {
            $orders = $this->orderService->getAllByUserIdAndOrderStatus($user->id, $statusId);
        }
        return $orders;
    }

}
