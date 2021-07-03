<?php
echo '<div class="btn btn-primary">'.$this->Html->link(__("Groups"), array('plugin'=>null,'controller'=>'Groups','action'=>'index')).'</div>';
echo '<div class="btn btn-primary">'.$this->Html->link(__("Users"), array('plugin'=>null,'controller'=>'Users','action'=>'index')).'</div>';
echo '<div class="btn btn-primary">'.$this->Html->link(__("Permissions"), array('plugin'=>null,'controller'=>'Permissions','action'=>'index')).'</div>';
echo '<div class="btn btn-primary">'.$this->Html->link(__("Customers"), array('plugin'=>null,'controller'=>'Customers','action'=>'index')).'</div>';
