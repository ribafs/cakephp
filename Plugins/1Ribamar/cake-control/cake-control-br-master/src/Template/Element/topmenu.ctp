<?php
/*
Element to create a menu to display only links to controllers what user have access permission.
*/
	if($loguser == 'super'){

		foreach($supers as $controller){
			echo '<div class="btn btn-primary">'.$this->Html->link(__($controller[0]), array('plugin'=>null,'controller'=>$controller[0],'action'=>'index')).'</div>';
		}
		echo '<div class="btn btn-primary">&nbsp;'.$this->Html->link(__('Logout'), array('plugin'=>null,'controller'=>'Users','action'=>'logout')).'</div>';
		echo '<div align="right" class="logado">&nbsp;&nbsp;&nbsp;logged in as: '. __($loguser).'</div>'; 
	}elseif($loguser == 'admin'){
		foreach($admins as $controller){
			echo '<div class="btn btn-primary">'.$this->Html->link(__($controller[0]), array('plugin'=>null,'controller'=>$controller[0],'action'=>'index')).'</div>';
		}
		echo '<div class="btn btn-primary">&nbsp;'.$this->Html->link(__('Logout'), array('plugin'=>null,'controller'=>'Users','action'=>'logout')).'</div>';
		echo '<div align="right" class="logado">&nbsp;&nbsp;&nbsp;logged in as: '. __($loguser).'</div>'; 
	}elseif($loguser == 'manager'){
		foreach($managers as $controller){
			echo '<div class="btn btn-primary">'.$this->Html->link(__($controller[0]), array('plugin'=>null,'controller'=>$controller[0],'action'=>'index')).'</div>';
		}
		echo '<div class="btn btn-primary">&nbsp;'.$this->Html->link(__('Logout'), array('plugin'=>null,'controller'=>'Users','action'=>'logout')).'</div>';
		echo '<div align="right" class="logado">&nbsp;&nbsp;&nbsp;logged in as: '. __($loguser).'</div>'; 
	}elseif($loguser == 'user'){
		foreach($users as $controller){
			echo '<div class="btn btn-primary">'.$this->Html->link(__($controller[0]), array('plugin'=>null,'controller'=>$controller[0],'action'=>'index')).'</div>';
		}
		echo '<div class="btn btn-primary">&nbsp;'.$this->Html->link(__('Logout'), array('plugin'=>null,'controller'=>'Users','action'=>'logout')).'</div>';
		echo '<div align="right" class="logado">&nbsp;&nbsp;&nbsp;logged in as: '. __($loguser).'</div>'; 
	}
