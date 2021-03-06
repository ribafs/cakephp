<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User[]|\Cake\Collection\CollectionInterface $users
 */
?>
<div class="actions columns col-lg-2 col-md-3">
    <h3><?= __('Ações') ?></h3>
    <ul class="nav nav-stacked nav-pills">
        <li><?= $this->Html->link(__('Novo User'), ['action' => 'add']) ?></li>
	<li class="active"><?= $this->Html->link(__('Listar User'), ['action' => 'index']) ?></li>	
        <li><?= $this->Html->link(__('Listar Groups'), ['controller' => 'Groups', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('Novo Group'), ['controller' => 'Groups', 'action' => 'add']) ?></li>
    </ul>
	<?php
	/*
	    echo $this->Form->create(null, ['type' => 'get']);
   	    echo $this->Form->label('Busca');
	    echo $this->Form->input('search', ['class' => 'form-control', 'label' => false, 'style'=>'width:170px;',
		'placeholder' => 'Nome ou fone', 'value' => $this->request->getQuery('search')]);	    
	    echo $this->Form->button('Busca');
	    echo $this->Form->end();
	*/
	?>            
</div>
<div class="<%= $pluralVar %> index col-lg-10 col-md-9 columns">
    <div class="table-responsive">
        <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('username') ?></th>
                <th scope="col"><?= $this->Paginator->sort('password') ?></th>
                <th scope="col"><?= $this->Paginator->sort('group_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($users as $user): ?>
            <tr>
                <td><?= $this->Number->format($user->id) ?></td>
                <td><?= h($user->username) ?></td>
                <td><?= h($user->password) ?></td>
                <td><?= $user->has('group') ? $this->Html->link($user->group->name, ['controller' => 'Groups', 'action' => 'view', $user->group->id]) : '' ?></td>
                <td><?= h($user->created) ?></td>
                <td><?= h($user->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('<span class="glyphicon glyphicon-zoom-in"></span><span class="sr-only">' . __('Ver') . '</span>'), ['action' => 'view', $user->id],['escape' => false,'class' => 'btn btn-xs btn-default', 'title' => __('Ver')]) ?>
                    <?= $this->Html->link(__('<span class="glyphicon glyphicon-pencil"></span><span class="sr-only">' . __('Editar') . '</span>'), ['action' => 'edit', $user->id],['escape' => false, 'class' => 'btn btn-xs btn-default', 'title' => __('Editar')]) ?>
                    <?= $this->Form->postLink(__('<span class="glyphicon glyphicon-trash"></span><span class="sr-only">' . __('Excluir') . '</span>'), ['action' => 'delete', $user->id], ['confirm' => __('Deseja excluir realmente # {0}?', $user->id), 'escape' => false, 'class' => 'btn btn-xs btn-danger', 'title' => __('Excluir')]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <li><?= $this->Paginator->first('<< ' . __('primeira')) ?></li>
            <li><?= $this->Paginator->prev('< ' . __('anterior')) ?></li>
            <li><?= $this->Paginator->numbers() ?></li>
            <li><?= $this->Paginator->next(__('próxima') . ' >') ?></li>
            <li><?= $this->Paginator->last(__('última') . ' >>') ?></li>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Página {{page}} de {{pages}}, mostrando {{current}} registro(s) de um total de {{count}}')]) ?></p>
    </div>
</div>
