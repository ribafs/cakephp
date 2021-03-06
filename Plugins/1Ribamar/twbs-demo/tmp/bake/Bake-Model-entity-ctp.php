<?php
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

$propertyHintMap = $this->DocBlock->buildEntityPropertyHintTypeMap(isset($propertySchema) ? $propertySchema : []);
$associationHintMap = $this->DocBlock->buildEntityAssociationHintTypeMap(isset($propertySchema) ? $propertySchema : []);

$annotations = $this->DocBlock->propertyHints($propertyHintMap);
if(!empty($associationHintMap)) {
    $annotations[] = "";
    $annotations = array_merge($annotations, $this->DocBlock->propertyHints($associationHintMap));
}

$accessible = [];
if (!isset($fields) || $fields !== false) {
    if (!empty($fields)) {
        foreach ($fields as $field) {
            $accessible[$field] = 'true';
        }
    } elseif (!empty($primaryKey)) {
        $accessible['*'] = 'true';
        foreach ($primaryKey as $field) {
            $accessible[$field] = 'false';
        }
    }
}
?>
<CakePHPBakeOpenTagphp
namespace <?= $namespace ?>\Model\Entity;

use Cake\ORM\Entity;
use Cake\Auth\DefaultPasswordHasher;

<?= $this->DocBlock->classDescription($name, 'Entity', $annotations) ?>

class <?= $name ?> extends Entity
{
<?php if (!empty($accessible)): ?>

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [<?= $this->Bake->stringifyList($accessible, ['quotes' => false]) ?>];
<?php endif ?>
<?php if (!empty($hidden)): ?>

    /**
     * Fields that are excluded from JSON versions of the entity.
     *
     * @var array
     */
    protected $_hidden = [<?= $this->Bake->stringifyList($hidden) ?>];

    protected function _setPassword($password)
    {
        return (new DefaultPasswordHasher)->hash($password);
    }        
        
<?php endif ?>
<?php if (empty($accessible) && empty($hidden)): ?>

<?php endif ?>
}
