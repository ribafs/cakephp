<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Groups Controller
 *
 * @property \App\Model\Table\GroupsTable $Groups
 */
class GroupsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $groups = $this->paginate($this->Groups);

        $this->set(compact('groups'));
        $this->set('_serialize', ['groups']);
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
     * @param string|null $id Group id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $group = $this->Groups->get($id, [
            'contain' => ['Permissions', 'Users']
        ]);

        $this->set('group', $group);
        $this->set('_serialize', ['group']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $group = $this->Groups->newEntity();
        if ($this->request->is('post')) {
            $group = $this->Groups->patchEntity($group, $this->request->data);
            if ($this->Groups->save($group)) {
                $this->Flash->success(__('Group foi salvo.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('Group não pode ser salvo. Favor tentar novamente.'));
            }
        }
        $this->set(compact('group'));
        $this->set('_serialize', ['group']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Group id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $group = $this->Groups->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $group = $this->Groups->patchEntity($group, $this->request->data);
            if ($this->Groups->save($group)) {
                $this->Flash->success(__('Group foi salvo.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('Group não pode ser salvo. Favor tentar novamente.'));
            }
        }
        $this->set(compact('group'));
        $this->set('_serialize', ['group']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Group id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $group = $this->Groups->get($id);
        if ($this->Groups->delete($group)) {
            $this->Flash->success(__('Group foi excluído.'));
        } else {
            $this->Flash->error(__('Group não pode ser excluído. Favor tentar novamente.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
