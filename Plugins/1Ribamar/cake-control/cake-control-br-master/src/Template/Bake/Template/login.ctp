<%
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @since         0.1.0
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
%>   
<div class="<%= $pluralVar %> form">
<?= $this->Flash->render('auth') ?>    
    <?= $this->Form->create() ?>
    <fieldset>
        <legend><?= __('Favor entrar seu login e senha') ?></legend>
        <?= $this->Form->input('username', ['Login']) ?>
        <?= $this->Form->input('password',['Senha']) ?>
    </fieldset>
    <?= $this->Form->button(__('Acessar')); ?>
    <?= $this->Form->end() ?>
</div>
