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
        return !in_array($schema->columnType($field), ['binary', 'text']);
    })
    ->take(7);
?>
<div class="actions columns col-lg-2 col-md-3">
    <h3><CakePHPBakeOpenTag= __('Ações') CakePHPBakeCloseTag></h3>
    <ul class="nav nav-stacked nav-pills">
        <li><CakePHPBakeOpenTag= $this->Html->link(__('Novo <?= $singularHumanName ?>'), ['action' => 'add']) CakePHPBakeCloseTag></li>
        <li class="active disabled"><CakePHPBakeOpenTag= $this->Html->link(__('List <?= $pluralHumanName ?>'), ['action' => 'index']) CakePHPBakeCloseTag></li>
<?php
    $done = [];
    foreach ($associations as $type => $data):
        foreach ($data as $alias => $details):
            if ($details['controller'] != $this->name && !in_array($details['controller'], $done)):
?>
        <li><CakePHPBakeOpenTag= $this->Html->link(__('Listar <?= $this->_pluralHumanName($alias) ?>'), ['controller' => '<?= $details['controller'] ?>', 'action' => 'index']) CakePHPBakeCloseTag> </li>
        <li><CakePHPBakeOpenTag= $this->Html->link(__('Novo <?= $this->_singularHumanName($alias) ?>'), ['controller' => '<?= $details['controller'] ?>', 'action' => 'add']) CakePHPBakeCloseTag> </li>
<?php
                $done[] = $details['controller'];
            endif;
        endforeach;
    endforeach;
?>
    </ul>
	<CakePHPBakeOpenTagphp
/*
	    echo $this->Form->create(null, ['type' => 'get']);
   	    echo $this->Form->label('Busca');
	    echo $this->Form->input('search', ['class' => 'form-control', 'label' => false, 'style'=>'width:170px;',
		'placeholder' => 'Digite o nome ou cpf', 'value' => $this->request->query('search')]);	    
	    echo $this->Form->button('Pesquisar');
	    echo $this->Form->end();
*/
	CakePHPBakeCloseTag>            
</div>
<div class="<?= $pluralVar ?> index col-lg-10 col-md-9 columns">
    <div class="table-responsive">
        <table class="table table-striped">
        <thead>
            <tr>
    <?php foreach ($fields as $field): ?>
            <th><CakePHPBakeOpenTag= $this->Paginator->sort('<?= $field ?>') CakePHPBakeCloseTag></th>
    <?php endforeach; ?>
            <th class="actions"><CakePHPBakeOpenTag= __('Actions') CakePHPBakeCloseTag></th>
            </tr>
        </thead>
        <tbody>
        <CakePHPBakeOpenTagphp foreach ($<?= $pluralVar ?> as $<?= $singularVar ?>): CakePHPBakeCloseTag>
            <tr>
<?php        foreach ($fields as $field) {
        $isKey = false;
        if (!empty($associations['BelongsTo'])) {
            foreach ($associations['BelongsTo'] as $alias => $details) {
                if ($field === $details['foreignKey']) {
                    $isKey = true;
?>
            <td>
                    <CakePHPBakeOpenTag= $<?= $singularVar ?>->has('<?= $details['property'] ?>') ? $this->Html->link($<?= $singularVar ?>-><?= $details['property'] ?>-><?= $details['displayField'] ?>, ['controller' => '<?= $details['controller'] ?>', 'action' => 'view', $<?= $singularVar ?>-><?= $details['property'] ?>-><?= $details['primaryKey'][0] ?>]) : '' CakePHPBakeCloseTag>
                </td>
<?php
                        break;
                    }
                }
            }
            if ($isKey !== true) {
                if (!in_array($schema->columnType($field), ['integer', 'biginteger', 'decimal', 'float'])) {
    ?>
            <td><CakePHPBakeOpenTag= h($<?= $singularVar ?>-><?= $field ?>) CakePHPBakeCloseTag></td>
    <?php
                } else {
    ?>
                <td><CakePHPBakeOpenTag= $this->Number->format($<?= $singularVar ?>-><?= $field ?>) CakePHPBakeCloseTag></td>
    <?php
                }
            }
        }

        $pk = '$' . $singularVar . '->' . $primaryKey[0];
    ?>
                <td class="actions">
                    <CakePHPBakeOpenTag= $this->Html->link('<span class="glyphicon glyphicon-zoom-in"></span><span class="sr-only">' . __('Visializar') . '</span>', ['action' => 'view', <?= $pk ?>], ['escape' => false, 'class' => 'btn btn-xs btn-default', 'title' => __('Visualizar')]) CakePHPBakeCloseTag>
                    <CakePHPBakeOpenTag= $this->Html->link('<span class="glyphicon glyphicon-pencil"></span><span class="sr-only">' . __('Editar') . '</span>', ['action' => 'edit', <?= $pk ?>], ['escape' => false, 'class' => 'btn btn-xs btn-default', 'title' => __('Editar')]) CakePHPBakeCloseTag>
                    <CakePHPBakeOpenTag= $this->Form->postLink('<span class="glyphicon glyphicon-trash"></span><span class="sr-only">' . __('Excluir') . '</span>', ['action' => 'delete', <?= $pk ?>], ['confirm' => __('Excluir realmente o registro # {0}?', <?= $pk ?>), 'escape' => false, 'class' => 'btn btn-xs btn-danger', 'title' => __('Excluir')]) CakePHPBakeCloseTag>
                </td>
            </tr>

        <CakePHPBakeOpenTagphp endforeach; CakePHPBakeCloseTag>
        </tbody>
        </table>
    </div>
    <div class="paginator">
        <ul class="pagination">
            <CakePHPBakeOpenTag= $this->Paginator->prev('< ' . __('Anterior')) CakePHPBakeCloseTag>
            <CakePHPBakeOpenTag= $this->Paginator->numbers() CakePHPBakeCloseTag>
            <CakePHPBakeOpenTag= $this->Paginator->next(__('Próximo') . ' >') CakePHPBakeCloseTag>
        </ul>
        <p><CakePHPBakeOpenTag= $this->Paginator->counter() CakePHPBakeCloseTag></p>
    </div>
</div>
