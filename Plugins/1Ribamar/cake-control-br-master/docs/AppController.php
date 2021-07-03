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
	// Controller default para usuários não admins em 
	protected $noAdmins = 'Customers';
		
	public $helpers = [
		'Less.Less', // required for parsing less files
		'BootstrapUI.Form',
		'BootstrapUI.Html',
		'BootstrapUI.Flash',
		'BootstrapUI.Paginator'
	];	

    public function initialize()
    {
        parent::initialize();

        $this->loadComponent('RequestHandler');
        $this->loadComponent('Flash');
		$this->loadComponent('CakeControlBr.Control'); // Nosso componente
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
	    'authError' => 'Você não tem permissão para acessar esta área!',
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
		// Via url: users/login?temp=default
		// $layout=$this->request->query('temp');
	    	// $this->set('template',$layout);

		if($loguser == 'user' || $loguser == 'manager'){
			$this->viewBuilder()->layout('CakeControlBr.default');
		}else{
			$this->viewBuilder()->layout('CakeControlBr.admin');
		}

		// Descomente para acesso total aos actions abaixo
//		$this->Auth->allow(['index','add','edit']);
		
		if(isset($group)){
			// Popula a tabela permissions
			// Após o primeiro login no aplicativo pode comentar as 3 linhas abaixo
			$this->Control->populate(1);// Full permissions in all tables to users from Supers group			
			$this->Control->populate(2);// Full only in groups, users and permissions tables to users from Admins group			
			$this->Control->populate(3);// All in all tables that are not groups, users and permissions to all users from group Managers

			// Enviar o controller atual para o element topmenu.ctp
			$this->set('supers',$this->Control->tables($controller,$action,1));
			$this->set('admins',$this->Control->tables($controller,$action,2));
			$this->set('managers',$this->Control->tables($controller,$action,3));
			$this->set('users',$this->Control->tables($controller,$action,4));
		}

		if($action != 'login' && $action != 'logout'){
			if(isset($group) && $this->Control->access($controller,$action,$group)==false){	
				$this->Flash->error(__('Como usuário "'.$user['username'].'", você não tem permissão de acesso a '.$controller.'/'.$action));
				return $this->redirect($this->referer());
			}
		}
    }

	public function isAuthorized($user)
	{
		$requestedUserId=$this->request->pass[0];

		if ($user['group_id']==1){
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
        if (!array_key_exists('_serialize', $this->viewVars) && in_array($this->response->type(), ['application/json', 'application/xml'])) {
            $this->set('_serialize', true);
        }
    }
}
