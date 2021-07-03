<?php
/**
 * Component AccessControl
 * For CakePHP 3.x
 * Autor: Ribamar FS
 *
 * This component allow access control to each action from application with web interface.
 *
 * Licenced with The MIT License
 * Redistributions require keep copyright below.
 *
 * @copyright     Copyright (c) Ribamar FS (http://ribafs.org)
 * @link          http://ribafs.org
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
namespace App\Controller\Component;

use Cake\Controller\Component;

class AccessControlComponent extends Component{

	public $msg;
	public $components = array('Session','Auth');

	public function tables($controller){
		$this->Privilege = ClassRegistry::init('Privilege');

		// Database name
		App::uses('ConnectionManager', 'Model');
		$ds = ConnectionManager::getDataSource('default')->config;
		$db = $ds['database'];

		// All tablse names
		$tables = $this->Privilege->query("show tables");

		foreach($tables as $table){
			$table = $table['TABLE_NAMES']['Tables_in_'.$db];
			if($table != 'users' && $table != 'groups' && $table != 'privileges'){
				$action = $this->Privilege->query("select action from privileges where group_name = 'managers' and controller ='$table'");
				if(!isset($action[0]['privileges']['action'])){
					$this->Privilege->query("insert into privileges (group_name,controller,action) values ('managers', '$table', 'index')");
					$this->Privilege->query("insert into privileges (group_name,controller,action) values ('managers', '$table', 'view')");
					$this->Privilege->query("insert into privileges (group_name,controller,action) values ('managers', '$table', 'add')");
					$this->Privilege->query("insert into privileges (group_name,controller,action) values ('managers', '$table', 'edit')");
					$this->Privilege->query("insert into privileges (group_name,controller,action) values ('managers', '$table', 'delete')");
				}
			}
		}
	}

	public function access($controller,$action){
		$this->Privilege = ClassRegistry::init('Privilege');// Allow model use in component

		$group = $this->Privilege->find('first', array(
            'conditions'=>array('Privilege.controller'=>$controller,'Privilege.action'=>$action),
            'fields'=>array('Privilege.group_name')
	    ));

		if(isset($group['Privilege']['group_name'])){
			$group = $group['Privilege']['group_name'];
			return $group;
		}else{
			return false;	
		}
	}

	public function go($controller,$action){
		$user = $this->Auth->user();
		$groupid=$user['group_id'];
		$access = $this->access($controller,$action);

		if($groupid == 2 && $access == 'admins'){// managers dont access admins			
			return true;
		}elseif($access == false){// Privileges not registered
			$this->msg = 'priv';
			return false;
		}else{
			return false;
		}
	}

}
