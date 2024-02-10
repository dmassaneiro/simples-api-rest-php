# API REST Simples com PHP + Mysql

## Tecnologias utilizadas:
* PHP
* Mysql
* Composer
* Flight PHP

## Como Rodar o Projeto
* Altere as variaveis de conexão com o Mysql no arquivo `src/config.php`
````php
const DB = array(
    'HOST' => 'seu_host',
    'DBNAME' => 'seu_dbname',
    'USER' => 'seu_usuario',
    'PASS' => 'seu_password',
);
````

* Crie a tabela com o script SQL abaixo:
````sql
create table tb_user(
	id serial primary key,
	name varchar(100),
	email varchar(50),
	age int,
	dt_register datetime default current_timestamp
);
````

* Instale as dependencias do projeto com o composer
```bash
composer install
````
---

## ENDPOINT's E METODOS CRUD API REST
POST - `http://localhost/simples-api-rest-php/user` <br>

`````json
// Request
{
  "name": "Maria Jose",
  "email": "maria@email.com",
  "age": 25
}
`````

`````json
// Response
{
  "id": 1,
  "name": "Maria Jose",
  "email": "maria@email.com",
  "age": 25,
  "dt_register": "2024-02-10 13:09:54"
}
`````
---

GET - `http://localhost/simples-api-rest-php/users`
````json
// Response
[
  {
    "id": 1,
    "name": "Maria Jose",
    "email": "maria@email.com",
    "age": 25,
    "dt_register": "2024-02-10 13:09:54"
  },
  {
    "id": 2,
    "name": "Jose Maria",
    "email": "jose@email.com",
    "age": 20,
    "dt_register": "2024-02-10 13:12:35"
  }
]

````

PUT - `http://localhost/simples-api-rest-php/user/{id}`
`````json
// Request
{
  "name": "João Silva",
  "email": "joao@email.com",
  "age": 30
}
`````

`````json
// Response
{
  "id": 1,
  "name": "João Silva",
  "email": "joao@email.com",
  "age": 30,
  "dt_register": "2024-02-10 13:09:54"
}
``````


---
DELETE - `http://localhost/simples-api-rest-php/user/{id}`
`````json
// Response
"Usuário removido com sucesso"
``````

----
## Créditos
Diego Massaneiro<br>
Duvidas ou sugestou de projeto entrar em contato:
email: dmassaneiro95@gmail.com

