DROP TABLE IF EXISTS artistas;

CREATE TABLE IF NOT EXISTS artistas (
    id              INTEGER PRIMARY KEY,
    nome            TEXT    NOT NULL,
    dataNascimento  TEXT
);

INSERT INTO artistas (id, nome, dataNascimento, tipo, ativado) values (1,'teste 1','01-01-2000',1,1);


/** essa tabela deve ser criada antes de veiculos,
pois veiculos depende dela
exemplo de relacionamento UM para MUITOS MODELO x VEICULOS  */
DROP TABLE IF EXISTS modelos;
CREATE TABLE IF NOT EXISTS modelos (
    id              INTEGER PRIMARY KEY,
    modelo           TEXT    NOT NULL
);

INSERT INTO modelos (id, modelo) values (1,'Físico');
INSERT INTO modelos (id, modelo) values (2,'Virtual');




DROP TABLE IF EXISTS obras;

CREATE TABLE IF NOT EXISTS obras (
    id              INTEGER PRIMARY KEY,
    nome           TEXT    NOT NULL,
    modelo_id       INTEGER,
    editora         TEXT,
    ano             INTEGER,
    /* definicao de chave estrangeira */
    FOREIGN KEY (modelo_id)
       REFERENCES modelos (id)
);

/** essa tabela deve ser criada depois de veiculos e usuarios,
exemplo de relacionamento MUITOS para MUITOS USUARIOS x VEICULOS */

DROP TABLE IF EXISTS ;
CREATE TABLE IF NOT EXISTS colecionadores (
    id      INTEGER PRIMARY KEY,
    artista_id      TEXT    NOT NULL,
    obra_id      TEXT    NOT NULL,
    /* definicao de chave estrangeira */
    FOREIGN KEY (artista_id)
       REFERENCES artistas (id),
    FOREIGN KEY (obra_id)
       REFERENCES obras (id)
);
DROP TABLE IF EXISTS obra;
DROP TABLE IF EXISTS artista;
DROP TABLE IF EXISTS colecionador;