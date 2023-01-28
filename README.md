# Autosserviço de bebidas - Software de Gestão

Protótipo de um sistema de autosserviço de bebidas, baseado em crédito para o usuário, com tag de identificação. Integrado com um sistema de gestão para o proprietário.

O fluxo de funcionamento consiste em o cliente cadastra-se no caixa a sua tag ID, e a partir desse cadastro realizar a compra dos créditos. O cliente ficaria em posse dessa tag, e poderá se servir de forma autônoma em um dos dispensers, desde que possua os créditos. Dessa forma, o equipamento proporcionará agilidade para o cliente e automação para o negócio. 

O Sistema de dispenser por meio de um módulo RFID, realizará uma consulta ao banco de dados, que por sua vez, retorna o nome do usuário, e seu respectivo crédito no display, e no caso do usuário não possuir créditos, impedir o fornecimento da bebida. O sensor de fluxo identifica a quantidade de líquido consumida em ml, e em quanto atingir o limite estabelecido interrompe o fornecimento e atualiza o crédito do usuário.

O sofware de gestão do proprietário, tem o objetivo de entregar um balancete do estabelecimento, para facilitar a gestão e controle do estabelecimento, por meio de uma aplicação web, assim permitindo que o gestor acessar remotamente. O sistema apresenta quatro áreas de informações, sendo elas: Balanço geral do estabelecimento; Vandas realizadas no caixa; Consumo dos usuários no dispenser; e o registro das despesas do estabelecimento. 

Esse repositório destina-se ao *software de gestão* do protótipo, o projeto deve ser executado junto com os seguintes repositórios: 
- Banco de dados: https://github.com/guilhermesetim/selfservice-bebidas-bd
- Dispenser: https://github.com/guilhermesetim/selfservice-bebidas-dispenser
- Caixa: https://github.com/guilhermesetim/selfservice-bebidas-caixa

## Software de Gestão

O sofware de gestão do proprietário, tem o objetivo de entregar um balancete do estabelecimento, para facilitar a gestão e controle de sua empresa.

O software foi desenvolvido na linguagem php, pois o objetivo é que o gestão acesse remotamente. O sistema inicia com uma seção de login, após a validação entra no sistema principal. O sistema apresenta quatro áreas de informações, sendo elas: Balanço geral
do estabelecimento; Vandas realizadas no caixa; Consumo dos usuários no dispenser; e o registro das despesas do estabelecimento.

O sistema realiza a comunicação com o mesmo banco de dados do caixa e do dispenser, assim atualizando as informações ao mesmo instante que os demais sistemas.


### Software
- Linguagem de programação: Php 8

### Recursos a serem implementados
- [ ] Autenticação de login junto ao banco de dados;
- [ ] Indicar o usuário logado durante a aplicação;
- [ ] Cadastramento das despesas do estabelecimento;
- [ ] Nivéis de permissão;


## Como executar o projeto
### Requisitos
- Php;
- MySql;
- Apache 2;


### Como adequar ao seu projeto
No arquivo infoBd.php, necessário informar a senha do seu banco de dados instalado.

# Autor
Guilherme Setim