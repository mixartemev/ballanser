<?php

use yii\db\Migration;

/**
 * Handles the creation of table `to`.
 * Has foreign keys to the tables:
 *
 * - `to`
 */
class m170204_185905_create_to_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('to', [
            'id' => $this->primaryKey(),
            'name' => $this->string(255)->notNull(),
            'parent_id' => $this->integer(),
        ]);

        // creates index for column `parent_id`
        $this->createIndex(
            'idx-to-parent_id',
            'to',
            'parent_id'
        );

        // add foreign key for table `to`
        $this->addForeignKey(
            'fk-to-parent_id',
            'to',
            'parent_id',
            'to',
            'id',
            'CASCADE'
        );
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        // drops foreign key for table `to`
        $this->dropForeignKey(
            'fk-to-parent_id',
            'to'
        );

        // drops index for column `parent_id`
        $this->dropIndex(
            'idx-to-parent_id',
            'to'
        );

        $this->dropTable('to');
    }
}
