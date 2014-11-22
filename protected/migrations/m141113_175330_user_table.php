<?php

class m141113_175330_user_table extends CDbMigration
{
    public function up()
    {
        $userColumns = array(
            'id'         => 'int(11) UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY',
            'first_name' => 'varchar(50) DEFAULT NULL',
            'last_name'  => 'varchar(50) DEFAULT NULL',
            'nickname'   => 'varchar(50) DEFAULT NULL',
            'email'      => 'varchar(50) DEFAULT NULL',
            'password'   => 'varchar(40) DEFAULT NULL',
            'roles'      => 'smallint(8) NOT NULL DEFAULT 1'
        );

        $this->createTable('user', $userColumns);

        $this->createIndex('user_email', 'user', 'email', true);
    }

    public function down()
    {
        $this->dropTable('user');
    }
}