CREATE TABLE producto(
    id INT AUTO_INCREMENT PRIMARY KEY,
    codigo VARCHAR(10),
    nombre VARCHAR(50),
    precio FLOAT,
    existencia INT,
    UNIQUE (codigo)
);
 
INSERT INTO `producto` (`id`, `codigo`, `nombre`, `precio`, `existencia`) VALUES
(1, 'rat01', 'Raton XX con cable', 12, 50),
(2, 'rat02', 'Raton XX USB', 14, 45),
(3, 'tec01', 'Teclado XX con cable', 12, 25),
(4, 'tec02', 'Teclado XX USB', 14, 22),
(5, 'tec03', 'Teclado y raton USB', 22, 25),
(6, 'mon01', 'Monitor 19"', 99, 12),
(7, 'mon02', 'Monitor 22"', 125, 6);