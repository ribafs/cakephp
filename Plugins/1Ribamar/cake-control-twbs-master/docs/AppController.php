<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link      http://cakephp.org CakePHP(tm) Project
 * @since     0.2.9
 * @license   http://www.opensource.org/licenses/mit-license.php MIT License
 */
namespace App\Controller;

use Cake\Controller\Controller;
use Cake\Event\Event;

class AppController extends Controller
{
    public function initialize()
    {
        parent::initialize();

        $this->loadComponent('RequestHandler');
        $this->loadComponent('Flash');
		$this->loadComponent('Control'); // Nosso componente
        $this->loadComponent('Auth', [
            'loginRedirect' => [
                'controller' => 'Permissions',
                'action' => 'index',
				'base' => false
            ],
            'loginAction' => [
                'plugin' => false,
                'controller' => 'Users',
                'action' => 'login'
            ],                    
            'logoutRedirect' => [
                'controller' => 'Users',
                'action' => 'login'
            ],
			'unauthorizedRedirect' => [
				'controller' => 'Users',
				'action' => 'login',
				'prefix' => false
			],
		    'authError' => 'Você não está autorizado a acessar esta área',
            'flash' => [
                'element' => 'error'
            ]
        ]);		

	$user = $this->request->session()->read('Auth.User');
	$loguser = $user['username'];
        $this->set('loguser',$loguser);
	$group=$user['group_id'];
	$this->set('group',$group);
	$controller = $this->request->controller;
	$this->set('controller',$controller);
	$action = $this->request->action;

	// Descomentando dá acesso total aos actions index e view
//	$this->Auth->allow(['index','add','edit']);
		
	if(isset($group)){
		// Popular a tabela permissions. Pode comentar as 3 linhas abaixo após o primeiro login

		// Conceder todos as permissões de todas as tabelas para os usuários do grupo Supers
		$this->Control->populate(1);
		// Permissão para as tabelas groups, users e permissions, para os usuários do grupo Admins
		$this->Control->populate(2);
		// Cadastrar todos as permissões sobre Servidores (ou outra) para os usuários do grupo Managers
		$this->Control->populate(3);
		// Após o primeiro login no aplicativo pode comentar as três linhas acima

		// Enviar controllers para o element topmenu
		$this->set('supers',$this->Control->tables($controller,$action,1));
		$this->set('admins',$this->Control->tables($controller,$action,2));
		$this->set('managers',$this->Control->tables($controller,$action,3));
		$this->set('users',$this->Control->tables($controller,$action,4));
	}

	if($action != 'login' && $action != 'logout'){
		if(isset($group) && $this->Control->access($controller,$action,$group)==false){	
			$this->Flash->error(__('Como usuário "'.$user['username'].'", você não tem permissão para acessar '.$controller.'/'.$action));
			return $this->redirect($this->referer());
		}
	}
    }

	public function isAuthorized($user)
	{
		$requestedUserId=$this->request->pass[0];

		if ($user['group_id']==1) 
		{
		    return true;
		} else if ($user['group_id']!=1 || $user['group_id']!=2) {
			if (!($this->request->action == 'index')) {
				if($userid==$user['id']) {
				    return true;
				}
			}
		    	return false;
		}
		return parent::isAuthorized($user);
	}

    public function beforeRender(Event $event)
    {
        if (!array_key_exists('_serialize', $this->viewVars) &&
            in_array($this->response->type(), ['application/json', 'application/xml'])
        ) {
            $this->set('_serialize', true);
        }
    }
}
