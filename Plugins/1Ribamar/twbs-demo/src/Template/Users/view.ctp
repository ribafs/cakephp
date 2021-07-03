<div class="actions columns col-lg-2 col-md-3">
    <h3><?= __('Ações') ?></h3>
    <ul class="nav nav-stacked nav-pills">
        <li><?= $this->Html->link(__('Editar User'), ['action' => 'edit', $user->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Excluir User'), ['action' => 'delete', $user->id], ['confirm' => __('Excluir realmente o registro # {0}?', $user->id), 'class' => 'btn-danger']) ?> </li>
        <li><?= $this->Html->link(__('Listar Users'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('Novo User'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('Listar Groups'), ['controller' => 'Groups', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('Novo Group'), ['controller' => 'Groups', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('Listar Servidores'), ['controller' => 'Servidores', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('Novo Servidore'), ['controller' => 'Servidores', 'action' => 'add']) ?> </li>
    </ul>
</div>
<div class="users view col-lg-10 col-md-9 columns">
    <h2><?= h($user->id) ?></h2>
    <div class="row">
        <div class="col-lg-5 columns strings">
            <div class="panel panel-default">
                <div class="panel-body">
                    <h6 class="subheader"><?= __('Username') ?></h6>
                    <p><?= h($user->username) ?></p>
                    <h6 class="subheader"><?= __('Password') ?></h6>
                    <p><?= h($user->password) ?></p>
                    <h6 class="subheader"><?= __('Group') ?></h6>
                    <p><?= $user->has('group') ? $this->Html->link($user->group->name, ['controller' => 'Groups', 'action' => 'view', $user->group->id]) : '' ?></p>
                </div>
            </div>
        </div>
        <div class="col-lg-2 columns numbers end">
            <div class="panel panel-default">
                <div class="panel-body">
                    <h6 class="subheader"><?= __('Id') ?></h6>
                    <p><?= $this->Number->format($user->id) ?></p>
                </div>
            </div>
        </div>
        <div class="col-lg-2 columns dates end">
            <div class="panel panel-default">
                <div class="panel-body">
                    <h6 class="subheader"><?= __('Created') ?></h6>
                    <p><?= h($user->created) ?></p>
                    <h6 class="subheader"><?= __('Modified') ?></h6>
                    <p><?= h($user->modified) ?></p>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="related row">
    <div class="column col-lg-12">
    <h4 class="subheader"><?= __('Related Servidores') ?></h4>
    <?php if (!empty($user->servidores)): ?>
    <div class="table-responsive">
        <table class="table">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Nome') ?></th>
                <th><?= __('Email') ?></th>
                <th><?= __('Nascimento') ?></th>
                <th><?= __('Cpf') ?></th>
                <th><?= __('Cnpj') ?></th>
                <th><?= __('Fone') ?></th>
                <th><?= __('User Id') ?></th>
                <th><?= __('Observacao') ?></th>
                <th class="actions"><?= __('Ações') ?></th>
            </tr>
            <?php foreach ($user->servidores as $servidores): ?>
            <tr>
                <td><?= h($servidores->id) ?></td>
                <td><?= h($servidores->nome) ?></td>
                <td><?= h($servidores->email) ?></td>
                <td><?= h($servidores->nascimento) ?></td>
                <td><?= h($servidores->cpf) ?></td>
                <td><?= h($servidores->cnpj) ?></td>
                <td><?= h($servidores->fone) ?></td>
                <td><?= h($servidores->user_id) ?></td>
                <td><?= h($servidores->observacao) ?></td>
                <td class="actions">
                    <?= $this->Html->link('<span class="glyphicon glyphicon-zoom-in"></span><span class="sr-only">' . __('Ver') . '</span>', ['controller' => 'Servidores', 'action' => 'view', $servidores->id], ['escape' => false, 'class' => 'btn btn-xs btn-default', 'title' => __('View')]) ?>
                    <?= $this->Html->link('<span class="glyphicon glyphicon-pencil"></span><span class="sr-only">' . __('Editar') . '</span>', ['controller' => 'Servidores', 'action' => 'edit', $servidores->id], ['escape' => false, 'class' => 'btn btn-xs btn-default', 'title' => __('Edit')]) ?>
                    <?= $this->Form->postLink('<span class="glyphicon glyphicon-trash"></span><span class="sr-only">' . __('Excluir') . '</span>', ['controller' => 'Servidores', 'action' => 'delete', $servidores->id], ['confirm' => __('Excluir realmente o registro # {0}?', $servidores->id), 'escape' => false, 'class' => 'btn btn-xs btn-danger', 'title' => __('Excluir')]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
    </div>
    <?php endif; ?>
    </div>
</div>
