<?php $col2='100px'; ?>

<style>
.col1{
    width:50px;
}

.col2{
    width:<?=$col2?>;
}

.col4{
    width:200px;
}

.col8{
    width:400px;
}

.col9{
    width:950px;
}
</style>

<div class="actions columns col-lg-2 col-md-3">
    <h3><?= __('Ações') ?></h3>
    <ul class="nav nav-stacked nav-pills">
        <li class="active disabled"><?= $this->Html->link(__('Novo Conta'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('Listar Contas'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('Listar Materiais'), ['controller' => 'Materiais', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('Novo Materiai'), ['controller' => 'Materiais', 'action' => 'add']) ?> </li>
    </ul>
</div>
<div class="contas form col-lg-10 col-md-9 columns">
    <?= $this->Form->create($conta); ?>
    <fieldset>
        <legend><?= __('Add Conta') ?></legend>
        <?php
            echo $this->Form->input('grupo',['class'=>'col2']);
            echo $this->Form->input('tipo',['class'=>'col1']);
            echo $this->Form->input('descricao',['class'=>'col9']);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Enviar'), ['class' => 'btn-success']) ?>
    <?= $this->Form->end() ?>
</div>
