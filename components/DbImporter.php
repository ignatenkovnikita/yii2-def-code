<?php

namespace ignatenkovnikita\defcode\components;

/**
 * Copyright (C) $user$, Inc - All Rights Reserved
 *
 *  <other text>
 * @file        DbImporter.php
 * @author      ignatenkovnikita
 * @date        $date$
 */

use Exception;
use ignatenkovnikita\csv\AbstractImporter;
use ignatenkovnikita\csv\CsvImporter;
use ignatenkovnikita\csv\CsvReader;
use ignatenkovnikita\csv\ImportInterface;
use ignatenkovnikita\defcode\models\DefCode;
use ignatenkovnikita\defcode\models\DefCodeFactory;
use Yii;

/**
 * Created by PhpStorm.
 * User: ignatenkovnikita
 * Web Site: http://IgnatenkovNikita.ru
 */
class DbImporter extends AbstractImporter implements ImportInterface
{

    public function import($data, $params)
    {
        $transaction = Yii::$app->db->beginTransaction();

        Yii::$app->db->createCommand()->delete(DefCode::tableName(), 'type = :type', [':type' => $params['type']])->execute();

        $insertLines = 0;
        foreach ($data as $i => $line) {
            try {
                $model = DefCodeFactory::createFromLine($line[0]);
                $model->type = $params['type'];
                if ($model->validate()) {
                    Yii::$app->db->createCommand()->insert(DefCode::tableName(), $model->attributes)->execute();
                    $insertLines++;
                } else {
                    $this->addToLog('error save line ' . $i . ', errors ' . print_r($model->errors, true));
                }
            } catch (Exception $e) {
                $this->addToLog("Exception while inserting line " . $i . ' ' . $line . ', error ' . $e->getMessage());
            }
        }
        $transaction->commit();
        $this->addToLog('insert ' . $insertLines);

        return $this->getLog();
    }
}