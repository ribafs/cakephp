<?php
/**
 * @var \App\View\AppView $this
 */
?>
<div class="users form" align="center">
<div class="form-group">
<?= $this->Flash->render('auth') ?>
    <?= $this->Form->create() ?>
    <fieldset>
        <legend><?= __('Favor entrar com seu login e senha') ?></legend>
        <?= $this->Form->control('username', ['label'=>'Login', 'class'=>'col4 form-control', 'autofocus'=>'true']) ?>
        <?= $this->Form->control('password',['label'=>'Senha', 'class'=>'col4 form-control', 'pattern'=>'^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$', 'minlenght'=>8, 'title'=>'Favor digitar uma senha com pelo menos 8 dígitos, sendo pelo menos 1 algarismo, um minúsculo, um maiúsculo e um símbolo']) ?>
    </fieldset>
    <?= $this->Form->button(__('Acessar',['class'=>'btn btn-primary'])); ?>
    <?= $this->Form->end() ?>
</div>
</div>
