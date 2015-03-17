<?php

class m150317_005817_calendar extends CDbMigration
{
	public function up()
	{
        $eventsColumns = array(
            'id'         	=> 'int(11) UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY',
            'date'		 	=> 'DATE NOT NULL',
            'description' 	=> 'varchar(255) NOT NULL',
        );

        $this->createTable('calendar', $userColumns);
	}

	public function down()
	{
        $this->dropTable('calendar');
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