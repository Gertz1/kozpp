<?php

use yii\db\Schema;
use yii\db\Migration;

class m150813_171746_create_profile_table extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%profile}}', [
            'id' => Schema::TYPE_PK,
            'user_id' => Schema::TYPE_INTEGER . ' NOT NULL',
            'created_at' => Schema::TYPE_INTEGER . ' NOT NULL',
            'updated_at' => Schema::TYPE_INTEGER . ' NOT NULL',
            'fullname' => Schema::TYPE_STRING . ' NULL',
            'name' => Schema::TYPE_STRING . '(32) NULL',
            'surname' => Schema::TYPE_STRING . ' NULL',
            'patronymic' => Schema::TYPE_STRING . ' NULL',
            'gender' => Schema::TYPE_STRING . ' NULL',
            'address_id' => Schema::TYPE_STRING . ' NULL',           
        ], $tableOptions);

        $this->createIndex('idx_profile_name', '{{%profile}}', 'name');
        $this->createIndex('idx_profile_surname', '{{%profile}}', 'surname');
        $this->createIndex('idx_profile_patronymic', '{{%profile}}', 'patronymic');

        $this->addForeignKey('user_id', '{{%profile}}', "user_id", '{{%user}}', "id");

    }

    public function down()
    {
        echo "m150813_171746_create_profile_table cannot be reverted.\n";

        return false;
    }

}
