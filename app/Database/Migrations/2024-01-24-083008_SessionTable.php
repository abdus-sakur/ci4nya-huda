<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class SessionTable extends Migration
{
    public function up()
    {
        db_connect()->query("
        CREATE TABLE IF NOT EXISTS `sessions` (
            `id` varchar(128) NOT null,
            `ip_address` varchar(45) NOT null,
            `timestamp` timestamp DEFAULT CURRENT_TIMESTAMP NOT null,
            `data` blob NOT null,
            KEY `sessions_timestamp` (`timestamp`)
        );
        ");
    }

    public function down()
    {
        $this->forge->dropTable('sessions');
    }
}
