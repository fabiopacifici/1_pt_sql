# Relational db

## Focus dell'esercizio

Modelliamo una tabella per memorizzare le informazioni riguardanti i libri di una biblioteca.

- Book (Model) | Class
- Books (Table)

### Table name: Books

- id | BIGINT | PRIMARY_KEY AUTO_INCREMENT UNIQUE NOTNULL
- title | VARCHAR(255) NOTNULL INDEX
- isbn | CHAR(13) NOTNULL UNIQUE
- plot | TEXT NULL
- pages | SMALLINT NULL
- price | DECIMAL(5, 2) NULL
- ?author | VARCHAR(255) NOTNULL
- ?genre
- year | YEAR NULL
- language | VARCHAR(5) NOTNULL DEFAULT('it-IT')
- publisher | VARCHAR(255) NULL  
- ?country
- ?location
- isAvailable | TINYINT NULL DEFAULT(0)
- note | TEXT | NULL

| id            | title    | isbn        | plot    | pages          | price    | author      | genre   | ...
 -------------- | -------- |------------ |-------- | -------------- | -------- |------------ |-------- | ...
                                           NULL
