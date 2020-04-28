CREATE USER IF NOT EXISTS'admin'@'%' IDENTIFIED BY 'molamaswordpress';
GRANT ALL PRIVILEGES ON `usuarios`.* TO 'admin'@'%';
GRANT ALL PRIVILEGES ON `peliculas`.* TO 'admin'@'%';
CREATE USER IF NOT EXISTS 'admin'@'localhost' IDENTIFIED BY 'molamaswordpress';
GRANT ALL PRIVILEGES ON `usuarios`.* TO 'admin'@'localhost';
GRANT ALL PRIVILEGES ON `peliculas`.* TO 'admin'@'localhost';