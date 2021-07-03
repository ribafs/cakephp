<div class="actions columns col-lg-2 col-md-3">
    <h3><?= __('Ações') ?></h3>
    <ul class="nav nav-stacked nav-pills">
        <li><?= $this->Html->link(__('Editar Servidore'), ['action' => 'edit', $servidore->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Excluir Servidore'), ['action' => 'delete', $servidore->id], ['confirm' => __('Excluir realmente o registro # {0}?', $servidore->id), 'class' => 'btn-danger']) ?> </li>
        <li><?= $this->Html->link(__('Listar Servidores'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('Novo Servidore'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('Listar Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('Novo User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
    </ul>
</div>
<div class="servidores view col-lg-10 col-md-9 columns">
    <h2><?= h($servidore->id) ?></h2>
    <div class="row">
        <div class="col-lg-5 columns strings">
            <div class="panel panel-default">
                <div class="panel-body">
                    <h6 class="subheader"><?= __('Nome') ?></h6>
                    <p><?= h($servidore->nome) ?></p>
                    <h6 class="subheader"><?= __('Email') ?></h6>
                    <p><?= h($servidore->email) ?></p>
                    <h6 class="subheader"><?= __('Cpf') ?></h6>
                    <p><?= h($servidore->cpf) ?></p>
                    <h6 class="subheader"><?= __('Cnpj') ?></h6>
                    <p><?= h($servidore->cnpj) ?></p>
                    <h6 class="subheader"><?= __('Fone') ?></h6>
                    <p><?= h($servidore->fone) ?></p>
                    <h6 class="subheader"><?= __('User') ?></h6>
                    <p><?= $servidore->has('user') ? $this->Html->link($servidore->user->id, ['controller' => 'Users', 'action' => 'view', $servidore->user->id]) : '' ?></p>
                </div>
            </div>
        </div>
        <div class="col-lg-2 columns numbers end">
            <div class="panel panel-default">
                <div class="panel-body">
                    <h6 class="subheader"><?= __('Id') ?></h6>
                    <p><?= $this->Number->format($servidore->id) ?></p>
                </div>
            </div>
        </div>
        <div class="col-lg-2 columns dates end">
            <div class="panel panel-default">
                <div class="panel-body">
                    <h6 class="subheader"><?= __('Nascimento') ?></h6>
                    <p><?= h($servidore->nascimento) ?></p>
                </div>
            </div>
        </div>
    </div>
    <div class="row texts">
        <div class="columns col-lg-9">
            <div class="panel panel-default">
                <div class="panel-body">
                    <h6 class="subheader"><?= __('Observacao') ?></h6>
                    <?= $this->Text->autoParagraph(h($servidore->observacao)); ?>
                </div>
            </div>
        </div>
    </div>
</div>
