<?php
/**
 * Created by PhpStorm.
 * User: nikitaignatenkov
 * Date: 19/06/2018
 * Time: 17:17
 */

namespace ignatenkovnikita\defcode\components;


use ignatenkovnikita\csv\AbstractImporter;
use ignatenkovnikita\csv\ImportInterface;
use ignatenkovnikita\defcode\models\DefMnpFactory;

class MnpImporter extends AbstractImporter implements ImportInterface
{
    public function import($data, $params)
    {
        $transaction = \Yii::$app->db->beginTransaction();


        $isCommit = true;
        $insertLines = 0;
        foreach ($data as $i => $line) {
            try {
                $model = DefMnpFactory::createFromLine($line[0]);
                if ($model->save()) {
                    $insertLines++;
                } else {
                    $this->addToLog('error save line ' . $i . ', errors ' . print_r($model->errors, true) . ', errors: ' . print_r($model->attributes, true));
                }
            } catch (Exception $e) {
                $isCommit = false;
                $this->addToLog("Exception while inserting line " . $i . ', error ' . $e->getMessage());
            }
        }
        if ($isCommit) {
            $transaction->commit();
        } else {
            $transaction->rollBack();
        }
        $this->addToLog('insert ' . $insertLines);

        return $this->getLog();
    }
}