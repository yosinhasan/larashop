<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Factory\Impl\ServiceFactory;
use Illuminate\Support\Facades\Auth;

class SubscriptionController extends Controller {

    private $itemService;
    private $subscriptionService;
    private $subscriptionItemService;
    private $cartService;

    function __construct(ServiceFactory $factory) {
        $this->itemService = $factory->getItemService();
        $this->subscriptionService = $factory->getSubscriptionService();
        $this->subscriptionItemService = $factory->getSubscriptionItemService();
        $this->cartService = $factory->getCartService();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $user = Auth::user();
        if ($user->hasRole('manager')) {
            $subscriptions = $this->subscriptionService->readAll();
        } else {
            $subscriptions = $this->subscriptionService->getAllByUserId($user->id);
        }
        return view('subscription.index', compact('subscriptions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        $all = $this->cartService->readAll();
        $ids = array_keys($all);
        if (count($all) <= 0) {
            return redirect('/items');
        }
        $items = $this->itemService->getAllByIds($ids);
        return view('subscription.create', compact('all', 'items'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(\App\Http\Requests\SubscriptionRequest $request) {
        $user = auth()->user();
        if ($user->hasRole('manager')) {
            return redirect('/admin');
        }
        $all = $this->cartService->readAll();
        $ids = array_keys($all);
        $items = $this->itemService->getAllByIds($ids);
        $request->activated_at = null;
        if ($request->get('activated') != null && $request->get('activated') == 1) {
            $request->activated_at = \Carbon\Carbon::now();
        }
        $time = strtotime($request->get('start_date')) + $request->get('day_iteration') * 24 * 3600;
        $request->next_order_date = date('Y-m-d', $time);
        $request->user_id = $user->id;
        $subscription = $this->subscriptionService->create($request);
        $i = 0;
        $data = [];
        foreach ($items as $item) {
            $data[$i]['item_id'] = $item->id;
            $data[$i]['subscription_id'] = $subscription->id;
            $data[$i]['amount'] = $all[$item->id];
            $i++;
        }
        $this->subscriptionItemService->addItems($data);
        $this->cartService->flush();
        return redirect('/subscriptions?success=true');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        $subscription = $this->subscriptionService->read($id);
        $user = Auth::user();
        if (!$user->hasRole('manager') && $subscription->user_id != $user->id) {
            return redirect()->back();
        }
        $items = $this->subscriptionItemService->getBySubscriptionId($subscription->id);
        return view('subscription.show', compact('subscription', 'items'));
    }

    public function activate($id) {
        $user = auth()->user();
        $this->subscriptionService->activate($id, $user->id);
        return redirect()->back();
    }

    public function deactivate($id) {
        $user = auth()->user();
        $this->subscriptionService->deactivate($id, $user->id);
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        $this->subscriptionService->delete($id);
        return redirect()->back();
    }

}
