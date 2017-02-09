<?php

use yii\db\Migration;

/**
 * Handles the creation of table `in`.
 * Has foreign keys to the tables:
 *
 * - `from`
 */
class m170204_185940_create_in_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('in', [
            'id' => $this->primaryKey(),
            'val' => $this->integer()->notNull(),
            'from_id' => $this->integer(),
            'when' => $this->timestamp()->defaultExpression('CURRENT_TIMESTAMP'),
            'comment' => $this->string(255),
        ]);

        // creates index for column `from_id`
        $this->createIndex(
            'idx-in-from_id',
            'in',
            'from_id'
        );

        // add foreign key for table `from`
        $this->addForeignKey(
            'fk-in-from_id',
            'in',
            'from_id',
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
            'fk-in-from_id',
            'in'
        );

        // drops index for column `from_id`
        $this->dropIndex(
            'idx-in-from_id',
            'in'
        );

        $this->dropTable('in');
    }
}
