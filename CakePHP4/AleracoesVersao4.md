## Changes

## Nesta versão não consegui manter

- bootstrap_cli.php, portanto os actions e views login e logout precisarão ser criados manualmente, pelo menos por em quanto

O grande problema aqui está nan estruturas de pastas em
vendor/cakephp/bake

Que mudou muito em relação ao Cake3.

Alterações:

Não aceitou carregar assim:
bin/cake plugin load AdminBr4 --bootstrap

Precisei remover:
bin/cake plugin load AdminBr4

Após remover com
composer remove ribafs/admin-br4

Ainda assim precisei remover a linha em
src/Application.php

Agora irei remover o tempalte traduzido do bake
Deixando apenas o componente AclBr e do entity com o bcrypt.

Ainda assim está dando trabalho.
Caso não consiga irei criar aplicativos que usem o componente e o entity manualmente.
Desisto?
