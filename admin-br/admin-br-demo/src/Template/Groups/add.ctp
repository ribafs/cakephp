<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Group $group
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
        <li class="active"><?= $this->Html->link(__('Listar Groups'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('Listar Permissions'), ['controller' => 'Permissions', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('Novo Permission'), ['controller' => 'Permissions', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('Listar Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('Novo User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
    </ul>
</div>
<div class="groups form large-9 medium-8 columns content">
    <?= $this->Form->create($group) ?>
    <fieldset>
        <legend><?= __('Add Group') ?></legend>
        <?php
            echo $this->Form->control('name');
        ?>
    <br>
    <?= $this->Form->button(__('Enviar'), ['class' => 'btn-success']) ?>
    </fieldset>
    <?= $this->Form->end() ?>
</div>
