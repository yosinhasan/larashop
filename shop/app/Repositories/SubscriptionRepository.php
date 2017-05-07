<?php

namespace App\Repositories;

/**
 * Subscription repository.
 * 
 * @author Yosin Hasan<yosinhasan@gmail.com>
 */
interface SubscriptionRepository extends BaseRepository {

    function getAllByUserId($id);

    function getByUserId($id, $userId);

    function deactivate($id, $userId);

    function activate($id, $userId);

    function changeActivationStatus($id, $userId, $isActivated);

    function getSubscriptionsByNextOrderDate($date);

    function getSubscriptionsByNextOrderDateOrStartDate($date);

    function updateSubscriptionsNextOrderDateByDate($date);

    function updateSubscriptionsNextOrderDateByCurrentDate();
}
