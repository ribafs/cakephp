<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Customer $customer
 */
?>
<div class="actions columns col-lg-2 col-md-3">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <ul class="nav nav-stacked nav-pills">
                <li class="active disabled"><?= $this->Html->link(__('Novo Customer'), ['action' => 'add']) ?></li>
                <li><?= $this->Html->link(__('Listar Customers'), ['action' => 'index']) ?></li>
            </ul>
        </div>
    </aside>
<div class="customers form col-lg-10 col-md-9 columns">
            <?= $this->Form->create($customer) ?>
            <fieldset>
                <legend><?= __('Add Customer') ?></legend>

                    <?= $this->Form->control('name')?>
                    <?= $this->Form->control('birthday', ['empty' => true])?>
                    <?= $this->Form->control('phone')?>
                    <?= $this->Form->control('observation')?>

            </fieldset>
            <?= $this->Form->button(__('Submit'), ['class' => 'btn-warning']) ?>
            <?= $this->Form->end() ?>
    </div>
</div>
