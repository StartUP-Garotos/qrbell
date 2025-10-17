CREATE TABLE residencias (
	numero INT NOT NULL UNIQUE,
    proprietario VARCHAR(255) NOT NULL,
    telefone VARCHAR(20) NOT NULL
);

INSERT INTO residencias (numero, proprietario, telefone) VALUES ("101","Arthur","47996792788"), ("102","Vitor","47991075493");