-- Criação de um banco de dados
CREATE DATABASE IF NOT EXISTS db_moodle;

-- Criação de um usuário e concessão de privilégios
CREATE USER 'usr_moodle'@'localhost' IDENTIFIED WITH caching_sha2_password BY 'pw_moodle';
GRANT ALL PRIVILEGES ON *.* TO 'usr_moodle'@'localhost' WITH GRANT OPTION;
