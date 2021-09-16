# Docker - API
  
Para rodar o projeto é necessário estar dentro dessa pasta no terminal e ter o docker instalado execute o seguinte comando:
`docker-compose up`

Crie o arquivo .env na raiz (Cole nele o conteudo do .env-example).

Execure o seguinte comando na sequencia para instalar de dependencias 
`docker-compose run composer install`

Para gerar uma nova key no seu .env execute o seguinte comando:
`docker-compose run artisan key:generate`

Para criar as tabelas no seu banco de dados execute:
`docker-compose run artisan migrate`

Após feito isso use o SGBD de sua preferencia para importar a base de dados, dados para conexão:

**HOST:** _0.0.0.0_
**PORT:** _3306_
**DATABASE:** _jobsdev_
**USERNAME:** _root_
**PASSWORD:** _secret_

API Online no endereço:
[http://localhost:7000/](http://localhost:7000/)

Caso queira rodas os testes execute o comando:
`docker-compose run artisan test`

