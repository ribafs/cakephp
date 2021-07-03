<div class="actions columns col-lg-2 col-md-3">
    <h3><?= __('Ações') ?></h3>
    <ul class="nav nav-stacked nav-pills">
        <li class="active disabled"><?= $this->Html->link(__('Editar Permission'), ['action' => 'edit', $permission->id]) ?> </li>
        <li><?= $this->Form->postLink(
                __('Excluir'),
                ['action' => 'delete', $permission->id],
                ['confirm' => __('Excluir realmente o registro # {0}?', $permission->id), 'class' => 'btn-danger']
            )
        ?></li>
        <li><?= $this->Html->link(__('Novo Permission'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('Listar Permissions'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('Listar Groups'), ['controller' => 'Groups', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('Novo Group'), ['controller' => 'Groups', 'action' => 'add']) ?> </li>
    </ul>
</div>
<div class="permissions form col-lg-10 col-md-9 columns">
    <?= $this->Form->create($permission); ?>
    <fieldset>
        <legend><?= __('Edit Permission') ?></legend>
        <?php
            echo $this->Form->input('group_id', ['options' => $groups]);
            echo $this->Form->input('controller');
            echo $this->Form->input('action');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Enviar'), ['class' => 'btn-success']) ?>
    <?= $this->Form->end() ?>
</div>
