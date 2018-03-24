<?php

namespace ignatenkovnikita\defcode\console;

/**
 * Copyright (C) $user$, Inc - All Rights Reserved
 *
 *  <other text>
 * @file        DefCodeController.php
 * @author      ignatenkovnikita
 * @date        $date$
 */

use ignatenkovnikita\csv\CsvImporter;
use ignatenkovnikita\csv\CsvReader;
use ignatenkovnikita\defcode\components\DbImporter;
use ignatenkovnikita\defcode\models\DefCode;
use ignatenkovnikita\defcode\models\DefCodeFactory;
use ignatenkovnikita\defcode\Module;
use Yii;
use yii\base\Exception;

/**
 * Created by PhpStorm.
 * User: ignatenkovnikita
 * Web Site: http://IgnatenkovNikita.ru
 */
class DefCodeController extends \yii\console\Controller
{
    /** @var Module $moduleDefCode */
    protected $moduleDefCode;

    public $basePath;

    public function init()
    {
        $this->basePath = \Yii::getAlias('@console/runtime/');

        $this->moduleDefCode = \Yii::$app->getModule('def-code');
        if (empty($this->moduleDefCode)) {
            throw new Exception('Module def-code not exist');
        }
        parent::init(); // TODO: Change the autogenerated stub
    }

    public function actionImport()
    {
        ini_set('memory_limit', '-1');
        $time = microtime(true);


        foreach ($this->getList() as $type => $url) {
            $fileName = $this->basePath . $type . '.csv';
            if (file_exists($fileName) && filesize($fileName)) {
                $this->log('start file ' . $fileName . ', type ' . $type);

                $importer = new CsvImporter();
                $importer->setData(new CsvReader([
                    'filename' => $fileName,
                    'fgetcsvOptions' => [
//                'delimiter' => '\n'
                    ],
                    'startFromLine' => 1
                ]));
                $importerClass = new DbImporter();
                $r = $importer->import($importerClass, ['type' => $type]);
                $this->log($r);
                $this->log('end file ' . $fileName . ', type ' . $type);
            } else {
                $this->log('not correct file ' . $fileName);
            }
        }
        $this->log('done (time: ' . sprintf('%.3f', microtime(true) - $time) . "s)\n");
    }

    public function actionDownloadAll()
    {
        $this->log('start download all');


        foreach ($this->getList() as $type => $url) {
            $fileName = $this->basePath . $type . '.csv';
            $this->log('download ' . $fileName);
            if (file_exists($fileName)) {
                $newFileName = $this->basePath . $type . '_' . date('Y-m-d-H-i-s', filemtime($fileName)) . '.csv';
                rename($fileName, $newFileName);
            }
            file_put_contents($fileName, fopen($url, 'r'));
        }
    }

    protected function getList()
    {
        return $this->moduleDefCode->listUrl;
    }


    protected function log($text)
    {
        echo date('Y-m-d H:i:s') . ' ' . $text . PHP_EOL;
    }


}