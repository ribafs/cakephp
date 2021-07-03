<?php
	namespace App\Controller;
	namespace App\Controller\Admin;
	use App\Controller\AppController;
	use Cake\Core\Configure;
	use Cake\Event\Event;
	use Cake\Network\Exception\NotFoundException;
	use Cake\ORM\TableRegistry;
	use Cake\View\Exception\MissingTemplateException;

	class  UsersController extends AppController  {
		public $paginate = [
			// Other keys here.
			'maxLimit' => 20
		];

		public function beforeFilter(Event $event)   {
			parent::beforeFilter($event);
			$this->Auth->allow(['login','logout','add','forgot','changePassword']);
			$this->loadComponent('Paginator');
			$this->viewBuilder()->layout('admin');
		}
	
		public function add()  {
			$user = $this->Users->newEntity();
			if ($this->request->is('post')) {
				//echo "<pre>";print_r($this->request->data);die;
				$user = $this->Users->patchEntity($user, $this->request->data);
				//debug($user);die;
				if ($this->Users->save($user)) {
					$this->Flash->success(__('The user has been saved.'));
					return $this->redirect(['action' => 'index']);
				}
				$this->Flash->error(__('Unable to add the user.'));
			}
			$this->set('user', $user);
			//$this->assign('title', 'User | Dashboard');
		}	
		
		public function index()  {
			$obj_users 	= TableRegistry::get('Users');
			
			try {
				$all_users 	= $this->paginate(
					$obj_users->find()
					->order(['id' => 'DESC'])
				);		
			} catch (NotFoundException $e) {
				// Do something here like redirecting to first or last page.
				// $this->request->params['paging'] will give you required info.
				return $this->redirect(['action' => 'dashboard']);
			}
			//debug($all_users->toArray());die;
			$this->set('users', $all_users);
		}		
		
		public function dashboard()  {		
			$obj_users 	= TableRegistry::get('Users');
			$all_users 	= $obj_users
						->find()
						->limit(10)
						->order(['id' => 'DESC']);
			//echo "<pre>"; debug($all_users=>toArray());die;
			$total_users= $obj_users
					->find ()
					->count ();
			$this->set('total_users', $total_users);
			$this->set('users', $all_users);
		}
		
		public function profile()  {
			if ($this->Auth->user('id')) {
				$obj_users 	=	TableRegistry::get('Users');	
				$get_info		=	$obj_users
								->find()
								->where(['id'=>$this->Auth->user('id')])
								->first();
				$this->set("user",$get_info);
			}			
		}
		
		public function login()  {
			$this->viewBuilder()->layout('');
			if ($this->request->is('post')) {
				$this->request->data['created_at'] 	= time();
				$this->request->data['login_name'] 	= $this->request->data['email'];
				if ($this->request->data['email'] != '' OR $this->request->data['password'] != '')   {
					$user = $this->Auth->identify();
					if ($user)  {
						$this->Auth->setUser($user);
						return $this->redirect($this->Auth->redirectUrl());
					}
					$this->Flash->error(__('Invalid username or password, try again'));
				}  else  {
					$this->Flash->error(__('Both fields email or password, try again'));
				}
				
			}
		}
		
		public function logout()  {
		    return $this->redirect($this->Auth->logout());
		}
		
		public function forgot()  {
		}
		
		public function changePassword()  {
			
		}
		
		public function editUserInfo($id = Null)  {	
			$obj_users 	=	TableRegistry::get('Users');		
			$getUser		= $obj_users->get($id);			
			
			if ($this->request->is('post')) {
				$user = $this->Users->patchEntity($getUser, $this->request->data);
				if ($this->Users->save($user)) {
					$this->Flash->success(__('The user has been saved.'));
					return $this->redirect(['action' => 'index']);
				}
				$this->Flash->error(__('Unable to add the user.'));
			}			
				
			$get_info		=	$obj_users
							->find()
							->where(['id'=>$id])
							->first();
			$this->set("user",$get_info);
		}
		
		public function viewUserInfo($id=Null)  {
			$obj_users 	=	TableRegistry::get('Users');	
			$get_info		=	$obj_users
							->find()
							->where(['id'=>$id])
							->first();
			$this->set("user",$get_info);
			
		}
		
		public function deleteUser($id = Null)  {
			$obj_users 	= TableRegistry::get('Users');
			$entity 		= $obj_users->get($id);
			$result 		= $obj_users->delete($entity);
			$this->Flash->success(__('The user has been saved.'));
			return $this->redirect(['action' => 'index']);		
		}
	}
?>
