# DB Schema

- Books
- Copies
- Genres
- Conditions
- Book_Genre
- Users
- Loans

## Books (Book)

- id | BIGINT | PRIMARY_KEY AUTO_INCREMENT UNIQUE NOTNULL
- title | VARCHAR(255) NOTNULL INDEX
- plot | TEXT NULL
- price | DECIMAL(5, 2) NULL
- author | VARCHAR(255) NOTNULL
- year | YEAR NULL
- isAvailable | TINYINT NULL DEFAULT(0)
- note | TEXT | NULL

## Copies (Copy)

- id
- book_id
- condition_id
- location
- isbn | CHAR(13) NOTNULL UNIQUE
- publisher
- language | VARCHAR(5) NOTNULL DEFAULT('it-IT')
- pages | SMALLINT NULL
  
## Genres (Genre: peace and love  slug: peace-and-love)

- id
- name
- slug

### Table (pivot): Book_Genre

- book_id
- genre_id

## Conditions (Condition)

- id
- description

## Users (User)

- id
- name
- lastname
- address
- email
- phone

## Loans (Loan)

- id
- copy_id
- user_id
- start_date
- end_date
