<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller {

    private $cartService;
    private $itemService;
    private $orderService;
    private $orderItemService;
    private $subscriptionService;
    private $subscriptionItemService;

    function __construct(\App\Factory\Impl\ServiceFactory $factory) {
        $this->cartService = $factory->getCartService();
        $this->itemService = $factory->getItemService();
        $this->orderService = $factory->getOrderService();
        $this->orderItemService = $factory->getOrderItemService();
        $this->subscriptionService = $factory->getSubscriptionService();
        $this->subscriptionItemService = $factory->getSubscriptionItemService();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $all = $this->cartService->readAll();
        $ids = array_keys($all);
        if (count($all) <= 0) {
            return redirect('/items');
        }
        $items = $this->itemService->getAllByIds($ids);
        return view('cart.index', compact('all', 'items'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(\App\Http\Requests\CartRequest $request) {
        if ($request->amount < 0) {
            $this->cartService->sub($request->id, $amount);
        } else {
            $this->cartService->add($request->id, $request->amount);
        }
        return redirect()->back();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(\App\Http\Requests\CartRequest $request) {
        if ($request->amount > 0) {
            $this->cartService->update($request->amount, $request->id);
        }
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        $this->cartService->delete($id);
        return redirect()->back();
    }

    public function clear() {
        $this->cartService->flush();
        return redirect('/items');
    }

    public function checkout() {
        $all = $this->cartService->readAll();
        $ids = array_keys($all);
        if (count($all) <= 0) {
            return redirect('/items');
        }
        $items = $this->itemService->getAllByIds($ids);
        return view('cart.checkout', compact('all', 'items'));
    }

    public function completeOrder(Request $request) {
        $all = $this->cartService->readAll();
        $ids = array_keys($all);
        $items = $this->itemService->getAllByIds($ids);
        $total = 0;
        $i = 0;
        $data = [];
        foreach ($items as $item) {
            $data[$i]['item_id'] = $item->id;
            $data[$i]['price'] = $item->price;
            $data[$i]['amount'] = $all[$item->id];
            $total += $item->price * $all[$item->id];
            $i++;
        }
        $request->total = $total;
        $request->user_id = Auth::user()->id;
        $order = $this->orderService->create($request);
        foreach ($data as &$item) {
            $item['order_id'] = $order->id;
        }
        $this->orderItemService->addItems($data);
        $this->cartService->flush();
        return redirect('/orders?success=true');
    }

}
