# Docker - API - Rodonaves Corretora

Para rodar o projeto é necessário estar dentro dessa pasta no terminal e ter o docker instalado execute o seguinte comando:
`docker-compose up`

Depois de acessar a raiz do projeto você deve rodar as migration para criar as tabelas no banco de dados

`docker-compose run artisan migrate` 

Lembrando que cada comando acima deve ser executado na sua vez.

Após feito isso use o SGBD de sua preferencia para importar a base de dados, dados para conexão:
**HOST:** _0.0.0.0_
**PORT:** _3306_
**DATABASE:** _jobsdev_
**USERNAME:** _root_
**PASSWORD:** _secret_


API Online no endereço:
[http://0.0.0.0](http://0.0.0.0)

