Plugin para Controle de Acesso com CakePHP 3
===========================================

[![Licença](https://img.shields.io/packagist/l/doctrine/orm.svg?maxAge=2592000)](https://github.com/ribafs/cake-control-br/blob/master/LICENSE)
[![Último Estável](https://img.shields.io/packagist/v/elboletaire/twbs-cake-plugin.svg?style=flat-square)](https://packagist.org/packages/ribafs/cake-control-br)
[![Tamanho do Download](https://img.shields.io/crates/d/rustc-serialize.svg?maxAge=2592000)](https://github.com/ribafs/cake-control/releases)

Este plugin inclue os plugins
[lessjs](http://lesscss.org/#client-side-usage-browser-options) e parsers
[less.php](https://github.com/oyejorge/less.php#lessphp) e permite que você desenvolva facilmente aplicativos com o CakePHP e (Twitter) Bootstrap e também inclui a estrutura do plugin [twbs-cake-plugin](https://github.com/elboletaire/twbs-cake-plugin) para criar este plugin como um fork.

## Principais recursos
    Template do bake traduzido para pt_BR
    Element topmenu
    Editor TinyMCE
    Busca com paginação
    Senhas criptografadas com Bcrypt
    Controle de Acesso Admin/Panel
    Parsers less
    LessHelper
    Layout default com o Bootstrap
    Utilitários do BootstrapUI plugin
## Instalação e uso
Criar app:
composer create-project --prefer-dist cakephp/app control1

Instalar Plugin

cd control1
composer require ribafs/cake-control-br

Configurar banco
Crie o banco e importe o script existente na pasta docs do plugin baixado. Depois edite config/app.php para configurar o banco.

Aproveite e configure também o controller default em config/routes.php para um de seu interesse.

Habilitar o plugin
bin/cake plugin load CakeControlBr --bootstrap

Download do plugin
https://github.com/ribafs/cake-control-br/archive/master.zip

Descompactar e abrir o diretório docs, então:

bootstrap_cli.php para a control1/config (Com isso o Bake gerarará Users com login e logout)
AppController.php para control1/src/Controller


cd control1

bin/cake bake all groups -t CakeControlBr

bin/cake bake all users -t CakeControlBr

bin/cake bake all permissions -t CakeControlBr

bin/cake bake all customers -t CakeControlBr


Existem 4 usuários, cada um com permissões diferentes:

super - com senha super também tem total permissão em tudo.

admin - com senha admin tem total permissão nas tabelas groups, users e permissions.

manager - com senha manager tem total permissão somente nas tabelas diferentes de 
groups, users e permissions.

user - com senha user não tem nenhuma permissão no aplicativo, apenas de efetuar login.


Em AppController.php você pode definir o controller default para usuários não administradores. Caso não use a tabela customers troque logo no início do AppController por uma de suas tabelas na linha:

    protected $noAdmins = 'Customers';


# Documentação
Este plugin foi criado com a versão 3.3.6 do CakePHP e pode requerer alteração em novas versões.

http://ribafs.org/portal/cakephp/plugins/cake-control-br/introducao


Para mais detalhes, veja a documentação sobre o cake-control:

http://ribafs.org/portal/cakephp/plugins/cake-control/introducao 


## Sugestões, colaborações e forks serão muto bem vindos:

- Erros: português
- PHP
- CakePHP
- ControlComponent.php
- etc

License
-------

The MIT License (MIT)
