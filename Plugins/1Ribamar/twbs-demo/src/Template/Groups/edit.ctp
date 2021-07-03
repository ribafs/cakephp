<div class="actions columns col-lg-2 col-md-3">
    <h3><?= __('Ações') ?></h3>
    <ul class="nav nav-stacked nav-pills">
        <li class="active disabled"><?= $this->Html->link(__('Editar Group'), ['action' => 'edit', $group->id]) ?> </li>
        <li><?= $this->Form->postLink(
                __('Excluir'),
                ['action' => 'delete', $group->id],
                ['confirm' => __('Excluir realmente o registro # {0}?', $group->id), 'class' => 'btn-danger']
            )
        ?></li>
        <li><?= $this->Html->link(__('Novo Group'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('Listar Groups'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('Listar Permissions'), ['controller' => 'Permissions', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('Novo Permission'), ['controller' => 'Permissions', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('Listar Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('Novo User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
    </ul>
</div>
<div class="groups form col-lg-10 col-md-9 columns">
    <?= $this->Form->create($group); ?>
    <fieldset>
        <legend><?= __('Edit Group') ?></legend>
        <?php
            echo $this->Form->input('name');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Enviar'), ['class' => 'btn-success']) ?>
    <?= $this->Form->end() ?>
</div>
