<%
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @since         0.1.0
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
%>
    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
<% $belongsTo = $this->Bake->aliasExtractor($modelObj, 'BelongsTo'); %>
<% if ($belongsTo): %>
        $this->paginate = [
            'contain' => [<%= $this->Bake->stringifyList($belongsTo, ['indent' => false]) %>]
        ];
<% endif; %>
        $<%= $pluralName %> = $this->paginate($this-><%= $currentModelName %>);

        $this->set(compact('<%= $pluralName %>'));
        $this->set('_serialize', ['<%= $pluralName %>']);
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
