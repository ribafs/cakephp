<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Customer $customer
 */
?>
<div class="actions columns col-lg-2 col-md-3">
    <h3><?= __('Ações') ?></h3>

<style type="text/css">
    div.input label { display: block; }

    input {	
    -webkit-box-sizing: border-box;
    -moz-box-sizing: border-box;
    box-sizing: border-box;	
    width: 100%;
    }

    textarea {	
    -webkit-box-sizing: border-box;
    -moz-box-sizing: border-box;
    box-sizing: border-box;	
    width: 100%;
    }
</style>

    <ul class="nav nav-stacked nav-pills">
        <li><?= $this->Form->postLink(
                __('Excluir'),
                ['action' => 'delete', $customer->id],
                ['confirm' => __('Deseja realmente excluir # {0}?', $customer->id)]
            )
        ?></li>
        <li class="active"><?= $this->Html->link(__('Listar Customers'), ['action' => 'index']) ?></li>
    </ul>
</div>
<div class="customers form large-9 medium-8 columns content">
    <?= $this->Form->create($customer) ?>
    <fieldset>
        <legend><?= __('Edit Customer') ?></legend>
        <?php
            echo $this->Form->control('name');
            echo $this->Form->control('birthday', ['empty' => true]);
            echo $this->Form->control('phone');
            echo $this->Form->control('observation');
        ?>
    <br>
    <?= $this->Form->button(__('Enviar'), ['class' => 'btn-success']) ?>
    </fieldset>
    <?= $this->Form->end() ?>
</div>
