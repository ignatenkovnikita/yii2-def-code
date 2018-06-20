<?php
/**
 * Created by PhpStorm.
 * User: nikitaignatenkov
 * Date: 19/06/2018
 * Time: 23:02
 */

namespace ignatenkovnikita\defcode\models;


class DefMnpFactory
{


    public static function createFromLine($line)
    {
        $line = trim($line);

        $data = explode(';', $line);
        $data = array_map('trim', $data);


        $model = new DefMnp();
        $model->phone = self::getValueFromData($data, 0);
        $value = self::getValueFromData($data, 1);

        $defMncMcc = DefMncMcc::find()->andWhere([
            'mnc' => substr($value, 3),
            'mcc' => substr($value, 0, 3)

        ])->one();
        $model->def_mnc_mcc_id = $defMncMcc ? $defMncMcc->id : null;

        return $model;
    }


    public static function getValueFromData($data, $index)
    {
        return isset($data[$index]) ? $data[$index] : '';
    }

}