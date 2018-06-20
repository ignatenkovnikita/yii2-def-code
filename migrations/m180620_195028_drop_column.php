<?php

use yii\db\Migration;

/**
 * Class m180620_195028_drop_column
 */
class m180620_195028_drop_column extends Migration
{
    const TABLE_DEF_OPERATOR = 'def_operator';

    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->dropColumn(self::TABLE_DEF_OPERATOR, 'mnc');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->addColumn(self::TABLE_DEF_OPERATOR, 'mnc', $this->string());
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180620_195028_drop_column cannot be reverted.\n";

        return false;
    }
    */
}
