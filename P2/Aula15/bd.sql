CREATE TABLE conta (
    id CHAR(10) NOT NULL PRIMARY KEY,
    descricao VARCHAR(100) NOT NULL,
    valor DECIMAL(10,2) DEFAULT 0
) ENGINE = INNODB;

INSERT INTO conta ( id, descricao, valor )
VALUES
( '01', 'Comprar cerveja',           50.00),
( '02', 'Receber aposta do João',   100.00),
( '03', 'Apostar no jogo do bicho',  10.00),
( '04', 'Comprar leite',              6.00);
