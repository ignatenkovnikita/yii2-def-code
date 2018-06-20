<?php

use yii\db\Migration;

/**
 * Class m180620_190458_add_data
 */
class m180620_190458_add_data extends Migration
{
    const TABLE_DEF_MNC = '{{%def_mnc_mcc}}';

    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $data = [
            [
                'mcc' => 250,
                'mnc' => 01,
                'name' => 'МТС',
            ],

            [
                'mcc' => 250,
                'mnc' => 02,
                'name' => 'МегаФон',
            ],
            [
                'mcc' => 250,
                'mnc' => 03,
                'name' => 'Ростелеком(НСС, Элайн)'
            ],
            [
                'mcc' => 250,
                'mnc' => 05,
                'name' => 'ЕТК',
            ],
            [
                'mcc' => 250,
                'mnc' => 06,
                'name' => 'DANYCOM',
            ],

            [
                'mcc' => 250,
                'mnc' => 07,
                'name' => 'Смартс'
            ],
            [
                'mcc' => 250,
                'mnc' => 11,
                'name' => 'Yota(до 4 июня 2003 года использовался оператором Оренсот[1] в Оренбургской области)'
            ],
            [
                'mcc' => 250,
                'mnc' => 12,
                'name' => 'АКОС, Дальсвязь'
            ],

            [
                'mcc' => 250,
                'mnc' => 16,
                'name' => 'НТК'
            ],
            [
                'mcc' => 250,
                'mnc' => 18,
                'name' => 'Основа Телеком',
            ],
            [
                'mcc' => 250,
                'mnc' => 20,
                'name' => 'Tele2, Tele2 / АКОС',
            ],
            [
                'mcc' => 250,
                'mnc' => 23,
                'name' => 'ЗАО «Джи Ти Эн Ти»',
            ],
            [
                'mcc' => 250,
                'mnc' => 30,
                'name' => 'ЗАО «Остелеком»',
            ],
            [
                'mcc' => 250,
                'mnc' => 32,
                'name' => 'WIN - Mobile(«К - Телеком», Республика Крым и Севастополь)',
            ],
            [
                'mcc' => 250,
                'mnc' => 33,
                'name' => 'СевМобайл',
            ],
            [
                'mcc' => 250,
                'mnc' => 34,
                'name' => 'Крымтелеком',
            ],
            [
                'mcc' => 250,
                'mnc' => 35,
                'name' => 'МОТИВ',
            ],
            [
                'mcc' => 250,
                'mnc' => 37,
                'name' => 'СкайЛинк, Кодотел',
            ],
            [
                'mcc' => 250,
                'mnc' => 39,
                'name' => 'Ростелеком(Utel, АКОС, НСС, БайкалВестКом, Волгоград - GSM, Тамбов GSM)'],
            [
                'mcc' => 250,
                'mnc' => 42,
                'name' => 'ОАО «Межрегиональный ТранзитТелеком»'
            ],
            [
                'mcc' => 250,
                'mnc' => 43,
                'name' => 'Sprint'
            ],
            [
                'mcc' => 250,
                'mnc' => 50,
                'name' => 'PSTN(стационарные сети)'
            ],
            [
                'mcc' => 250,
                'mnc' => 54,
                'name' => 'ПАО «Таттелеком»'
            ],
            [
                'mcc' => 250,
                'mnc' => 60,
                'name' => 'Волна мобайл',
            ],
            [
                'mcc' => 250,
                'mnc' => 61,
                'name' => 'Интертелеком(Республика Крым и Севастополь)',
            ],
            [
                'mcc' => 250,
                'mnc' => 62,
                'name' => 'Тинькофф Мобайл'
            ],
            [
                'mcc' => 250,
                'mnc' => 92,
                'name' => 'Примтелефон',
            ],
            [
                'mcc' => 250,
                'mnc' => 99,
                'name' => 'Билайн, НТК'
            ],
        ];
        
        $this->batchInsert(self::TABLE_DEF_MNC, ['mcc','mnc','name'], $data);

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->truncateTable(self::TABLE_DEF_MNC);
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180620_190458_add_data cannot be reverted.\n";

        return false;
    }
    */
}
