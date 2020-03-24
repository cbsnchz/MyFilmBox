CREATE USER 'admin'@'%' IDENTIFIED BY 'molamaswordpress';
GRANT ALL PRIVILEGES ON `usuarios`.* TO 'usuarios'@'%';

CREATE USER 'admin'@'localhost' IDENTIFIED BY 'molamaswordpress';
GRANT ALL PRIVILEGES ON `usuarios`.* TO 'usuarios'@'localhost';