Plugin para controle de acesso de aplicativos com CakePHP 3 traduzido para pt_BR
================================================================================

[![Licença](https://img.shields.io/packagist/l/doctrine/orm.svg?maxAge=2592000)](https://github.com/ribafs/cake-control-twbs/blob/master/LICENSE)
[![Último Estável](https://img.shields.io/packagist/v/elboletaire/twbs-cake-plugin.svg?style=flat-square)](https://github.com/ribafs/cake-control-twbs/releases)
[![Tamanho do Download](https://img.shields.io/crates/d/rustc-serialize.svg?maxAge=2592000)](https://packagist.org/packages/ribafs/cake-control-twbs)

Este plugin inclui os plugins
[lessjs](http://lesscss.org/#client-side-usage-browser-options) e
[less.php](https://github.com/oyejorge/less.php#lessphp) parsers e permite que você facilmente crie aplicativos em CakePHP 3 com (Twitter) Bootstrap e
[twbs-cake-plugin](https://github.com/elboletaire/twbs-cake-plugin)

## Principais Recursos

    Tradução para pt-BR
    Element topmenu
    Editor TinyMCE
    Busca por vários campos e com paginação
    Cripografia de senhas com Bcrypt
    Controle de acesso com o componente Control
    Parsers less
    LessHelper
    Template Bake
    Layout default com Bootstrap
    Utilitários do plugin BootstrapUI
    etc


# Documentação Atualizada e Amigável
Como é mais prático para mim criar o conteúdo em meu site pessoal e tenho mais controle, não mais atualizarei a documentação por aqui. Por favor acesse

http://ribafs.org/portal/cakephp/plugins/cake-control-twbs

Instalação
------------

## Crie um novo aplicativo com o cakephp 3 usando o composer:

```bash
composer create-project --prefer-dist cakephp/app control1
```
## Instalar o plugin cake-control-twbs, executando:

```bash
composer require ribafs/cake-control-twbs
```
### Habilitar o plugin

Adicionar o plugin ao script config/bootstrap.php:

```php
Plugin::load('CakeControlTwbs', ['bootstrap' => true]);
```
Isso carregará os plugins Less e BootstrapUI

### Configuração

```php
// Adicione ao início do src/AppController.php

public $helpers = [
    'Less.Less', // required for parsing less files
    'BootstrapUI.Form',
    'BootstrapUI.Html',
    'BootstrapUI.Flash',
    'BootstrapUI.Paginator'
];
```

### Layout

Adicione ao initialize() do src/AppController.php

```php
$this->viewBuilder()->layout('CakeControlTwbs.default');
```
Caso prefira usar CSS ao invés de Less precisará de:
[BootstrapUI](https://github.com/FriendsOfCake/bootstrap-ui/tree/master/src/Template/Layout) layouts.

### Criar banco e configurar.
Então, para teste, use o script existente na pasta docs

### Gerando o código com Bake

```bash
bin/cake bake all Groups --theme CakeControlTwbs
bin/cake bake all Users --theme CakeControlTwbs
bin/cake bake all Permissions --theme CakeControlTwbs
bin/cake bake all Servidores --theme CakeControlTwbs
```

## Implementando o Controle de Acesso e outros Recursos

Atualizado aqui

http://ribafs.org/portal/cakephp/plugins/cake-control-twbs-recursos

Sem atualização aqui:

Veja no diretório [docs](https://github.com/ribafs/cake-control-twbs/tree/master/docs) outros recursos.
Siga os passos do docs/1leiame.md para implementar o controle de acesso e mais recursos.
[1leiame.md](https://github.com/ribafs/cake-control-twbs/blob/master/docs/1leiame.md)

## Todo/Por Fazer

- Automatizar a instalação do componente Control e do AppController, entre outros recursos diretamente no template do Bake do Plugin.

- Criar um plugin em inglês, ou melhor ainda, criar um único plugim que fale os dois idiomas de forma automática ou simples.

Também pode gerar suas views usando
[BootstrapUI's bake templates](https://github.com/FriendsOfCake/bootstrap-ui/tree/master/src/Template/Bake).
Veja o readme para detalhes.

Utilities
---------

This plugin "includes" the following utilities (all they come from other plugins):

- [Less](https://github.com/elboletaire/less-cake-plugin) [LessHelper](https://github.com/elboletaire/less-cake-plugin#usage)
- [BootstrapUI](https://github.com/FriendsOfCake/bootstrap-ui) [FormHelper](https://github.com/FriendsOfCake/bootstrap-ui#basic-form)
- [BootstrapUI](https://github.com/FriendsOfCake/bootstrap-ui) [HtmlHelper](https://github.com/FriendsOfCake/bootstrap-ui/blob/master/src/View/Helper/HtmlHelper.php)
- [BootstrapUI](https://github.com/FriendsOfCake/bootstrap-ui) [FlashHelper](https://github.com/FriendsOfCake/bootstrap-ui/blob/master/src/View/Helper/FlashHelper.php)
- [BootstrapUI](https://github.com/FriendsOfCake/bootstrap-ui) [PaginatorHelper](https://github.com/FriendsOfCake/bootstrap-ui/blob/master/src/View/Helper/PaginatorHelper.php)

License
-------

The MIT License (MIT)

Fork
----

Este plugin é um fork do plugin https://github.com/elboletaire/twbs-cake-plugin
do Òscar Casajuana (a.k.a. elboletaire).

