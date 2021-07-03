Roteiro para a Criação de um Aplicativo com CakePHP 3 Usando o Componente Control
Para servir de seção de administração

## Este arquivo foi abandonado.
Agora estou mantendo apeas no meu site pessoal:

http://ribafs.org/portal/cakephp/cakephp-3-plugins/plugin-cake-control-twbs-recursos

Suporte a PostgreSQL e MySQL

Na pasta docs existe um script para a criação das tabelas groups, users, permissions e servidores (para mysql e para postgresql), 
que serão usadas na criação da seção de administração. Quando for criar outro aplicativo, pode usar o roteiro abaixo e criar 
suas próprias tabelas no lugar destas, assim como gerar seu próprio código, usando o Bake ou partindo do zero.
Lembre de manter as tabelas groups, users e permissões, pois são a base do Componente Control.

O script do banco já vem com registros nas tabelas groups e servidores. Servidores é apenas uma tabela de demonstração didática, não a que usaremos na nossa intranet, é apenas para demonstrar como poderemos criar a nossa.

Os registros da tabela users serão cadastrados manualmente, cada um, através do aplicativo pela web.

Os registros da tabela permissions serão cadastrados pelo aplicativo automaticamente, através da chamada do componente em AppController.php, somente no primeiro login. Depois do primeiro login podemos até comentar as respectivas linhas.


### Roteiro para a criação do aplicativo com Controle de Acesso

Considere que estou criando um aplicativo chamado de cakecontrol1 (altere a vontade)

1) Criação do aplicativo com o Framework CakePHP 3

cd /var/www/html ou c:\xampp\htdocs

composer create-project --prefer-dist cakephp/app cakecontrol1

Aguarde a criação do aplicativo usando a última versão do CakePHP 3.

2) Criação do banco de dados e um esquema
Crie o banco de dados e importe o script da pasta docs
Configure o banco em config/app.php

3) Configurar o routes para Permissions/index
Edite o cakecontrol1/config/routes.php

Altere a linha:

    $routes->connect('/', ['controller' => 'Pages', 'action' => 'display', 'home']);
    
Para:

    $routes->connect('/', ['controller' => 'Permissions', 'action' => 'index']);

4) Customizar o código gerado pelo Bake

Copiar sobrescrevendo de docs para...

bootstrap.php para a cakecontrol1/config

bootstrap_cli.php para a cakecontrol1/config

AppController.php para cakecontrol1/src/Controller

ControlComponent.php para cakecontrol1src/Controller/Component

5) Gerar os CRUDS já traduzidos

Execute:

cd cakecontrol1

bin/cake bake all groups --theme CakeControlTwbs --force

bin/cake bake all users --theme CakeControlTwbs --force

bin/cake bake all permissions --theme CakeControlTwbs --force

bin/cake bake all servidores --theme CakeControlTwbs --force

Acesse pela Web

9) Implementar busca
Edite o controller e descomente o action index() do controller da busca e comente o action index atual.

10) Customização dos Rótulos dos campos em views como Template/Users/login.ctp
Já foi feito pela customização do template do Bake, mas veja os passos abaixo, como fazer:

A linha

        <?= $this->Form->input('username') ?>        
        
Mude para

        <?= $this->Form->input('username', ['label'=>'Login']) ?>        
        
Assim faça com os demais

11) Validação de cpf, cnpj, fone, email, data, cep, null, not null, login (nome.sobrenome)
Apenas alguns foram implementados. Veja o arquivo docs/ValidacoesDicas.txt

12) Cadastrar os usuários para implementar o Controle de Acesso

12.1) Descomente no initialize() do cakecontrol1/src/AppController.php a linha 64:

		$this->Auth->allow(['index','add','edit']);

Salve

12.2) Acesse o aplicativo pela web para cadastrar 4 usuários, um cada grupo

http://localhost/cakecontrol1/users/add 

Use para senha de teste o mesmo que o login, assim
```php
Grupo		Usuário		Senha

Supers		user		super
Admins		admin		admin
Managers	manager		manager
Users		user		user
```
Agora temos 4 grupos:
```php
Supers - poder total, acessam tudo do aplicativo
Admins -acesso total às tabelas administrativas: groups, users e permissions
Managers - acessam tudo que Admins não acessam: todas as tabelas diferentes de groups, users e permissions, no caso servidores
Users - inicialmente tem acesso somente ao login e logout. Para que possa acessar qualquer outro action precisa que seja cadastrado nos actions respectivos. 
```

12.3) Testando o Aplicativo

Comente novamente a linha 64 do cakecontrol1/src/AppController.php e salve

Agora tecle F5 no navegador que ele pedirá a login e senha.

Experimente acessar como

user e user

Ele acessa, tanto que mostra "Logado como User" e o botão Sair, mas recebe uma 
mensagem de erro por não ter acesso a Servidores/index.

O componente popula automaticamente a tabela permissions, mas somente para supers,
admins e managers. Nada para users

12.4) Concedendo Permissão

Vamos dar acesso ao usuário user apenas ao controller Servidores e action index().

Acesse pela web

http://localhost/cakecontrol1/permissions/add

(Faça login como super ou admin. Ambos têm permissão de acesso total em Permissions)

E adicione uma nova Permissions para o Group "Users" acessar o controller Servidores, action index:
```php
Group - Users
Controller - Servidores
Action - index
```
Obs.: idealmente devemos criar duas combos para o Permissions/add.ctp, uma para
controller e outra para action.

Clique em Sair

- Faça login agora com o usuário "user" e senha "user":

http://localhost/cakecontrol1/ 

Experimente acessar qualquer outro action, que não seja index. Será negado o acesso.
Apenas em Excluir, pois existe um bug no componente. Mostro uma forma de solucionar no item 16.


12.5) Dica

Remova o rótulo e o valor do campo password em Template/Users/index
Proceda de forma semelhante para tabelas com muitos campos, deixe apenas os mais importantes na index.ctp. 
Lembre que fazendo isso apenas deixará de mostrar alguns campos na tela. 


13) DisplayField()

Veja que Servidores/index mostra o ID dos usuários mas vamos mudar isso para que
apareça o username ao invés do ID. Veja como fazer no arquivo docs/displayField.txt


Remova o caption e o value de password em Template/Users/index.ctp

14) Clonando cakecontrol1

Dependendo de como está configurado seu servidor, logo após clonar este aplicativo gerando uma nova cópia, então precisará ajustar novamente as permissiões do sistema de arquivos, especificamente os diretórios /tmp e /logs.


15) Sugestão para Área Administrativa Centralizada
Uma área com um menu que chama cada um dos aplicativos e quando sair do aplicativo voltar para o menu. O aplicativo cakecontrol1 será clonado criando cada um dos novos aplicativos que comporão a intranet.

Obs.: antes de clonar este aplicativo para criar os novos aplicativos, lembre de remover a tabela servidores juntamente com todo o seu código e aproveitar apenas o restante.

Em /var/www/html temos:
```php
/intranet
	index.html
		Aplicativo 1
		Aplicativo 2
		Aplicativo 3

No aplicativo altero no initialize do AppController o logoutRedirect para:

            'logoutRedirect' => [
                'controller' => '/index.html',
                'action' => false
            ],
```
O index.html pode muito bem ser substituido por um menu no novo portal interno em Joomla.
O CMS terá um menu Intranet com itens de menu para cada aplicativo.

Assim quando clicar em Aplicativo 1 o aplicativo1 será chamado e quando clicar em Sair no aplicativo1 voltarei para o menu Intranet no CMS.

======================================================
Ribamar FS – http://ribafs.org - Fortaleza, 13/09/2016
