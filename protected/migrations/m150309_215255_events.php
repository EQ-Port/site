<?php

class m150309_215255_events extends CDbMigration
{
	public function up()
	{
        $eventsColumns = array(
            'id'         	=> 'int(11) UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY',
            'name'		 	=> 'varchar(50) DEFAULT NULL',
            'code' 		 	=> 'varchar(50) DEFAULT NULL',
            'type'   	 	=> 'int(11) DEFAULT NULL',
            'description'  	=> 'varchar(50) DEFAULT NULL',
            'start_date'    => 'date NOT NULL',
            'end_date'      => 'date NOT NULL',
            'address'		=> 'varchar(150) DEFAULT NULL',
        );

        $this->createTable('events', $userColumns);

        $this->createIndex('name', 'code', true);
	}

	public function down()
	{
        $this->dropTable('events');
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