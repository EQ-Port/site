<?php

class m150313_092427_event extends CDbMigration
{
	public function up()
	{
        $eventsColumns = array(
            'id'         	=> 'int(11) UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY',
            'name'		 	=> 'varchar(100) NOT NULL',
            'code' 		 	=> 'varchar(100) NOT NULL',
            'type'   	 	=> 'int(11) NOT NULL',
            'description'  	=> 'varchar(255) NOT NULL',
            'start_date'    => 'date NOT NULL',
            'end_date'      => 'date DEFAULT NULL',
            'address'		=> 'varchar(150) NOT NULL',
        );

        $this->createTable('event', $userColumns);

        $this->createIndex('name', 'code', true);
	}

	public function down()
	{
        $this->dropTable('event');
	}

	/*
	// Use safeUp/safeDown to do migration with transaction
	public function safeUp()
	{
	}

	public function safeDown()
	{
	}
	*/
}