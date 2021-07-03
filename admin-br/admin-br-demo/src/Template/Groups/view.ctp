<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Group $group
 */
?>
<div class="actions columns col-lg-2 col-md-3">
    <h3><?= __('Ações') ?></h3>
    <ul class="nav nav-stacked nav-pills">
        <li><?= $this->Html->link(__('Editar Group'), ['action' => 'edit', $group->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Excluir Group'), ['action' => 'delete', $group->id], ['confirm' => __('Deseja excluir realmente # {0}?', $group->id)]) ?> </li>
        <li class="active"><?= $this->Html->link(__('Listar Groups'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('Novo Group'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('Listar Permissions'), ['controller' => 'Permissions', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('Novo Permission'), ['controller' => 'Permissions', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('Listar Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('Novo User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
    </ul>
</div>
<div class="$groups view col-lg-10 col-md-9 columns">
    <h3><?= h($group->name) ?></h3>
    <table class="table table-hover table-stripped">
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($group->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($group->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($group->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($group->modified) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Permissions relacionados') ?></h4>
        <?php if (!empty($group->permissions)): ?>
        <table class="table table-hover table-stripped">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Group Id') ?></th>
                <th scope="col"><?= __('Controller') ?></th>
                <th scope="col"><?= __('Action') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col" class="actions"><?= __('Ações') ?></th>
            </tr>
            <?php foreach ($group->permissions as $permissions): ?>
            <tr>
                <td><?= h($permissions->id) ?></td>
                <td><?= h($permissions->group_id) ?></td>
                <td><?= h($permissions->controller) ?></td>
                <td><?= h($permissions->action) ?></td>
                <td><?= h($permissions->created) ?></td>
                <td><?= h($permissions->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('<span class="glyphicon glyphicon-zoom-in"></span><span class="sr-only">' . __('Ver') . '</span>'), ['controller' => 'Permissions', 'action' => 'view', $permissions->id],['escape' => false,'class' => 'btn btn-xs btn-default', 'title' => __('Ver')]) ?>
                    <?= $this->Html->link(__('<span class="glyphicon glyphicon-pencil"></span><span class="sr-only">' . __('Editar') . '</span>'), ['controller' => 'Permissions', 'action' => 'edit', $permissions->id],['escape' => false, 'class' => 'btn btn-xs btn-default', 'title' => __('Editar')]) ?>
                    <?= $this->Form->postLink(__('<span class="glyphicon glyphicon-trash"></span><span class="sr-only">' . __('Excluir') . '</span>'), ['controller' => 'Permissions', 'action' => 'delete', $permissions->id], ['escape' => false,'confirm' => __('Deseja excluir realmente # {0}?', $permissions->id)],['escape' => false, 'class' => 'btn btn-xs btn-danger', 'title' => __('Excluir')]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Users relacionados') ?></h4>
        <?php if (!empty($group->users)): ?>
        <table class="table table-hover table-stripped">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Username') ?></th>
                <th scope="col"><?= __('Password') ?></th>
                <th scope="col"><?= __('Group Id') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col" class="actions"><?= __('Ações') ?></th>
            </tr>
            <?php foreach ($group->users as $users): ?>
            <tr>
                <td><?= h($users->id) ?></td>
                <td><?= h($users->username) ?></td>
                <td><?= h($users->password) ?></td>
                <td><?= h($users->group_id) ?></td>
                <td><?= h($users->created) ?></td>
                <td><?= h($users->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('<span class="glyphicon glyphicon-zoom-in"></span><span class="sr-only">' . __('Ver') . '</span>'), ['controller' => 'Users', 'action' => 'view', $users->id],['escape' => false,'class' => 'btn btn-xs btn-default', 'title' => __('Ver')]) ?>
                    <?= $this->Html->link(__('<span class="glyphicon glyphicon-pencil"></span><span class="sr-only">' . __('Editar') . '</span>'), ['controller' => 'Users', 'action' => 'edit', $users->id],['escape' => false, 'class' => 'btn btn-xs btn-default', 'title' => __('Editar')]) ?>
                    <?= $this->Form->postLink(__('<span class="glyphicon glyphicon-trash"></span><span class="sr-only">' . __('Excluir') . '</span>'), ['controller' => 'Users', 'action' => 'delete', $users->id], ['escape' => false,'confirm' => __('Deseja excluir realmente # {0}?', $users->id)],['escape' => false, 'class' => 'btn btn-xs btn-danger', 'title' => __('Excluir')]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
