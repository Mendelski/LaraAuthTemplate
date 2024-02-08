## Projeto base para qualquer sistema com auth em laravel 

#### o projeto contém código encontrado publicamente na internet 

## Como executar

O projeto usa uma arquitetura padrão laravel
sendo o mesmo setup de qualquer outro projeto 

Para executar tenha certeza que tem o php com a mesma versão solicitada em composer.json > require

No caso deste projeto é necessário:
- PHP 8.1 (ou maior)
- Composer
- NPM (ou yarn)
- Banco de dados SQL (estamos usando o PgSQL) 

Caso seja necessário altere o arquivo database.php para editar a conexão caso não use o PostgreSQL.


usando o arquivo .env.example crie um arquivo .env e configure as variáveis de ambiente



Tendo tudo configurado é necessário rodar alguns scripts 

Instalar dependências do npm
```
npm install
```
Instalar dependências do composer

```
composer install
```

executar migrações 
```
php artisan migrate
```

executar seeders para popular o banco
```
php artisan db:seed
```

Iniciar o servidor
```
php artisan serve
```
