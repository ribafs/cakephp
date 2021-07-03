<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Customer[]|\Cake\Collection\CollectionInterface $customers
 */
?>
<div class="actions columns col-lg-2 col-md-3">
    <h3><?= __('Ações') ?></h3>
    <ul class="nav nav-stacked nav-pills">
        <li><?= $this->Html->link(__('Novo Customer'), ['action' => 'add']) ?></li>
	<li class="active"><?= $this->Html->link(__('Listar Customer'), ['action' => 'index']) ?></li>	
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
                <th scope="col"><?= $this->Paginator->sort('name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('birthday') ?></th>
                <th scope="col"><?= $this->Paginator->sort('phone') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($customers as $customer): ?>
            <tr>
                <td><?= $this->Number->format($customer->id) ?></td>
                <td><?= h($customer->name) ?></td>
                <td><?= h($customer->birthday) ?></td>
                <td><?= h($customer->phone) ?></td>
                <td><?= h($customer->created) ?></td>
                <td><?= h($customer->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('<span class="glyphicon glyphicon-zoom-in"></span><span class="sr-only">' . __('Ver') . '</span>'), ['action' => 'view', $customer->id],['escape' => false,'class' => 'btn btn-xs btn-default', 'title' => __('Ver')]) ?>
                    <?= $this->Html->link(__('<span class="glyphicon glyphicon-pencil"></span><span class="sr-only">' . __('Editar') . '</span>'), ['action' => 'edit', $customer->id],['escape' => false, 'class' => 'btn btn-xs btn-default', 'title' => __('Editar')]) ?>
                    <?= $this->Form->postLink(__('<span class="glyphicon glyphicon-trash"></span><span class="sr-only">' . __('Excluir') . '</span>'), ['action' => 'delete', $customer->id], ['confirm' => __('Deseja excluir realmente # {0}?', $customer->id), 'escape' => false, 'class' => 'btn btn-xs btn-danger', 'title' => __('Excluir')]) ?>
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
