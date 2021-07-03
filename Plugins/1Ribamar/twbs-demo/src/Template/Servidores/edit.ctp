<div class="actions columns col-lg-2 col-md-3">
    <h3><?= __('Ações') ?></h3>
    <ul class="nav nav-stacked nav-pills">
        <li class="active disabled"><?= $this->Html->link(__('Editar Servidore'), ['action' => 'edit', $servidore->id]) ?> </li>
        <li><?= $this->Form->postLink(
                __('Excluir'),
                ['action' => 'delete', $servidore->id],
                ['confirm' => __('Excluir realmente o registro # {0}?', $servidore->id), 'class' => 'btn-danger']
            )
        ?></li>
        <li><?= $this->Html->link(__('Novo Servidore'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('Listar Servidores'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('Listar Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('Novo User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
    </ul>
</div>
<div class="servidores form col-lg-10 col-md-9 columns">
    <?= $this->Form->create($servidore); ?>
    <fieldset>
        <legend><?= __('Edit Servidore') ?></legend>
        <?php
            echo $this->Form->input('nome');
            echo $this->Form->input('email');
            echo $this->Form->input('nascimento');
            echo $this->Form->input('cpf');
            echo $this->Form->input('cnpj');
            echo $this->Form->input('fone');
            echo $this->Form->input('user_id', ['options' => $users, 'empty' => true]);
            echo $this->Form->input('observacao');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Enviar'), ['class' => 'btn-success']) ?>
    <?= $this->Form->end() ?>
</div>
