<?php

namespace App\Services;

/**
 * Subscription service.
 * 
 * @author Yosin Hasan<yosinhasan@gmail.com>
 */
interface SubscriptionService extends BaseService {

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
