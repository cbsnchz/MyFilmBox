CREATE USER IF NOT EXISTS 'admin'@'localhost' IDENTIFIED BY 'molamaswordpress';
GRANT ALL PRIVILEGES ON `usuarios`.* TO 'admin'@'localhost';
GRANT ALL PRIVILEGES ON `peliculas`.* TO 'admin'@'localhost';
GRANT ALL PRIVILEGES ON `productos`.* TO 'admin'@'localhost';