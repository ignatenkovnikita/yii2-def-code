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
use ignatenkovnikita\defcode\models\DefMncMcc;
use ignatenkovnikita\defcode\models\DefMnp;
use ignatenkovnikita\defcode\models\DefMnpFactory;

class MnpUpdater extends AbstractImporter implements ImportInterface
{
    public function import($data, $params)
    {
        $transaction = \Yii::$app->db->beginTransaction();


        $isCommit = true;
        $insertLines = 0;
        foreach ($data as $i => $line) {
            try {
                $model = new DefMnp();
                $options = array(
                    'options' => array(
                        'default' => 3, // значение, возвращаемое, если фильтрация завершилась неудачей
                        // другие параметры
                        'min_range' => 0
                    ),
                    'flags' => FILTER_FLAG_ALLOW_OCTAL,
                );
                $model->phone = preg_replace('/[^0-9]/', '', $line[0]);
                $defMncMcc = DefMncMcc::find()->andWhere([
                    'mnc' => preg_replace('/[^0-9]/', '', $line[2]),
                    'mcc' => preg_replace('/[^0-9]/', '', $line[1])

                ])->one();
                $model->def_mnc_mcc_id = $defMncMcc ? $defMncMcc->id : null;

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