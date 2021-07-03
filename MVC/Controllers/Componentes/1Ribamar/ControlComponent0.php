<?php
namespace App\Controller\Component;

use Cake\Controller\Component;
use Cake\Controller\ComponentRegistry;
use Cake\Datasource\ConnectionManager;

/**
 * Control component
 */
class ControlComponent extends Component
{

    /**
     * Default configuration.
     *
     * @var array
     */
    protected $_defaultConfig = [];

	public function tables($controller,$action,$group){ 
		$conn = ConnectionManager::get('default');
		//$tables = $conn->execute("SHOW tables where")->fetchAll();
		$controllers = $conn->execute("select distinct(controller) from permissions where group_id=$group")->fetchAll();

		return $controllers;
	}

	public function populate($group){
		$conn = ConnectionManager::get('default');
		//$tables = $conn->execute("SHOW tables")->fetchAll();
		$tables = $conn->execute("SELECT relname FROM pg_class WHERE relname !~ '^(pg_|sql_)' AND relkind = 'r';")->fetchAll();

		if($group == 1){
			foreach($tables as $table){
				$c=0;
				$table = ucfirst($table[$c]);

		$actions = $conn->execute("SELECT action FROM permissions WHERE group_id = '$group' and controller = '$table' and action='index'")->fetchAll();
				if(!$actions){
					$conn->execute("insert into permissions (group_id,controller,action) values ('$group', '$table', 'index')");
					$conn->execute("insert into permissions (group_id,controller,action) values ('$group', '$table', 'view')");
					$conn->execute("insert into permissions (group_id,controller,action) values ('$group', '$table', 'add')");
					$conn->execute("insert into permissions (group_id,controller,action) values ('$group', '$table', 'edit')");
					$conn->execute("insert into permissions (group_id,controller,action) values ('$group', '$table', 'delete')");
				}
				$c++;
			}
		}elseif($group == 2){
			foreach($tables as $table){
				$c=0;
				$table = ucfirst($table[$c]);

		$actions = $conn->execute("SELECT action FROM permissions WHERE group_id = '$group' and controller = '$table' and action='index'")->fetchAll();
				if(!$actions && ($table=='Groups' || $table=='Permissions' || $table=='Users')){
					$conn->execute("insert into permissions (group_id,controller,action) values ('$group', '$table', 'index')");
					$conn->execute("insert into permissions (group_id,controller,action) values ('$group', '$table', 'view')");
					$conn->execute("insert into permissions (group_id,controller,action) values ('$group', '$table', 'add')");
					$conn->execute("insert into permissions (group_id,controller,action) values ('$group', '$table', 'edit')");
					$conn->execute("insert into permissions (group_id,controller,action) values ('$group', '$table', 'delete')");
				}
				$c++;
			}
		}elseif($group==3){		
			foreach($tables as $table){
				$c=0;
				$table = ucfirst($table[$c]);

		$actions = $conn->execute("SELECT action FROM permissions WHERE group_id = '$group' and controller = '$table' and action='index'")->fetchAll();
				if(!$actions && ($table !=='Groups' && $table !=='Permissions' && $table!=='Users')){
					$conn->execute("insert into permissions (group_id,controller,action) values ('$group', '$table', 'index')");
					$conn->execute("insert into permissions (group_id,controller,action) values ('$group', '$table', 'view')");
					$conn->execute("insert into permissions (group_id,controller,action) values ('$group', '$table', 'add')");
					$conn->execute("insert into permissions (group_id,controller,action) values ('$group', '$table', 'edit')");
					$conn->execute("insert into permissions (group_id,controller,action) values ('$group', '$table', 'delete')");
				}
			}
			$c++;
		}
	}

	public function access($controller,$action,$group){
		$conn = ConnectionManager::get('default');
		$group_perm = $conn->execute("select group_id from permissions where controller = '$controller' and action ='$action' and group_id=$group")->fetchAll();
		$group_perm=isset($group_perm[0][0]) ? $group_perm[0][0] : '';

		if($group_perm){	
			if($group == $group_perm){	
				return true;
			}elseif($group == $group_perm){	
				return true;
			}elseif($group == $group_perm){
				return true;
			}elseif($group == $group_perm){
				return true;
			}else{
				return false;
			}
		}
	}
}
