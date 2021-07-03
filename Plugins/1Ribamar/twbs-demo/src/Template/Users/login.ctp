<div class="users form">
<?= $this->Flash->render('auth') ?>
    <?= $this->Form->create() ?>
    <fieldset>
        <legend><?= __('Favor entrar seu login e senha') ?></legend>
        <?= $this->Form->input('username',['label'=>'Login']) ?>
        <?= $this->Form->input('password',['label'=>'Senha']) ?>
    </fieldset>
    <?= $this->Form->button(__('Acessar')); ?>
    <?= $this->Form->end() ?>
</div>
