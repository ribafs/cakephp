<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Permissions Controller
 *
 * @property \App\Model\Table\PermissionsTable $Permissions
 *
 * @method \App\Model\Entity\Permission[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class PermissionsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Groups']
        ];
        $permissions = $this->paginate($this->Permissions);

        $this->set(compact('permissions'));
    }

// Código para a busca
/*  // Descomente a linha abaixo e mova para o início, logo abaixo de use App\Controller\AppController;
	// E adapte corretamente para o seu controller
	//use Cake\Datasource\ConnectionManager;
    public function index()
    {        
		$conn = ConnectionManager::get('default');
		$driver = $conn->config()['driver']; // Outros: database, etc.
		
		if($driver == 'Cake\Database\Driver\Postgres'){
		    $this->paginate = [
		        'contain' => ['Users'],
		        'conditions' => ['or' => [
		            'Customers.name ilike' => '%' . $this->request->getQuery('search') . '%',
		            'Customers.phone ilike' => '%' . $this->request->getQuery('search') . '%'
		        ]],
		        'order' => ['Customers.id' => 'DESC' ]
		    ];
		}elseif($driver=='Cake\Database\Driver\Mysql'){
		    $this->paginate = [
		        'contain' => ['Users'],
		        'conditions' => ['or' => [
		            'Customers.name like' => '%' . $this->request->getQuery('search') . '%',
		            'Customers.phone like' => '%' . $this->request->getQuery('search') . '%'
		        ]],
		        'order' => ['Customers.id' => 'DESC' ]
		    ];
		}else{
			print '<h2>Driver database dont supported!';
			exit;
		}
            
	        $this->set('customers', $this->paginate($this->Customers));
		$this->set('_serialize', ['customers']);    
    }
*/

    /**
     * View method
     *
     * @param string|null $id Permission id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $permission = $this->Permissions->get($id, [
            'contain' => ['Groups']
        ]);

        $this->set('permission', $permission);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $permission = $this->Permissions->newEntity();
        if ($this->request->is('post')) {
            $permission = $this->Permissions->patchEntity($permission, $this->request->getData());
            if ($this->Permissions->save($permission)) {
                $this->Flash->success(__('permission foi salvo.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('permission não pode ser salvo. Tente novamente.'));
        }
        $groups = $this->Permissions->Groups->find('list', ['limit' => 200]);
        $this->set(compact('permission', 'groups'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Permission id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $permission = $this->Permissions->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $permission = $this->Permissions->patchEntity($permission, $this->request->getData());
            if ($this->Permissions->save($permission)) {
                $this->Flash->success(__('permission foi salvo.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('permission não pode ser salvo(a). Tente novamente.'));
        }
        $groups = $this->Permissions->Groups->find('list', ['limit' => 200]);
        $this->set(compact('permission', 'groups'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Permission id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $permission = $this->Permissions->get($id);
        if ($this->Permissions->delete($permission)) {
            $this->Flash->success(__('permission foi excluído(a).'));
        } else {
            $this->Flash->error(__('permission não pode ser excluído. Tente novamente.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
