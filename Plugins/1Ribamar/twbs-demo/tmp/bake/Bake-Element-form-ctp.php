<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * Slightly modified by Òscar Casajuana for the twbs-cake-plugin
 * also under the MIT license.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @since         0.1.0
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
use Cake\Utility\Inflector;

$fields = collection($fields)
    ->filter(function($field) use ($schema) {
        return $schema->columnType($field) !== 'binary';
    });
$pk = "\${$singularVar}->{$primaryKey[0]}";
?>
<div class="actions columns col-lg-2 col-md-3">
    <h3><CakePHPBakeOpenTag= __('Ações') CakePHPBakeCloseTag></h3>
    <ul class="nav nav-stacked nav-pills">
<?php if (strpos($action, 'add') === false): ?>
        <li class="active disabled"><CakePHPBakeOpenTag= $this->Html->link(__('Editar <?= $singularHumanName ?>'), ['action' => 'edit', <?= $pk ?>]) CakePHPBakeCloseTag> </li>
        <li><CakePHPBakeOpenTag= $this->Form->postLink(
                __('Excluir'),
                ['action' => 'delete', <?= $pk ?>],
                ['confirm' => __('Excluir realmente o registro # {0}?', $<?= $singularVar ?>-><?= $primaryKey[0] ?>), 'class' => 'btn-danger']
            )
        CakePHPBakeCloseTag></li>
        <li><CakePHPBakeOpenTag= $this->Html->link(__('Novo <?= $singularHumanName ?>'), ['action' => 'add']) CakePHPBakeCloseTag></li>
<?php else: ?>
        <li class="active disabled"><CakePHPBakeOpenTag= $this->Html->link(__('New <?= $singularHumanName ?>'), ['action' => 'add']) CakePHPBakeCloseTag></li>
<?php endif; ?>
        <li><CakePHPBakeOpenTag= $this->Html->link(__('Listar <?= $pluralHumanName ?>'), ['action' => 'index']) CakePHPBakeCloseTag></li>
<?php
        $done = [];
        foreach ($associations as $type => $data) {
            foreach ($data as $alias => $details) {
                if ($details['controller'] != $this->name && !in_array($details['controller'], $done)) {
?>
        <li><CakePHPBakeOpenTag= $this->Html->link(__('Listar <?= $this->_pluralHumanName($alias) ?>'), ['controller' => '<?= $details['controller'] ?>', 'action' => 'index']) ?> </li>
        <li><CakePHPBakeOpenTag= $this->Html->link(__('Novo <?= $this->_singularHumanName($alias) ?>'), ['controller' => '<?= $details['controller'] ?>', 'action' => 'add']) ?> </li>
<?php
                    $done[] = $details['controller'];
                }
            }
        }
?>
    </ul>
</div>
<div class="<?= $pluralVar ?> form col-lg-10 col-md-9 columns">
    <CakePHPBakeOpenTag= $this->Form->create($<?= $singularVar ?>); CakePHPBakeCloseTag>
    <fieldset>
        <legend><CakePHPBakeOpenTag= __('<?= Inflector::humanize($action) ?> <?= $singularHumanName ?>') CakePHPBakeCloseTag></legend>
        <CakePHPBakeOpenTagphp
<?php
        foreach ($fields as $field) {
            if (in_array($field, $primaryKey)) {
                continue;
            }
            if (isset($keyFields[$field])) {
                $fieldData = $schema->column($field);
                if (!empty($fieldData['null'])) {
?>
            echo $this->Form->input('<?= $field ?>', ['options' => $<?= $keyFields[$field] ?>, 'empty' => true]);
<?php
                } else {
?>
            echo $this->Form->input('<?= $field ?>', ['options' => $<?= $keyFields[$field] ?>]);
<?php
                }
                continue;
            }
            if (!in_array($field, ['created', 'modified', 'updated'])) {
?>
            echo $this->Form->input('<?= $field ?>');
<?php
            }
        }
        if (!empty($associations['BelongsToMany'])) {
            foreach ($associations['BelongsToMany'] as $assocName => $assocData) {
?>
            echo $this->Form->input('<?= $assocData['property'] ?>._ids', ['options' => $<?= $assocData['variable'] ?>]);
<?php
            }
        }
?>
        CakePHPBakeCloseTag>
    </fieldset>
    <CakePHPBakeOpenTag= $this->Form->button(__('Enviar'), ['class' => 'btn-success']) CakePHPBakeCloseTag>
    <CakePHPBakeOpenTag= $this->Form->end() CakePHPBakeCloseTag>
</div>
