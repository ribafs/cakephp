<div class="users form">
<?= $this->Flash->render('auth') ?>    
    <?= $this->Form->create() ?>
    <div align="center">
    <fieldset>
        <legend><?= __('<h3><b>Favor entrar seu com login e senha</b></h3>') ?></legend>
        <?= $this->Form->input('username', ['label'=>'Login', 'class'=>'col4']) ?>
        <?= $this->Form->input('password',['label'=>'Senha', 'class'=>'col4']) ?>
    </fieldset>
    <?= $this->Form->button(__('Acessar')); ?>
    <?= $this->Form->end() ?>
    </div>
</div>
