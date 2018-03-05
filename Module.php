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
use yii\base\BootstrapInterface;

/**
 * Created by PhpStorm.
 * User: ignatenkovnikita
 * Web Site: http://IgnatenkovNikita.ru
 */

class Module extends \yii\base\Module implements BootstrapInterface
{
    public $controllerNamespace = 'ignatenkovnikita\defcode\controllers';


    public function bootstrap($app)
    {
        if ($app instanceof \yii\console\Application) {
            $app->controllerMap['def-code'] = [
                'class' => DefCodeController::class,
//                'module' => $this
            ];
            //$app->controllerNamespace = 'sevenfloor\paymentmanager\console';
        }
    }


    public static function backendControllerNamespace()
    {
        $class = new \ReflectionClass(static::class);
        return $class->getNamespaceName() . '\\backend\\controllers';
    }



}