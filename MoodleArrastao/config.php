<?php  // Moodle configuration file

unset($CFG);
global $CFG;
$CFG = new stdClass();

$CFG->dbtype    = 'mysql';
$CFG->dblibrary = 'native';
$CFG->dbhost    = 'mysql'; // Nome do serviço do banco de dados no docker-compose.yml
$CFG->dbname    = 'db_moodle'; // Nome do banco de dados
$CFG->dbuser    = 'usr_moodle'; // Usuário do banco de dados
$CFG->dbpass    = 'pw_moodle'; // Senha do banco de dados
$CFG->prefix    = 'mdl_'; // Prefixo das tabelas do Moodle
$CFG->dboptions = array (
  'dbpersist' => 0,
  'dbport' => '',
  'dbsocket' => '',
  'dbcollation' => 'utf8mb4_unicode_ci',
);

$CFG->wwwroot   = 'http://127.0.0.1:8080'; // URL do seu site Moodle
$CFG->dataroot  = '/var/lib/docker/volumes/moodlearrastao_mysql_data/_data'; // Diretório de dados do Moodle
$CFG->admin     = 'admin'; // Usuário administrador do Moodle

$CFG->directorypermissions = 0777;

require_once(__DIR__ . '/lib/setup.php');

// Não inclua uma tag de fechamento PHP no final do arquivo
