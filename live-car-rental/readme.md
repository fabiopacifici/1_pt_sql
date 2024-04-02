# DB

Modellare la struttura di una tabella per memorizzare tutti i dati riguardanti delle auto usate messe in vendita da un concessionario

## table: cars

- id (INT | BITINT)  | NOTNULL AUTO_INCREMENT PRIMARY_KEY UNIQUE
- brand VARCHAR(20) | NOTNULL
- model VARCHAR(20)  | NOTNULL
- year YEAR NULL
- km FLOAT(6,0)
- horse_power VARCHAR(4) NOTNULL
- cc VARCHAR(4) NOTNOLL
- type_of_engine VARCHAR(20) NOTNULL
- doors TINYINT NULL
- seats TINYINT NOLL
- color VARCHAR(50) NULL
- cover_image VARCHAR() NULL
- is_available TINYINT NOTNULL DEFAULT(0)
- transmission VARCHAR(10) NOTNULL
- price DECIMAL(8,2) NOTNULL
- vin VARCHAR(20) | NULL
- location VARCHAR(100) NULL
- note TEXT NULL
