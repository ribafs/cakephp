<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Groups Controller
 *
 * @property \App\Model\Table\GroupsTable $Groups
 *
 * @method \App\Model\Entity\Group[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class GroupsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $groups = $this->paginate($this->Groups);

        $this->set(compact('groups'));
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
     * @param string|null $id Group id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $group = $this->Groups->get($id, [
            'contain' => ['Permissions', 'Users']
        ]);

        $this->set('group', $group);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $group = $this->Groups->newEntity();
        if ($this->request->is('post')) {
            $group = $this->Groups->patchEntity($group, $this->request->getData());
            if ($this->Groups->save($group)) {
                $this->Flash->success(__('group foi salvo.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('group não pode ser salvo. Tente novamente.'));
        }
        $this->set(compact('group'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Group id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $group = $this->Groups->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $group = $this->Groups->patchEntity($group, $this->request->getData());
            if ($this->Groups->save($group)) {
                $this->Flash->success(__('group foi salvo.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('group não pode ser salvo(a). Tente novamente.'));
        }
        $this->set(compact('group'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Group id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $group = $this->Groups->get($id);
        if ($this->Groups->delete($group)) {
            $this->Flash->success(__('group foi excluído(a).'));
        } else {
            $this->Flash->error(__('group não pode ser excluído. Tente novamente.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
