<?php

use yii\db\Schema;
use yii\db\Migration;

class m141210_185536_drop_profile_keys extends \jamband\schemadump\Migration
{

    public function up()
    {
        /* $this->dropColumn('{{%profile}}', 'public_email');
          $this->dropColumn('{{%profile}}', 'gravatar_email');
          $this->dropColumn('{{%profile}}', 'bio');
          $this->dropColumn('{{%profile}}', 'website');
          $this->dropColumn('{{%profile}}', 'location');
          $this->dropColumn('{{%profile}}', 'gravatar_id'); */

// profile
        $this->createTable('{{%profile}}', [
            'user_id' => Schema::TYPE_INTEGER . "(11) NOT NULL",
            'name' => Schema::TYPE_STRING . "(255) NULL",
            'PRIMARY KEY (user_id)',
            ], $this->tableOptions);

// social_account
        $this->createTable('{{%social_account}}', [
            'id' => Schema::TYPE_PK,
            'user_id' => Schema::TYPE_INTEGER . "(11) NULL",
            'provider' => Schema::TYPE_STRING . "(255) NOT NULL",
            'client_id' => Schema::TYPE_STRING . "(255) NOT NULL",
            'data' => Schema::TYPE_TEXT . " NULL",
            ], $this->tableOptions);

// token
        $this->createTable('{{%token}}', [
            'user_id' => Schema::TYPE_INTEGER . "(11) NOT NULL",
            'code' => Schema::TYPE_STRING . "(32) NOT NULL",
            'created_at' => Schema::TYPE_INTEGER . "(11) NOT NULL",
            'type' => Schema::TYPE_SMALLINT . "(6) NOT NULL",
            'PRIMARY KEY (user_id, code, type)',
            ], $this->tableOptions);

        $this->insert('{{%token}}', [
            'user_id' => '4',
            'code' => '1qUHi9Ng7gvdGvbB7y--im6-A_VVEcLC',
            'created_at' => '1418312186',
            'type' => '0',
        ]);

// user
        $this->createTable('{{%user}}', [
            'id' => Schema::TYPE_PK,
            'username' => Schema::TYPE_STRING . "(25) NOT NULL",
            'email' => Schema::TYPE_STRING . "(255) NOT NULL",
            'password_hash' => Schema::TYPE_STRING . "(60) NOT NULL",
            'auth_key' => Schema::TYPE_STRING . "(32) NOT NULL",
            'confirmed_at' => Schema::TYPE_INTEGER . "(11) NULL",
            'unconfirmed_email' => Schema::TYPE_STRING . "(255) NULL",
            'blocked_at' => Schema::TYPE_INTEGER . "(11) NULL",
            'role' => Schema::TYPE_STRING . "(255) NULL",
            'registration_ip' => Schema::TYPE_BIGINT . "(20) NULL",
            'created_at' => Schema::TYPE_INTEGER . "(11) NOT NULL",
            'updated_at' => Schema::TYPE_INTEGER . "(11) NOT NULL",
            'flags' => Schema::TYPE_INTEGER . "(11) NOT NULL DEFAULT '0'",
            ], $this->tableOptions);

        $this->insert('{{%user}}', [
            'id' => '3',
            'username' => 'admin',
            'email' => 'delphiserg@gmail.com',
            'password_hash' => '$2y$12$49lkpwADbI7I3i8QRViwO.2sAMKjOgMAyJd3qZuzrlAvAbphB
bOi6',
            'auth_key' => 'Sb4idSUiM5A1CDPnq7LD977lA5qrUgjD',
            'confirmed_at' => '1418310737',
            'registration_ip' => '2130706433',
            'created_at' => '1418310715',
            'updated_at' => '1418310737',
            'flags' => '0',
        ]);

        $this->insert('{{%user}}', [
            'id' => '4',
            'username' => 'user',
            'email' => 'user@gmail.com',
            'password_hash' => '$2y$12$JXNZLtIRlRTgwgzsyljSCuXw7DjT2NyF.oUok09QyUVjb/qku
6Hzm',
            'auth_key' => 'ufmE1ux6M0NZCgQIyrnnG3sa6uPSJiKv',
            'registration_ip' => '2130706433',
            'created_at' => '1418312186',
            'updated_at' => '1418312186',
            'flags' => '0',
        ]);

// fk: profile
        $this->addForeignKey('fk_profile_user_id', '{{%profile}}', 'user_id', '{{%user}}', 'id');

// fk: social_account
        $this->addForeignKey('fk_social_account_user_id', '{{%social_account}}', 'user_id', '{{%user}}', 'id');

// fk: token
        $this->addForeignKey('fk_token_user_id', '{{%token}}', 'user_id', '{{%user}}', 'id');
    }

    public function down()
    {
        echo "m141210_185536_drop_profile_keys cannot be reverted.\n";

        return false;
    }

}
