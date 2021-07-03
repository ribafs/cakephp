<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Customer $customer
 */
?>
<div class="actions columns col-lg-2 col-md-3">
    <h3><?= __('Ações') ?></h3>
    <ul class="nav nav-stacked nav-pills">
        <li><?= $this->Html->link(__('Editar Customer'), ['action' => 'edit', $customer->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Excluir Customer'), ['action' => 'delete', $customer->id], ['confirm' => __('Deseja excluir realmente # {0}?', $customer->id)]) ?> </li>
        <li class="active"><?= $this->Html->link(__('Listar Customers'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('Novo Customer'), ['action' => 'add']) ?> </li>
    </ul>
</div>
<div class="$customers view col-lg-10 col-md-9 columns">
    <h3><?= h($customer->name) ?></h3>
    <table class="table table-hover table-stripped">
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($customer->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Phone') ?></th>
            <td><?= h($customer->phone) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($customer->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Birthday') ?></th>
            <td><?= h($customer->birthday) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($customer->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($customer->modified) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Observation') ?></h4>
        <?= $this->Text->autoParagraph(h($customer->observation)); ?>
    </div>
</div>
