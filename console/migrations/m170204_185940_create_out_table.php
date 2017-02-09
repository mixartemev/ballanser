<?php

use yii\db\Migration;

/**
 * Handles the creation of table `out`.
 * Has foreign keys to the tables:
 *
 * - `to`
 */
class m170204_185940_create_out_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('out', [
            'id' => $this->primaryKey(),
            'val' => $this->integer()->notNull(),
            'to_id' => $this->integer(),
            'when' => $this->timestamp()->defaultExpression('CURRENT_TIMESTAMP'),
            'comment' => $this->string(255),
        ]);

        // creates index for column `to_id`
        $this->createIndex(
            'idx-out-to_id',
            'out',
            'to_id'
        );

        // add foreign key for table `to`
        $this->addForeignKey(
            'fk-out-to_id',
            'out',
            'to_id',
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
            'fk-out-to_id',
            'out'
        );

        // drops index for column `to_id`
        $this->dropIndex(
            'idx-out-to_id',
            'out'
        );

        $this->dropTable('out');
    }
}
