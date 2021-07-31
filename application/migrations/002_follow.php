<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Migration_Follow extends CI_Migration
{
    public function up()
    {
        $this->dbforge->add_field(
            array(
                'id'          => [
                    'type'           => 'INT',
                    'constraint'     => 5,
                    'unsigned'       => true,
                    'auto_increment' => true
                ],
                'follower_id'          => [
                    'type'           => 'INT',
                    'constraint'     => '100',
                ],
                'following_id'       => [
                    'type'           => 'INT',
                    'constraint'     => '100',
                ],
                'created_at' => [
                    'type'           => 'DATETIME',
                    'null'           => true,
                ],
                'updated_at' => [
                    'type'           => 'DATETIME',
                    'null'           => true,
                ]
            )
        );
        $this->dbforge->add_key('id', TRUE);
        $this->dbforge->create_table('follows');
    }

    public function down()
    {
        $this->dbforge->drop_table('follows');
    }
}
