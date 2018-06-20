<?php

use yii\db\Migration;

/**
 * Class m180618_190132_add_column_mnc
 */
class m180618_190132_add_column_mnc extends Migration
{
    const TABLE_DEF_OPERATOR = 'def_operator';

    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn(self::TABLE_DEF_OPERATOR, 'mnc', $this->string());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn(self::TABLE_DEF_OPERATOR, 'mnc');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180618_190132_add_column_mnc cannot be reverted.\n";

        return false;
    }
    */
}
