<div class="actions columns col-lg-2 col-md-3">
    <h3><?= __('Ações') ?></h3>
    <ul class="nav nav-stacked nav-pills">
        <li><?= $this->Html->link(__('Novo Servidore'), ['action' => 'add']) ?></li>
        <li class="active disabled"><?= $this->Html->link(__('List Servidores'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('Listar Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('Novo User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
    </ul>
	<?php
/*
	    echo $this->Form->create(null, ['type' => 'get']);
   	    echo $this->Form->label('Busca');
	    echo $this->Form->input('search', ['class' => 'form-control', 'label' => false, 'style'=>'width:170px;',
		'placeholder' => 'Digite o nome ou cpf', 'value' => $this->request->query('search')]);	    
	    echo $this->Form->button('Pesquisar');
	    echo $this->Form->end();
*/
	?>            
</div>
<div class="servidores index col-lg-10 col-md-9 columns">
    <div class="table-responsive">
        <table class="table table-striped">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('nome') ?></th>
                <th><?= $this->Paginator->sort('email') ?></th>
                <th><?= $this->Paginator->sort('nascimento') ?></th>
                <th><?= $this->Paginator->sort('cpf') ?></th>
                <th><?= $this->Paginator->sort('cnpj') ?></th>
                <th><?= $this->Paginator->sort('fone') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
        <?php foreach ($servidores as $servidore): ?>
            <tr>
                <td><?= $this->Number->format($servidore->id) ?></td>
                <td><?= h($servidore->nome) ?></td>
                <td><?= h($servidore->email) ?></td>
                <td><?= h($servidore->nascimento) ?></td>
                <td><?= h($servidore->cpf) ?></td>
                <td><?= h($servidore->cnpj) ?></td>
                <td><?= h($servidore->fone) ?></td>
                    <td class="actions">
                    <?= $this->Html->link('<span class="glyphicon glyphicon-zoom-in"></span><span class="sr-only">' . __('Visializar') . '</span>', ['action' => 'view', $servidore->id], ['escape' => false, 'class' => 'btn btn-xs btn-default', 'title' => __('Visualizar')]) ?>
                    <?= $this->Html->link('<span class="glyphicon glyphicon-pencil"></span><span class="sr-only">' . __('Editar') . '</span>', ['action' => 'edit', $servidore->id], ['escape' => false, 'class' => 'btn btn-xs btn-default', 'title' => __('Editar')]) ?>
                    <?= $this->Form->postLink('<span class="glyphicon glyphicon-trash"></span><span class="sr-only">' . __('Excluir') . '</span>', ['action' => 'delete', $servidore->id], ['confirm' => __('Excluir realmente o registro # {0}?', $servidore->id), 'escape' => false, 'class' => 'btn btn-xs btn-danger', 'title' => __('Excluir')]) ?>
                </td>
            </tr>

        <?php endforeach; ?>
        </tbody>
        </table>
    </div>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->prev('< ' . __('Anterior')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('Próximo') . ' >') ?>
        </ul>
        <p><?= $this->Paginator->counter() ?></p>
    </div>
</div>
