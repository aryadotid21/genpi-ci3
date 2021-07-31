<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Migration_User extends CI_Migration
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
            'email'          => [
               'type'           => 'VARCHAR',
               'constraint'     => '100',
            ],
            'password'       => [
               'type'           => 'VARCHAR',
               'constraint'     => '100',
            ],
            'name'       => [
               'type'           => 'VARCHAR',
               'constraint'     => '100',
            ],
            'alamat'       => [
               'type'           => 'VARCHAR',
               'constraint'     => '100',
            ],
            'foto'       => [
               'type'           => 'VARCHAR',
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
      $this->dbforge->create_table('users');
   }

   public function down()
   {
      $this->dbforge->drop_table('users');
   }
}
