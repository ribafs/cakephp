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

$associations += ['BelongsTo' => [], 'HasOne' => [], 'HasMany' => [], 'BelongsToMany' => []];
$immediateAssociations = $associations['BelongsTo'] + $associations['HasOne'];
$associationFields = collection($fields)
    ->map(function($field) use ($immediateAssociations) {
        foreach ($immediateAssociations as $alias => $details) {
            if ($field === $details['foreignKey']) {
                return [$field => $details];
            }
        }
    })
    ->filter()
    ->reduce(function($fields, $value) {
        return $fields + $value;
    }, []);

$groupedFields = collection($fields)
    ->filter(function($field) use ($schema) {
        return $schema->columnType($field) !== 'binary';
    })
    ->groupBy(function($field) use ($schema, $associationFields) {
        $type = $schema->columnType($field);
        if (isset($associationFields[$field])) {
            return 'string';
        }
        if (in_array($type, ['integer', 'float', 'decimal', 'biginteger'])) {
            return 'number';
        }
        if (in_array($type, ['date', 'time', 'datetime', 'timestamp'])) {
            return 'date';
        }
        return in_array($type, ['text', 'boolean']) ? $type : 'string';
    })
    ->toArray();

$groupedFields += ['number' => [], 'string' => [], 'boolean' => [], 'date' => [], 'text' => []];
$pk = "\$$singularVar->{$primaryKey[0]}";
?>
<div class="actions columns col-lg-2 col-md-3">
    <h3><CakePHPBakeOpenTag= __('Ações') CakePHPBakeCloseTag></h3>
    <ul class="nav nav-stacked nav-pills">
        <li><CakePHPBakeOpenTag= $this->Html->link(__('Editar <?= $singularHumanName ?>'), ['action' => 'edit', <?= $pk ?>]) CakePHPBakeCloseTag> </li>
        <li><CakePHPBakeOpenTag= $this->Form->postLink(__('Excluir <?= $singularHumanName ?>'), ['action' => 'delete', <?= $pk ?>], ['confirm' => __('Excluir realmente o registro # {0}?', <?= $pk ?>), 'class' => 'btn-danger']) CakePHPBakeCloseTag> </li>
        <li><CakePHPBakeOpenTag= $this->Html->link(__('Listar <?= $pluralHumanName ?>'), ['action' => 'index']) CakePHPBakeCloseTag> </li>
        <li><CakePHPBakeOpenTag= $this->Html->link(__('Novo <?= $singularHumanName ?>'), ['action' => 'add']) CakePHPBakeCloseTag> </li>
<?php
    $done = [];
    foreach ($associations as $type => $data) {
        foreach ($data as $alias => $details) {
            if ($details['controller'] != $this->name && !in_array($details['controller'], $done)) {
?>
        <li><CakePHPBakeOpenTag= $this->Html->link(__('Listar <?= $this->_pluralHumanName($alias) ?>'), ['controller' => '<?= $details['controller'] ?>', 'action' => 'index']) CakePHPBakeCloseTag> </li>
        <li><CakePHPBakeOpenTag= $this->Html->link(__('Novo <?= Inflector::humanize(Inflector::singularize(Inflector::underscore($alias))) ?>'), ['controller' => '<?= $details['controller'] ?>', 'action' => 'add']) CakePHPBakeCloseTag> </li>
<?php
                $done[] = $details['controller'];
            }
        }
    }
?>
    </ul>
</div>
<div class="<?= $pluralVar ?> view col-lg-10 col-md-9 columns">
    <h2><CakePHPBakeOpenTag= h($<?= $singularVar ?>-><?= $displayField ?>) CakePHPBakeCloseTag></h2>
    <div class="row">
<?php if ($groupedFields['string']) : ?>
        <div class="col-lg-5 columns strings">
            <div class="panel panel-default">
                <div class="panel-body">
<?php foreach ($groupedFields['string'] as $field) : ?>
<?php if (isset($associationFields[$field])) :
            $details = $associationFields[$field];
?>
                    <h6 class="subheader"><CakePHPBakeOpenTag= __('<?= Inflector::humanize($details['property']) ?>') CakePHPBakeCloseTag></h6>
                    <p><CakePHPBakeOpenTag= $<?= $singularVar ?>->has('<?= $details['property'] ?>') ? $this->Html->link($<?= $singularVar ?>-><?= $details['property'] ?>-><?= $details['displayField'] ?>, ['controller' => '<?= $details['controller'] ?>', 'action' => 'view', $<?= $singularVar ?>-><?= $details['property'] ?>-><?= $details['primaryKey'][0] ?>]) : '' CakePHPBakeCloseTag></p>
<?php else : ?>
                    <h6 class="subheader"><CakePHPBakeOpenTag= __('<?= Inflector::humanize($field) ?>') CakePHPBakeCloseTag></h6>
                    <p><CakePHPBakeOpenTag= h($<?= $singularVar ?>-><?= $field ?>) CakePHPBakeCloseTag></p>
<?php endif; ?>
<?php endforeach; ?>
                </div>
            </div>
        </div>
<?php endif; ?>
<?php if ($groupedFields['number']) : ?>
        <div class="col-lg-2 columns numbers end">
            <div class="panel panel-default">
                <div class="panel-body">
<?php foreach ($groupedFields['number'] as $field) : ?>
                    <h6 class="subheader"><CakePHPBakeOpenTag= __('<?= Inflector::humanize($field) ?>') CakePHPBakeCloseTag></h6>
                    <p><CakePHPBakeOpenTag= $this->Number->format($<?= $singularVar ?>-><?= $field ?>) CakePHPBakeCloseTag></p>
<?php endforeach; ?>
                </div>
            </div>
        </div>
<?php endif; ?>
<?php if ($groupedFields['date']) : ?>
        <div class="col-lg-2 columns dates end">
            <div class="panel panel-default">
                <div class="panel-body">
<?php foreach ($groupedFields['date'] as $field) : ?>
                    <h6 class="subheader"><?= "<?= __('" . Inflector::humanize($field) . "') ?>" ?></h6>
                    <p><CakePHPBakeOpenTag= h($<?= $singularVar ?>-><?= $field ?>) CakePHPBakeCloseTag></p>
<?php endforeach; ?>
                </div>
            </div>
        </div>
<?php endif; ?>
<?php if ($groupedFields['boolean']) : ?>
        <div class="col-lg-2 columns booleans end">
            <div class="panel panel-default">
                <div class="panel-body">
<?php foreach ($groupedFields['boolean'] as $field) : ?>
                    <h6 class="subheader"><CakePHPBakeOpenTag= __('<?= Inflector::humanize($field) ?>') CakePHPBakeCloseTag></h6>
                    <p><CakePHPBakeOpenTag= $<?= $singularVar ?>-><?= $field ?> ? __('Yes') : __('No'); CakePHPBakeCloseTag></p>
<?php endforeach; ?>
                </div>
            </div>
        </div>
<?php endif; ?>
    </div>
<?php if ($groupedFields['text']) : ?>
<?php foreach ($groupedFields['text'] as $field) : ?>
    <div class="row texts">
        <div class="columns col-lg-9">
            <div class="panel panel-default">
                <div class="panel-body">
                    <h6 class="subheader"><CakePHPBakeOpenTag= __('<?= Inflector::humanize($field) ?>') CakePHPBakeCloseTag></h6>
                    <CakePHPBakeOpenTag= $this->Text->autoParagraph(h($<?= $singularVar ?>-><?= $field ?>)); CakePHPBakeCloseTag>
                </div>
            </div>
        </div>
    </div>
<?php endforeach; ?>
<?php endif; ?>
</div>
<?php
$relations = $associations['HasMany'] + $associations['BelongsToMany'];
foreach ($relations as $alias => $details):
    $otherSingularVar = Inflector::variable($alias);
    $otherPluralHumanName = Inflector::humanize($details['controller']);
    ?>
<div class="related row">
    <div class="column col-lg-12">
    <h4 class="subheader"><CakePHPBakeOpenTag= __('Related <?= $otherPluralHumanName ?>') CakePHPBakeCloseTag></h4>
    <CakePHPBakeOpenTagphp if (!empty($<?= $singularVar ?>-><?= $details['property'] ?>)): CakePHPBakeCloseTag>
    <div class="table-responsive">
        <table class="table">
            <tr>
    <?php foreach ($details['fields'] as $field): ?>
            <th><CakePHPBakeOpenTag= __('<?= Inflector::humanize($field) ?>') CakePHPBakeCloseTag></th>
    <?php endforeach; ?>
            <th class="actions"><CakePHPBakeOpenTag= __('Ações') CakePHPBakeCloseTag></th>
            </tr>
            <CakePHPBakeOpenTagphp foreach ($<?= $singularVar ?>-><?= $details['property'] ?> as $<?= $otherSingularVar ?>): CakePHPBakeCloseTag>
            <tr>
<?php foreach ($details['fields'] as $field): ?>
                <td><CakePHPBakeOpenTag= h($<?= $otherSingularVar ?>-><?= $field ?>) CakePHPBakeCloseTag></td>
<?php endforeach; ?>
<?php $otherPk = "\${$otherSingularVar}->{$details['primaryKey'][0]}"; ?>
                <td class="actions">
                    <CakePHPBakeOpenTag= $this->Html->link('<span class="glyphicon glyphicon-zoom-in"></span><span class="sr-only">' . __('Ver') . '</span>', ['controller' => '<?= $details['controller'] ?>', 'action' => 'view', <?= $otherPk ?>], ['escape' => false, 'class' => 'btn btn-xs btn-default', 'title' => __('View')]) CakePHPBakeCloseTag>
                    <CakePHPBakeOpenTag= $this->Html->link('<span class="glyphicon glyphicon-pencil"></span><span class="sr-only">' . __('Editar') . '</span>', ['controller' => '<?= $details['controller'] ?>', 'action' => 'edit', <?= $otherPk ?>], ['escape' => false, 'class' => 'btn btn-xs btn-default', 'title' => __('Edit')]) CakePHPBakeCloseTag>
                    <CakePHPBakeOpenTag= $this->Form->postLink('<span class="glyphicon glyphicon-trash"></span><span class="sr-only">' . __('Excluir') . '</span>', ['controller' => '<?= $details['controller'] ?>', 'action' => 'delete', <?= $otherPk ?>], ['confirm' => __('Excluir realmente o registro # {0}?', <?= $otherPk ?>), 'escape' => false, 'class' => 'btn btn-xs btn-danger', 'title' => __('Excluir')]) CakePHPBakeCloseTag>
                </td>
            </tr>
            <CakePHPBakeOpenTagphp endforeach; CakePHPBakeCloseTag>
        </table>
    </div>
    <CakePHPBakeOpenTagphp endif; CakePHPBakeCloseTag>
    </div>
</div>
<?php endforeach; ?>
