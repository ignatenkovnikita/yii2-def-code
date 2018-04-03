<?php
/**
 * Copyright (C) $user$, Inc - All Rights Reserved
 *
 *  <other text>
 * @file        DefCodeFactory.php
 * @author      ignatenkovnikita
 * @date        $date$
 */

/**
 * Created by PhpStorm.
 * User: ignatenkovnikita
 * Web Site: http://IgnatenkovNikita.ru
 */

namespace ignatenkovnikita\defcode\models;


class DefCodeFactory
{


    public static function createFromLine($line)
    {
        $line = trim($line);

        $data = explode(';', $line);
        $data = array_map('trim', $data);


        $model = new DefCode();
        $model->from = self::getValueFromData($data, 0) . self::getValueFromData($data, 1);
        $model->to = self::getValueFromData($data, 0) . self::getValueFromData($data, 2);
        $model->capacity = self::getValueFromData($data, 3);

        $operatorName = iconv('windows-1251', 'utf-8', self::getValueFromData($data, 4));
        $model->operator_id = DefOperator::createOrExist($operatorName)->id;

        $regionName = iconv('windows-1251', 'utf-8', self::getValueFromData($data, 5));
        $model->region_id = DefRegion::createOrExist($regionName)->id;

        return $model;
    }


    public static function getValueFromData($data, $index)
    {
        return isset($data[$index]) ? $data[$index] : '';
    }
}