<?php

use yii\db\Migration;

/**
 * Class m180620_183650_add_table_def_mnc
 */
class m180620_183650_add_table_def_mnc extends Migration
{
    use \ignatenkovnikita\migrationsaddons\ForeignKeyTrait;


    const TABLE_DEF_MNC = '{{%def_mnc_mcc}}';
    const TABLE_MNP = '{{%def_mnp}}';

    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }
        $this->truncateTable(self::TABLE_MNP);


        $this->dropColumn(self::TABLE_MNP, 'mnc');
        $this->dropColumn(self::TABLE_MNP, 'mcc');

        $this->addColumn(self::TABLE_MNP, 'def_mnc_mcc_id', $this->integer()->notNull());

        $this->createTable(self::TABLE_DEF_MNC, [
            'id' => $this->primaryKey(),
            'mnc' => $this->integer()->notNull(),
            'mcc' => $this->integer()->notNull(),
            'name' => $this->string()->notNull()
        ], $tableOptions);

        $this->addForeignKeys(self::TABLE_MNP, [
            ['def_mnc_mcc_id', self::TABLE_DEF_MNC, 'id']
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {

        $this->dropForeignKeys(self::TABLE_MNP, [
            ['def_mnc_mcc_id', self::TABLE_DEF_MNC, 'id']
        ]);
        $this->dropTable(self::TABLE_DEF_MNC);



        $this->addColumn(self::TABLE_MNP, 'mnc', $this->string());
        $this->addColumn(self::TABLE_MNP, 'mcc', $this->string());

        $this->dropColumn(self::TABLE_MNP, 'def_mnc_mcc_id');
        
        
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180620_183650_add_table_def_mnc cannot be reverted.\n";

        return false;
    }
    */
}
