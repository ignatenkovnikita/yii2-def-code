<?php

use yii\db\Migration;

/**
 * Class m190127_131530_create_table_def_mnp_temp
 */
class m190127_131530_create_table_def_mnp_temp extends Migration
{
    const TABLE_DEF_MNP_TEMP = '{{%def_mnp_temp}}';

    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable(self::TABLE_DEF_MNP_TEMP, [
            'number' => $this->bigInteger(),
            'mcc' => $this->integer(),
            'mnc' => $this->integer()
        ]);

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable(self::TABLE_DEF_MNP_TEMP);
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190127_131530_create_table_def_mnp_temp cannot be reverted.\n";

        return false;
    }
    */
}
