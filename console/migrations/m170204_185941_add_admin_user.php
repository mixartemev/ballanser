<?php

use yii\db\Migration;

/**
 * Handles the creation of table `to`.
 * Has foreign keys to the tables:
 *
 * - `to`
 */
class m170204_185941_add_admin_user extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->insert('{{%user}}',[
            'username' => 'admin',
            'email' => 'admin@test.com',
            'password_hash' => Yii::$app->security->generatePasswordHash('654321'),//'$2y$13$27d3pqkKhwJ1/CLEg968DOR7thWgijTrWw2BVPRH4N7Z8vjZ/LBX6', // hash of password: 123456
            'auth_key' => Yii::$app->security->generateRandomString(),
            'status' => \common\models\User::STATUS_ACTIVE,
            'created_at' => time(),
            'updated_at' => time()
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->delete('{{%user}}',[
            'username' => 'admin'
        ]);
    }
}
