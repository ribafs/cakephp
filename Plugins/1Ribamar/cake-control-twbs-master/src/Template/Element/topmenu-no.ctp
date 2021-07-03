<?php
echo '<div class="btn btn-primary">'.$this->Html->link(__("Grupos"), array('plugin'=>null,'controller'=>'Groups','action'=>'index')).'</div>';
echo '<div class="btn btn-primary">'.$this->Html->link(__("Usuários"), array('plugin'=>null,'controller'=>'Users','action'=>'index')).'</div>';
echo '<div class="btn btn-primary">'.$this->Html->link(__("Permissões"), array('plugin'=>null,'controller'=>'Permissions','action'=>'index')).'</div>';
echo '<div class="btn btn-primary">'.$this->Html->link(__("Servidores"), array('plugin'=>null,'controller'=>'Servidores','action'=>'index')).'</div>';

