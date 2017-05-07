<?php

namespace App\Repositories\Impl;

use App\Models\User;
use App\Models\Connection;
use App\Models\Connection_request;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

/**
 * Mysql user repository implementation.
 * 
 * @author Yosin Hasan<yosinhasan@gmail.com>
 * 
 */
final class MysqlUserRepository extends AbstractUserRepository {

    public function create($data) {
        $user = new User();
        $user->name = $data->get('name');
        $user->email = $data->get('email');
        $user->password = bcrypt($data->get('password'));
        $user->save();
        return $user;
    }

    public function read($id) {
        $id = (int) $id;
        if ($id < 0) {
            return null;
        }
        return User::findOrFail($id);
    }

    public function update($data, $id) {
        $user = $this->read($id);
        $user->name = $data->get('name');
        $user->email = $data->get('email');
        return $user->save();
    }

    public function delete($id) {
        $id = (int) $id;
        if ($id < 0) {
            return false;
        }
        return User::destroy($id);
    }

    public function readAll($limit = null) {
        return User::all();
    }

    public function getUsersByPaidOrderAmount($minPaidOrderAmount, $statusId) {
        $users = User::join('orders', 'users.id', '=', 'orders.user_id')
                        ->select('users.id', 'users.name', 'users.email', DB::raw('count(*) as amount'))
                        ->where('orders.status_id', '=', $statusId)
                        ->groupBy('users.id')
                        ->having('amount', '>', $minPaidOrderAmount)->get();
        return $users;
    }

    public function getUsersWithActiveSubscriptionAndPaidOrderAmount($minPaidOrderAmount, $statusId) {
        return User::join('orders', 'users.id', '=', 'orders.user_id')
                        ->join('subscriptions', 'users.id', '=', 'subscriptions.user_id')
                        ->select('users.id', 'users.name', 'users.email', DB::raw('count(*) as amount'))
                        ->where('orders.status_id', '=', $statusId)
                        ->whereNotNull('subscriptions.activated_at')
                        ->groupBy('users.id')
                        ->having('amount', '>=', $minPaidOrderAmount)->get();
    }

    public function getUsersWithInactiveSubscriptionByOrderStatusId($orderStatusId) {
        return User::join('orders', 'users.id', '=', 'orders.user_id')
                        ->leftJoin('subscriptions', 'users.id', '=', 'subscriptions.user_id')
                        ->select('users.id', 'users.name', 'users.email', DB::raw('count(*) as amount'))
                        ->whereNull('subscriptions.activated_at')
                        ->where('orders.status_id', '=', $orderStatusId)
                        ->groupBy('users.id')->get();
    }

}
