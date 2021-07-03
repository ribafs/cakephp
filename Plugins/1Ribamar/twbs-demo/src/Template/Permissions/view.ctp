<div class="actions columns col-lg-2 col-md-3">
    <h3><?= __('Ações') ?></h3>
    <ul class="nav nav-stacked nav-pills">
        <li><?= $this->Html->link(__('Editar Permission'), ['action' => 'edit', $permission->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Excluir Permission'), ['action' => 'delete', $permission->id], ['confirm' => __('Excluir realmente o registro # {0}?', $permission->id), 'class' => 'btn-danger']) ?> </li>
        <li><?= $this->Html->link(__('Listar Permissions'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('Novo Permission'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('Listar Groups'), ['controller' => 'Groups', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('Novo Group'), ['controller' => 'Groups', 'action' => 'add']) ?> </li>
    </ul>
</div>
<div class="permissions view col-lg-10 col-md-9 columns">
    <h2><?= h($permission->id) ?></h2>
    <div class="row">
        <div class="col-lg-5 columns strings">
            <div class="panel panel-default">
                <div class="panel-body">
                    <h6 class="subheader"><?= __('Group') ?></h6>
                    <p><?= $permission->has('group') ? $this->Html->link($permission->group->name, ['controller' => 'Groups', 'action' => 'view', $permission->group->id]) : '' ?></p>
                    <h6 class="subheader"><?= __('Controller') ?></h6>
                    <p><?= h($permission->controller) ?></p>
                    <h6 class="subheader"><?= __('Action') ?></h6>
                    <p><?= h($permission->action) ?></p>
                </div>
            </div>
        </div>
        <div class="col-lg-2 columns numbers end">
            <div class="panel panel-default">
                <div class="panel-body">
                    <h6 class="subheader"><?= __('Id') ?></h6>
                    <p><?= $this->Number->format($permission->id) ?></p>
                </div>
            </div>
        </div>
    </div>
</div>
