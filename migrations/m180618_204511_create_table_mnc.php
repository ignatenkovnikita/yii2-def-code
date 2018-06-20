<?php

use yii\db\Migration;

/**
 * Class m180618_204511_create_table_mnc
 */
class m180618_204511_create_table_mnc extends Migration
{

    use \ignatenkovnikita\migrationsaddons\ForeignKeyTrait;

    const TABLE_DEF_OPERATOR = 'def_operator';

    const TABLE_MNC = '{{%def_mnp}}';

    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        
        $this->createTable(self::TABLE_MNC, [
            'id' => $this->primaryKey(),
            'phone' => $this->bigInteger()->notNull(),
            'mnc' => $this->string(),
            'mcc' => $this->string()
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable(self::TABLE_MNC);
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180618_204511_create_table_mnc cannot be reverted.\n";

        return false;
    }
    */
}
