<?php

use yii\db\Migration;

/**
 * Handles the creation of table `from`.
 * Has foreign keys to the tables:
 *
 * - `from`
 */
class m170204_185905_create_from_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('from', [
            'id' => $this->primaryKey(),
            'name' => $this->string(255)->notNull(),
            'parent_id' => $this->integer(),
        ]);

        // creates index for column `parent_id`
        $this->createIndex(
            'idx-from-parent_id',
            'from',
            'parent_id'
        );

        // add foreign key for table `from`
        $this->addForeignKey(
            'fk-from-parent_id',
            'from',
            'parent_id',
            'from',
            'id',
            'CASCADE'
        );
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        // drops foreign key for table `from`
        $this->dropForeignKey(
            'fk-from-parent_id',
            'from'
        );

        // drops index for column `parent_id`
        $this->dropIndex(
            'idx-from-parent_id',
            'from'
        );

        $this->dropTable('from');
    }
}
