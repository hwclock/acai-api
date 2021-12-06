# Zetta Açaí

___

## Instalação

* Necessario cria um banco de dados chamado `zetta-acai`

    * `cp .env.example .env`
    * `npm ci`
    * `composer install`
    * `php artisan key:generate`
    * `php artidan migrate`

* Para Dev
    * `php artisan db:seed`
    * `php artisan serve` para rodar