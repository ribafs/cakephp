<div class="actions columns col-lg-2 col-md-3">
    <h3><?= __('Ações') ?></h3>
    <ul class="nav nav-stacked nav-pills">
        <li class="active disabled"><?= $this->Html->link(__('New User'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('Listar Users'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('Listar Groups'), ['controller' => 'Groups', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('Novo Group'), ['controller' => 'Groups', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('Listar Servidores'), ['controller' => 'Servidores', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('Novo Servidore'), ['controller' => 'Servidores', 'action' => 'add']) ?> </li>
    </ul>
</div>
<div class="users form col-lg-10 col-md-9 columns">
    <?= $this->Form->create($user); ?>
    <fieldset>
        <legend><?= __('Adicionar Usuário') ?></legend>
        <?php
            echo $this->Form->input('username',['label'=>'Login']);
            echo $this->Form->input('password',['label'=>'Senha']);
            echo $this->Form->input('group_id', ['label'=>'Login','options' => $groups]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Enviar'), ['class' => 'btn-success']) ?>
    <?= $this->Form->end() ?>
</div>
