<?php

use yii\db\Migration;

/**
 * Class m180305_002527_init
 */
class m180305_002527_init extends Migration
{
    /**
     * {@inheritdoc}
     */
    const TABLE_NAME = '{{def_code}}';

    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }
        $this->createTable(self::TABLE_NAME, [
            'id' => $this->primaryKey(),
            'from' => $this->bigInteger(),
            'to' => $this->bigInteger(),
            'capacity' => $this->bigInteger(),
            'operator' => $this->string(),
            'region' => $this->string(),
            'type' => $this->string(),
            'created_at' => $this->bigInteger(),
            'updated_at' => $this->bigInteger(),
        ], $tableOptions);

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable(self::TABLE_NAME);
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180305_002527_init cannot be reverted.\n";

        return false;
    }
    */
}
