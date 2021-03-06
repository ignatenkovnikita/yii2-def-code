<?php

namespace ignatenkovnikita\defcode;

/**
 * Copyright (C) $user$, Inc - All Rights Reserved
 *
 *  <other text>
 * @file        Module.php
 * @author      ignatenkovnikita
 * @date        $date$
 */

use ignatenkovnikita\defcode\console\DefCodeController;
use ignatenkovnikita\defcode\console\MnpController;
use ignatenkovnikita\defcode\models\DefCode;
use yii\base\BootstrapInterface;

/**
 * Created by PhpStorm.
 * User: ignatenkovnikita
 * Web Site: http://IgnatenkovNikita.ru
 */
class Module extends \yii\base\Module implements BootstrapInterface
{
    public $controllerNamespace = 'ignatenkovnikita\defcode\controllers';


    public $listUrl = [
        DefCode::TYPE_ABC3 => 'https://www.rossvyaz.ru/docs/articles/Kody_ABC-3kh.csv',
        DefCode::TYPE_ABC4 => 'https://www.rossvyaz.ru/docs/articles/Kody_ABC-4kh.csv',
        DefCode::TYPE_ABC8 => 'https://www.rossvyaz.ru/docs/articles/Kody_ABC-8kh.csv',
        DefCode::TYPE_ABC9 => 'https://www.rossvyaz.ru/docs/articles/Kody_DEF-9kh.csv',
    ];

    public $smscLogin;
    public $smscPassword;

    public $mnpAll = 'https://smsc.ru/sys/get_mnp.php?login={login}&psw={password}';
    public $mnpDetail='https://smsc.ru/sys/get_mnp.php?login={login}&psw={password}&date={date}';

    public
    function bootstrap($app)
    {
        if ($app instanceof \yii\console\Application) {
            $app->controllerMap['def-code'] = [
                'class' => DefCodeController::class,
//                'module' => $this
            ];
            $app->controllerMap['mnp'] = [
                'class' => MnpController::class,
//                'module' => $this
            ];
//            $app->controllerNamespace = 'ignatenkovnikita\defcode\console';
        }
    }


    public
    static function backendControllerNamespace()
    {
        $class = new \ReflectionClass(static::class);
        return $class->getNamespaceName() . '\\backend\\controllers';
    }


}