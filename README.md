# API Açaí

* Protótipo de um aplicativo para pedir açaí
___

## Instalação

* Necessario cria um banco de dados chamado `acai`

    * `cp .env.example .env`
    * `npm ci`
    * `composer install`
    * `php artisan key:generate`
    * `php artidan migrate`

* Para Dev
    * `php artisan db:seed`
    * `php artisan serve` para rodar

> Para testar a API, recomenda-se o uso do Insomnia, rotas disponíveis no arquivo `rotasAcai.json` na raiz do projeto
