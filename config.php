<?php


/** @noinspection MissedFieldInspection */

use humhub\modules\fcmPush\Events;
use humhub\components\Controller;
//use humhub\modules\notification\widgets\NotificationInfoWidget;
use humhub\widgets\LayoutAddons;
use yii\base\Application;
use humhub\modules\user\components\User;

return [
    'id' => 'fcm-push',
    'class' => 'humhub\modules\fcmPush\Module',
    'namespace' => 'humhub\modules\fcmPush',
    'events' => [
        ['humhub\modules\web\pwa\controllers\ManifestController', Controller::EVENT_INIT, [Events::class, 'onManifestControllerInit']],
        ['humhub\modules\web\pwa\controllers\ServiceWorkerController', Controller::EVENT_INIT, [Events::class, 'onServiceWorkerControllerInit']],
        [LayoutAddons::class, LayoutAddons::EVENT_INIT, [Events::class, 'onLayoutAddonInit']],
        [Application::class, Application::EVENT_BEFORE_REQUEST, [Events::class, 'onBeforeRequest']],
        [User::class, User::EVENT_AFTER_LOGOUT, [Events::class, 'onAfterLogout']],
        [User::class, User::EVENT_AFTER_LOGIN, [Events::class, 'onAfterLogin']]
        //[NotificationInfoWidget::class, \humhub\widgets\BaseStack::EVENT_RUN, [Events::class, 'onNotificationInfoWidget']]
    ],
    'consoleControllerMap' => [
        'firebase' => 'humhub\modules\fcmPush\commands\SendController'
    ],
];
?>