<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Permission $permission
 */
?>
<div class="actions columns col-lg-2 col-md-3">
    <h3><?= __('Ações') ?></h3>

<style type="text/css">
    div.input label { display: block; }

    input {	
    -webkit-box-sizing: border-box;
    -moz-box-sizing: border-box;
    box-sizing: border-box;	
    width: 100%;
    }

    textarea {	
    -webkit-box-sizing: border-box;
    -moz-box-sizing: border-box;
    box-sizing: border-box;	
    width: 100%;
    }
</style>

    <ul class="nav nav-stacked nav-pills">
        <li class="active"><?= $this->Html->link(__('Listar Permissions'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('Listar Groups'), ['controller' => 'Groups', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('Novo Group'), ['controller' => 'Groups', 'action' => 'add']) ?></li>
    </ul>
</div>
<div class="permissions form large-9 medium-8 columns content">
    <?= $this->Form->create($permission) ?>
    <fieldset>
        <legend><?= __('Add Permission') ?></legend>
        <?php
            echo $this->Form->control('group_id', ['options' => $groups]);
            echo $this->Form->control('controller');
            echo $this->Form->control('action');
        ?>
    <br>
    <?= $this->Form->button(__('Enviar'), ['class' => 'btn-success']) ?>
    </fieldset>
    <?= $this->Form->end() ?>
</div>
