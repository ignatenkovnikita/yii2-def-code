<?php

use yii\db\Migration;

/**
 * Class m190826_092624_add_index_to_phone
 */
class m190826_092624_add_index_to_phone extends Migration
{
    const TABLE_DEF_MNP = '{{%def_mnp}}';

    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createIndex('index_phone_def_mnp', self::TABLE_DEF_MNP,'phone');

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m190826_092624_add_index_to_phone cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190826_092624_add_index_to_phone cannot be reverted.\n";

        return false;
    }
    */
}
