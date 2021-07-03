<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 */
class UsersController extends AppController
{

    /**
     * Login method
     *
     * @return \Cake\Network\Response|void
     */
    public function login()
    {
    	// Código customizado para redirecionar de acordo com as permissões
        if ($this->request->is('post')) {
            $user = $this->Auth->identify();

            $group = $user['group_id'];

            if ($user && ($group == 3 || $group == 4)) {
                $this->Auth->setUser($user);
				return $this->redirect(['controller'=>'Servidores','action' => 'index']);
			}else{
                $this->Auth->setUser($user);
				return $this->redirect($this->Auth->redirectUrl());                
            }
            $this->Flash->error(__('Credenciais inválias, tente novamente!'));
        }
    }


    /**
     * Logout method
     *
     * @return \Cake\Network\Response
     */
    public function logout()
    {
        return $this->redirect($this->Auth->logout());
    }
    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Groups']
        ];
        $users = $this->paginate($this->Users);

        $this->set(compact('users'));
        $this->set('_serialize', ['users']);
    }

    /**
     * Index method para busca
     *
     * @return \Cake\Network\Response|null
     */    
    /*     
    public function index()
    {        
    	// Descomente e ajuste de acordo com seu controller e campos
    	// Depois comente o index() original acima
    	// use Cake\Datasource\ConnectionManager; // Mova para cima e descomente
		$conn = ConnectionManager::get('default');
		$driver = $conn->config()['driver']; // Outros: database, etc.
		
		if($driver == 'Cake\Database\Driver\Postgres'){
		    $this->paginate = [
		        'contain' => ['Users'],
		        'conditions' => ['or' => [
		            'Servidores.nome ilike' => '%' . $this->request->query('search') . '%',
		            'Servidores.cpf ilike' => '%' . $this->request->query('search') . '%'
		        ]],
		        'order' => ['Servidores.id' => 'DESC' ]
		    ];
		}elseif($driver=='Cake\Database\Driver\Mysql'){
		    $this->paginate = [
		        'contain' => ['Users'],
		        'conditions' => ['or' => [
		            'Servidores.nome like' => '%' . $this->request->query('search') . '%',
		            'Servidores.cpf like' => '%' . $this->request->query('search') . '%'
		        ]],
		        'order' => ['Servidores.id' => 'DESC' ]
		    ];
		}else{
			print '<h2>Driver database dont supported!';
			exit;
		}
            
        $this->set('servidores', $this->paginate($this->Servidores));
		$this->set('_serialize', ['servidores']);    
    }
	*/    

    /**
     * View method
     *
     * @param string|null $id User id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => ['Groups', 'Servidores']
        ]);

        $this->set('user', $user);
        $this->set('_serialize', ['user']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $user = $this->Users->newEntity();
        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->data);
            if ($this->Users->save($user)) {
                $this->Flash->success(__('User foi salvo.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('User não pode ser salvo. Favor tentar novamente.'));
            }
        }
        $groups = $this->Users->Groups->find('list', ['limit' => 200]);
        $this->set(compact('user', 'groups'));
        $this->set('_serialize', ['user']);
    }

    /**
     * Edit method
     *
     * @param string|null $id User id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->data);
            if ($this->Users->save($user)) {
                $this->Flash->success(__('User foi salvo.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('User não pode ser salvo. Favor tentar novamente.'));
            }
        }
        $groups = $this->Users->Groups->find('list', ['limit' => 200]);
        $this->set(compact('user', 'groups'));
        $this->set('_serialize', ['user']);
    }

    /**
     * Delete method
     *
     * @param string|null $id User id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $user = $this->Users->get($id);
        if ($this->Users->delete($user)) {
            $this->Flash->success(__('User foi excluído.'));
        } else {
            $this->Flash->error(__('User não pode ser excluído. Favor tentar novamente.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
