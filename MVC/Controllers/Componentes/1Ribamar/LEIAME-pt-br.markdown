# Plugin Admin para CakePHP

Esta versão funciona com o CakePHP 3.

Objetivo - controlar o acesso dos usuários ao aplicativo. Ele controla o acesso a cada action de cada controller.
O controle associa o grupo do usuário ao action, gravando numa tabela. Quando cadastramos um grupo com um action, o componente garantirá acesso para todos os usuários do grupo nesse action.

Além de controlar os usuários ele também vem com um pequeno menu que mostra para os usuários somente os controllers que ele tem acesso.

Adicionada a criptografia BCryt para melhorar a segurança do aplicativo.
No CakePHP 3 bcrypt já é default.


## Requisitos

Não use tabelas com nomes users, groups nem privileges. Caso já tenha, precisará fazer as adaptações


## Passos:

- Seu aplicativo deve estar concluído. Caso não tenha, crie pelo menos o exemplo de blog.

- Caso seu aplicativo não seja um aplicativo de testes, recomenda-se um backup completo do seu aplicativo (todos os arquivos e todo o banco) antes de continuar

- Download: https://github.com/ribafs/cakeadmin

- Faça o download, descompacte e renomeie a pasta para Admin

- Copie toda a pasta Admin para plugins. 
	Obs.: Se estiver usando um Linux precisa garantir que o Apache possa escrever também na pasta Admin.

- Importar para seu banco o script admin.sql, que contem as tabelas users, groups e privileges

- Adicione ao src/config/bootstrap.php:
- 
Plugin::load('Admin', array('bootstrap' => false, 'routes' => true));

- Copie o arquivo abaixo para seu aplicativo:

cake.admin.css 	para webroot/css

menutopo.ctp e menutopo_admin.ctp para	src/Template/Element

Adicione ao src/config/routes.php:

	$routes->connect('/login', array('plugin'=>'admin','controller' => 'users', 'action' => 'login'));
	$routes->connect('/logout', array('plugin'=>'admin','controller' => 'users', 'action' => 'logout'));
	$routes->connect('/users', array('plugin'=>'admin','controller' => 'users', 'action' => 'index'));
	$routes->connect('/groups', array('plugin'=>'admin','controller' => 'groups', 'action' => 'index'));
	$routes->connect('/privileges', array('plugin'=>'admin','controller' => 'privileges', 'action' => 'index'));


admin.ctp 	src/Template/Layout	

- Edite o seu layout default src/Template/Layout/default.ctp e adicione a linha seguinte, logo abaixo da linha <div id="header">:

		<?php echo $this->element('menutopo');?>

ALERTA: todos os seus controllers devem ser adicionados ao src/Template/Element/menutopo.ctp e ao menutopo_admin.ctp, assim:

		echo $this->Html->link(__('Funcionários'), array('plugin'=>null,'controller'=>'funcionarios','action'=>'index'));
Supondo adicionar o controller Funcionarios.


## Adicionar Usuários

Sugestão para testes:

Acesse
http://localhost/seuaplicativo/users
<pre>
login - admin	
senha - admin
grupo - admins

login - manager
senha - manager
grupo - managers
</pre>
Não se preocupe com os dois Notices acima. Logo corrigiremos.

Adicione os dois usuários.


## Adicionar ao AppController.php:

ALERTA: Ajuste o nome do controller posts de acordo com o seu, caso seja diferente.

Também corrija o element src/Template/Element/menutopo.ctp trocando posts pelos seu controller default e adicionando outros.

	public $components = array(
		'Session','Admin.AccessControl',
		'Auth' => array(
		    'loginRedirect' => array('plugin'=>null,'controller' => 'posts', 'action' => 'index'),
		    'logoutRedirect' => array('plugin'=>'admin','controller' => 'users', 'action' => 'login'),
			'loginAction'    => '/admin/users/login',
			'authError' 	=> 'Faça login antes!',
		    'authorize' => array('Controller')
		)
	);

	public function beforeFilter(){

		parent::beforeFilter();

		$this->set('title_for_app','Meu Aplicativo');
		$this->set('title_for_admin','Administração do Aplicativo');
		$this->set('loggedyes','Logado como');
		$this->set('loggedno','Não logado!');

		$this->set('current_user', $this->Auth->user());
		$user = $this->Auth->user('username');
		if($user == 'admin'){
			$this->layout = 'admin';
		}

		$controller=$this->params['controller'];
		$action=$this->params['action']; 

		$denied='Acesso Negado!';//Access Denied
		$privilege = 'Privilégio não Cadastrado!';//Privilege not Registered

        $this->Auth->allow('login', 'logout');

		if($action != 'login' && $action != 'logout'){
			if($this->AccessControl->go($controller,$action)==true){	
				$this->Session->setFlash(__($denied));							
				$this->redirect(array('plugin'=>'admin','controller' => 'users', 'action' => 'login'));	
			}else{
				if($this->AccessControl->msg == 'priv'){
					$this->Session->setFlash(__($privilege));
				}
			}
		}
		// To register all privileges to your controllers uncommente the line below. 
		// $this->AccessControl->tables($controller);

		// Then make login on application and verify all actions registereds to group "managers".
		// Then uncomment again. Make your adjusts in actions, if your action names are other than default names
	} 

	public function isAuthorized($user) {
		return true;
	}



## PRONTO

Já pode testar. Acesse:

http://localhost/seuaplicativo

E tente acessar os actions add ou edit, por exemplo.


## Cadastrando as Permissões

Por padrão somente usuários logados tem acesso ao aplicativo.

Esta versão já traz cadastradas todas as permissões para users, groups e privileges (tudo somente para o admins).
A novidade é que ela também pode cadastrar para você todas as permissões para todas as suas tabelas de conteúdo
tendo como dono o grupo managers, ou seja, todos os usuários do grupo admins e do grupo managers terão acesso.

Para isso descomente a linha no AppController:
$this->AccessControl->tables($controller);

Caso queira alterar as permissões atuais, acesse como admin:
http://localhost/seuaplicativo/privileges

Atente para não esquecer nenhum privilégio. Os actions que esquecer ou deixar de fora irão permitir acesso a qualquer usuário.

## Licença

Este componente é distribuído com a mesma licença do CakePHP, que é a licença MIT.


