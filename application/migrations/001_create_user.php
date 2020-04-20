<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_create_user extends CI_Migration {

        public function up()
        {
                $this->dbforge->add_field(array(
                        'id' => array(
                                'type' => 'INT',
                                'constraint' => 10,
                                'unsigned' => TRUE,
                                'auto_increment' => TRUE
                        ),
                        'nombre_usuario' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '100',
                        ),
                        'correo' => array(
                                'type' => 'VARCHAR',
                                'null' => TRUE,
								'constraint' => '100'
                        ),
						'contrasena' => array(
                                'type' => 'VARCHAR',
                                'null' => TRUE,
								'constraint' => '100'
                        ),
						'status' => array(
                                'type' => 'TINYINT',
								'constraint' => '1',
                                'null' => TRUE
                        ),
						'range' => array(
                                'type' => 'TINYINT',
								'constraint' => '1',
                                'null' => TRUE
                        ),
                ));
                $this->dbforge->add_key('id', TRUE);
                $this->dbforge->create_table('usuario');
        }

        public function down()
        {
                $this->dbforge->drop_table('blog');
        }
}