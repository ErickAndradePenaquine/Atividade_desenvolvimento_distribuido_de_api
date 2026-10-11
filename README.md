# Atividade - Desenvolvimento distribuido de API

API Laravel para cadastro de clientes, chamados, status e itens de estoque. O login usa JWT e a consulta de CEP é processada por uma fila.

## Instalação e banco de dados

Requisitos: PHP 8.5, Composer e MySQL. Crie o banco configurado em `DB_DATABASE` no `.env`.

No PowerShell:

```powershell
composer install
Copy-Item .env.example .env # somente se o arquivo .env ainda não existir
```

Configure no `.env` o acesso ao MySQL (`DB_HOST`, `DB_PORT`, `DB_DATABASE`, `DB_USERNAME` e `DB_PASSWORD`). Depois execute:

```powershell
php artisan key:generate # somente se APP_KEY estiver vazio
php artisan jwt:secret # somente se JWT_SECRET estiver vazio
php artisan config:clear
php artisan migrate --seed
```

O seeder cria o usuário de demonstração `admin@email.com`, senha `admin`, e os dados iniciais. 

## Iniciar a API e a fila

```powershell
php artisan serve
```

```powershell
php artisan queue:work
```

A API fica em `http://127.0.0.1:8000`. 
O worker processa a consulta ao ViaCEP após cadastrar ou atualizar um cliente.

## Testar no Postman

Todas as rotas, exceto `POST /api/login`, precisam do Bearer token.

### Autenticação

`POST http://127.0.0.1:8000/api/login`

```raw -> json
{
  "usuario": "admin@email.com",
  "password": "admin"
}
```

Copie `access_token` da resposta. Nas próximas requisições, abra **Authorization → Bearer Token** e cole o token.

`GET http://127.0.0.1:8000/api/me`
`POST http://127.0.0.1:8000/api/logout`

### Status

`GET http://127.0.0.1:8000/api/status`
`GET http://127.0.0.1:8000/api/status/1`
`POST http://127.0.0.1:8000/api/status`
`PUT http://127.0.0.1:8000/api/status/1`
`DELETE http://127.0.0.1:8000/api/status/1`

### Clientes

`POST http://127.0.0.1:8000/api/clientes`
`GET http://127.0.0.1:8000/api/clientes`
`GET http://127.0.0.1:8000/api/clientes/1`
`PUT http://127.0.0.1:8000/api/clientes/1`
`DELETE http://127.0.0.1:8000/api/clientes/1`

### Estoques

`POST http://127.0.0.1:8000/api/estoques`
`GET http://127.0.0.1:8000/api/estoques`
`GET http://127.0.0.1:8000/api/estoques/1`
`PUT http://127.0.0.1:8000/api/estoques/1`
`DELETE http://127.0.0.1:8000/api/estoques/1`

### Chamados

`POST http://127.0.0.1:8000/api/chamados`
`GET http://127.0.0.1:8000/api/chamados`
`GET http://127.0.0.1:8000/api/chamados/1`
`PUT http://127.0.0.1:8000/api/chamados/1`
`DELETE http://127.0.0.1:8000/api/chamados/1`

### Uso de estoque

`POST http://127.0.0.1:8000/api/usar-estoques`
`GET http://127.0.0.1:8000/api/usar-estoques`
`GET http://127.0.0.1:8000/api/usar-estoques/1`
`DELETE http://127.0.0.1:8000/api/usar-estoques/1`
