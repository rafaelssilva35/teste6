
### pré requisitos

docker, docker-compose

  

# comandos

### 1 A pós docker instalado e docker-compose execute o comando

```sh
$ dokcer-compose up -d
```

### 2 Listar os containers para pegar o ID do container para executar as seeders

```sh
$ docker ps
```

```sh
saida

CONTAINER ID IMAGE COMMAND CREATED STATUS PORTS NAMES

3f69d37532ba bitnami/laravel:7 "/app-entrypoint.sh …" 17 minutes ago
```

### 3 no resultado do passo 2 pegue o id do container que tiver a imagem {bitnami/laravel:7} e execute o seguinte comando

```sh
$ docker exec php artisan db:seed
```
```sh
saída como podem ver pode demorar um pouco para povoar o bando devido o volume de dados

Seeding: User

Seeded: User (21.8 seconds)

Seeding: UserAcess
```