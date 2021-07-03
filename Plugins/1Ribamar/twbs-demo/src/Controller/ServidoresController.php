<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Servidores Controller
 *
 * @property \App\Model\Table\ServidoresTable $Servidores
 */
class ServidoresController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Users']
        ];
        $servidores = $this->paginate($this->Servidores);

        $this->set(compact('servidores'));
        $this->set('_serialize', ['servidores']);
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
     * @param string|null $id Servidore id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $servidore = $this->Servidores->get($id, [
            'contain' => ['Users']
        ]);

        $this->set('servidore', $servidore);
        $this->set('_serialize', ['servidore']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $servidore = $this->Servidores->newEntity();
        if ($this->request->is('post')) {
            $servidore = $this->Servidores->patchEntity($servidore, $this->request->data);
            if ($this->Servidores->save($servidore)) {
                $this->Flash->success(__('Servidore foi salvo.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('Servidore não pode ser salvo. Favor tentar novamente.'));
            }
        }
        $users = $this->Servidores->Users->find('list', ['limit' => 200]);
        $this->set(compact('servidore', 'users'));
        $this->set('_serialize', ['servidore']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Servidore id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $servidore = $this->Servidores->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $servidore = $this->Servidores->patchEntity($servidore, $this->request->data);
            if ($this->Servidores->save($servidore)) {
                $this->Flash->success(__('Servidore foi salvo.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('Servidore não pode ser salvo. Favor tentar novamente.'));
            }
        }
        $users = $this->Servidores->Users->find('list', ['limit' => 200]);
        $this->set(compact('servidore', 'users'));
        $this->set('_serialize', ['servidore']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Servidore id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $servidore = $this->Servidores->get($id);
        if ($this->Servidores->delete($servidore)) {
            $this->Flash->success(__('Servidore foi excluído.'));
        } else {
            $this->Flash->error(__('Servidore não pode ser excluído. Favor tentar novamente.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
