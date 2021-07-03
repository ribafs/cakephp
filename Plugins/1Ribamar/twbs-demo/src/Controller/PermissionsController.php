<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Permissions Controller
 *
 * @property \App\Model\Table\PermissionsTable $Permissions
 */
class PermissionsController extends AppController
{
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
        $permissions = $this->paginate($this->Permissions);

        $this->set(compact('permissions'));
        $this->set('_serialize', ['permissions']);
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
     * @param string|null $id Permission id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $permission = $this->Permissions->get($id, [
            'contain' => ['Groups']
        ]);

        $this->set('permission', $permission);
        $this->set('_serialize', ['permission']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $permission = $this->Permissions->newEntity();
        if ($this->request->is('post')) {
            $permission = $this->Permissions->patchEntity($permission, $this->request->data);
            if ($this->Permissions->save($permission)) {
                $this->Flash->success(__('Permission foi salvo.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('Permission não pode ser salvo. Favor tentar novamente.'));
            }
        }
        $groups = $this->Permissions->Groups->find('list', ['limit' => 200]);
        $this->set(compact('permission', 'groups'));
        $this->set('_serialize', ['permission']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Permission id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $permission = $this->Permissions->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $permission = $this->Permissions->patchEntity($permission, $this->request->data);
            if ($this->Permissions->save($permission)) {
                $this->Flash->success(__('Permission foi salvo.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('Permission não pode ser salvo. Favor tentar novamente.'));
            }
        }
        $groups = $this->Permissions->Groups->find('list', ['limit' => 200]);
        $this->set(compact('permission', 'groups'));
        $this->set('_serialize', ['permission']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Permission id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $permission = $this->Permissions->get($id);
        if ($this->Permissions->delete($permission)) {
            $this->Flash->success(__('Permission foi excluído.'));
        } else {
            $this->Flash->error(__('Permission não pode ser excluído. Favor tentar novamente.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
