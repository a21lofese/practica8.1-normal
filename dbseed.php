<?php
require 'bootstrap.php';

$statement = <<<EOS
    CREATE TABLE IF NOT EXISTS contactos (
        id INT NOT NULL AUTO_INCREMENT,
        nombre VARCHAR(256) NOT NULL,
        telefono VARCHAR(10) NOT NULL,
        email VARCHAR(256) NOT NULL,
        created_at DATETIME NOT NULL,
        updated_at DATETIME NOT NULL,
        PRIMARY KEY (id)
    ) ENGINE=INNODB;

    INSERT INTO contactos
        (nombre, telefono, email, created_at, updated_at)
    VALUES
        ('Juan', '123456789', 'juan@gmail.com', NOW(), NOW()),
        ('Pedro', '987654321', 'pedro@gmail.com', NOW(), NOW()),
        ('Maria', '123987456', 'maria@gmail.com', NOW(), NOW()),
        ('Luis', '456123789', 'luis@gmail.com', NOW(), NOW()),
        ('Ana', '789456123', 'ana@gmail.com', NOW(), NOW());
EOS;

try {
    $createTable = $dbConnection->exec($statement);
    echo "Success!\n";
} catch (\PDOException $e) {
    exit($e->getMessage());
}