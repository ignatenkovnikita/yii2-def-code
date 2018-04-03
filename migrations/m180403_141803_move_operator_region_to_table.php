<?php

use yii\db\Migration;

/**
 * Class m180403_141803_move_operator_region_to_table
 */
class m180403_141803_move_operator_region_to_table extends Migration
{
    use \ignatenkovnikita\migrationsaddons\ForeignKeyTrait;
    const TABLE_DEF_CODE = 'def_code';
    const TABLE_DEF_OPERATOR = 'def_operator';
    const TABLE_DEF_REGION = 'def_region';

    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->truncateTable(self::TABLE_DEF_CODE);

        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable(self::TABLE_DEF_OPERATOR, [
            'id' => $this->primaryKey(),
            'name' => $this->string()
        ], $tableOptions);

        $this->createTable(self::TABLE_DEF_REGION, [
            'id' => $this->primaryKey(),
            'name' => $this->string()
        ], $tableOptions);


        $this->dropColumn(self::TABLE_DEF_CODE, 'operator');
        $this->dropColumn(self::TABLE_DEF_CODE, 'region');
        $this->addColumn(self::TABLE_DEF_CODE, 'region_id', $this->integer()->notNull());
        $this->addColumn(self::TABLE_DEF_CODE, 'operator_id', $this->integer()->notNull());

        $this->addForeignKeys(self::TABLE_DEF_CODE, [
            ['region_id', self::TABLE_DEF_REGION, 'id'],
            ['operator_id', self::TABLE_DEF_OPERATOR, 'id'],
        ]);

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKeys(self::TABLE_DEF_CODE, [
            ['region_id', self::TABLE_DEF_REGION, 'id'],
            ['operator_id', self::TABLE_DEF_OPERATOR, 'id'],
        ]);

        $this->addColumn(self::TABLE_DEF_CODE, 'operator', $this->text());
        $this->addColumn(self::TABLE_DEF_CODE, 'region', $this->text());
        $this->dropColumn(self::TABLE_DEF_CODE, 'region_id');
        $this->dropColumn(self::TABLE_DEF_CODE, 'operator_id');

        $this->dropTable(self::TABLE_DEF_REGION);
        $this->dropTable(self::TABLE_DEF_OPERATOR);

    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180403_141803_move_operator_region_to_table cannot be reverted.\n";

        return false;
    }
    */
}
