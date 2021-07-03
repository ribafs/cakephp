<?php
	if($loguser == 'super'){
		foreach($supers as $controller){
			echo '<div class="navbar-form navbar-left">'.$this->Html->link(__($controller[0]), array('plugin'=>null,'controller'=>$controller[0],'action'=>'index')).'</div>';
		}
		echo '<div align="right" class="logado" class="button">'.$this->Html->link(__('Sair'), array('plugin'=>null,'controller'=>'Users','action'=>'logout')).'</div>';		
		echo '<div class="navbar-form navbar-left"><a href="#">Logado como: '.ucfirst($loguser).'</a></div>'; 		
		
	}elseif($loguser == 'admin'){
		foreach($admins as $controller){
			echo '<div class="navbar-form navbar-left">'.$this->Html->link(__($controller[0]), array('plugin'=>null,'controller'=>$controller[0],'action'=>'index')).'</div>';
		}
		echo '<div align="right" class="logado" class="button">'.$this->Html->link(__('Sair'), array('plugin'=>null,'controller'=>'Users','action'=>'logout')).'</div>';		
		echo '<div class="navbar-form navbar-left"><a href="#">Logado como: '.ucfirst($loguser).'</a></div>'; 		

	}elseif($loguser == 'manager'){
		foreach($managers as $controller){
			echo '<div class="navbar-form navbar-left">'.$this->Html->link(__($controller[0]), array('plugin'=>null,'controller'=>$controller[0],'action'=>'index')).'</div>';
		}
		echo '<div align="right" class="logado" class="button">'.$this->Html->link(__('Sair'), array('plugin'=>null,'controller'=>'Users','action'=>'logout')).'</div>';		
		echo '<div class="navbar-form navbar-left"><a href="#">Logado como: '.ucfirst($loguser).'</a></div>'; 		

	}elseif($loguser == 'user'){
		foreach($users as $controller){
			echo '<div class="navbar-form navbar-left">'.$this->Html->link(__($controller[0]), array('plugin'=>null,'controller'=>$controller[0],'action'=>'index')).'</div>';
		}
		echo '<div align="right" class="logado" class="button">'.$this->Html->link(__('Sair'), array('plugin'=>null,'controller'=>'Users','action'=>'logout')).'</div>';		
		echo '<div class="navbar-form navbar-left"><a href="#">Logado como: '.ucfirst($loguser).'</a></div>'; 		
	}
