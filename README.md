##Teste Técnico Vitamina web

###Subir container docker
`docker-compose up` ou `docker-compose up --force-recreate`

###Rodar migrations e seeders
`docker-compose exec web php artisan migrate:fresh --seed`

###Usuário para login
- foram criados vários usuários para login, para o frontend pode-se usar o usuário admin@admin.com com senha admin


###Rodar frontend
- `npm install`
- `ng serve`
- o host do backend já foi setado no environment de desenvolvimento
- caso seja necessário realizar build verificar se environment de produção está com a variável url apontando correta

###Testes realizados através do Pest
- `docker-compose exec web php vendor/bin/pest`

###Actions encontra-se no arquivo .github/workflows/laravel.yml

###Link do postman: https://www.postman.com/blue-flare-993149/workspace/test-vitamina-web
