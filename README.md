# Docker - API
  
#### Para rodar o projeto é necessário estar dentro dessa pasta no terminal e ter o docker instalado execute o seguinte comando:
`docker-compose up`

#### Crie o arquivo .env na raiz (Cole nele o conteudo do .env-example).

#### Execure o seguinte comando na sequencia para instalar de dependencias 
`docker-compose run composer install`

#### Para gerar uma nova key no seu .env execute o seguinte comando:
`docker-compose run artisan key:generate`

#### Para criar as tabelas no seu banco de dados execute:
`docker-compose run artisan migrate`

#### Caso peça permissão do container mysql para rodar as migrations execute:
`sudo chmod 777 -R docker/mysql`

#### Use o SGBD de sua preferencia para acessar o banco de dados:

**HOST:** `0.0.0.0`

**PORT:** `3306`

**DATABASE:** `jobsdev`

**USERNAME:** `root`

**PASSWORD:** `secret`

#### API Online no endereço:
[http://localhost:7000/](http://localhost:7000/)

#### Caso queira rodas os testes execute o comando:
`docker-compose run artisan test`

