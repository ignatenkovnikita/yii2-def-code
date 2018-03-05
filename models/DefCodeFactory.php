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
        $model->from = $data[0] . $data[1];
        $model->to = $data[0] . $data[2];
        $model->capacity = $data[3];
        $model->operator = iconv('windows-1251', 'utf-8', $data[4]);
        $model->region = iconv('windows-1251', 'utf-8', $data[5]);

        return $model;
    }
}