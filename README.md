# StarGrid – Teste Desevolvedor(a) Backend N3

## O que é a StarGrid
A StarGrid é uma startup de Porto Alegre voltada para a área de Recursos Humanos. Nosso propósito é melhorar a rotina de colaboradores e gestores de escalas de trabalho e plantões.

## VAGA: Desenvolvedor(a) Backend N3
Para esta vaga, desenvolvemos um teste em que analisaremos alguns critérios.

**Por favor, leia com atenção este documento e o código disponibilizado!**

## Critérios de avaliação
- Boa interpretação das instruções do teste
- Clareza e legibilidade de código
- Identificação e resolução do problema apresentado
- Orientação a objetos
- Migration
  - Crie em uma migration, uma tabela chamada `reports` com os seguintes campos:
    - `external_id` : int
    - `title` : string
    - `url` : string
    - `summary` : string
- Retorno no formato JSON

## Instruções sobre o teste
Neste teste você criará um *middleware* para uma API pública sobre voos espaciais, baseado no **Laravel 7**.

Ou seja, você receberá alguns requests, fará um tratamento dos dados recebidos e consultará a API abaixo:

**Space Flight News API –** https://www.spaceflightnewsapi.net/documentation#/

### IMPORTANTE
O foco do teste é desenvolver uma API. O retorno é somente JSON. **Não desenvolva interface gráfica em PHP!**

Demais instruções:
- Existem 2 endpoints implementados. Fique a vontade para fazer qualquer correção ou alteração que achar necessário.
- Alguns erros e falta de padrões foram inseridos intencionalmente para verificar a habilidade do candidato de resolver problemas de código durante o dia a dia.
- Crie testes unitários e funcionais para todos endpoints. *Dica: alguns testes já estão no código.*

Observações: qualquer refatoração é opcional. Se você acredita ter uma forma melhor ou mais eficiente de fazer algo, fique a vontade.

## Entrega deste teste
- Faça um clone deste repositório em uma conta github pessoal.
- Crie um arquivo README.md no raiz do seu projeto com instruções de execução e considerações que você julgar importante.
- Envie os seguintes dados para o email **teste.n3@stargrid.pro**
  - Link do seu repositório pessoal com a resolução do teste
  - Pretensão salarial (modalidade PJ)

## Prazo para envio
- Envie este teste em até 7 dias após o recebimento das instruções.

## DIFERENCIAIS!
O foco do teste é mensurar suas *skills* técnicas de backend.  
Os itens abaixo não são obrigatórios para esta vaga, mas podem ser um diferencial bacana!
### React
Desenvolver uma interface gráfica para exibir os dados dessa API em React.

### Docker
Criar um `Dockerfile` e/ou `docker-compose` para subir o ambiente em microsserviços.

## Obrigado
Obrigado pela sua participação e BOA SORTE!!! 🦄
