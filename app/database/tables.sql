DROP TABLE IF EXISTS artista;

CREATE TABLE IF NOT EXISTS artista (
    id              INTEGER PRIMARY KEY,
    nome            TEXT    NOT NULL,
    dataNascimento  TEXT
);

INSERT INTO artista (id, nome, dataNascimento);


DROP TABLE IF EXISTS obra;

CREATE TABLE IF NOT EXISTS obra (
    id              INTEGER PRIMARY KEY,
    nome           TEXT    NOT NULL
);

DROP TABLE IF EXISTS usuarios;
DROP TABLE IF EXISTS veiculos;