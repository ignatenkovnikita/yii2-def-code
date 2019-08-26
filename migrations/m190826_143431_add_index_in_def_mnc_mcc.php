<?php

use yii\db\Migration;

/**
 * Class m190826_143431_add_index_in_def_mnc_mcc
 */
class m190826_143431_add_index_in_def_mnc_mcc extends Migration
{
    const TABLE_DEF_MNC_MCC = '{{%def_mnc_mcc}}';

    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createIndex('index_mnc_def_mnc_mcc', self::TABLE_DEF_MNC_MCC,'mnc');
        $this->createIndex('index_mcc_def_mnc_mcc', self::TABLE_DEF_MNC_MCC,'mcc');


    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m190826_143431_add_index_in_def_mnc_mcc cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190826_143431_add_index_in_def_mnc_mcc cannot be reverted.\n";

        return false;
    }
    */
}
