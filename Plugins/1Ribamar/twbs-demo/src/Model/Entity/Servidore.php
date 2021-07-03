<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;
use Cake\Auth\DefaultPasswordHasher;

/**
 * Servidore Entity
 *
 * @property int $id
 * @property string $nome
 * @property string $email
 * @property \Cake\I18n\Time $nascimento
 * @property string $cpf
 * @property string $cnpj
 * @property string $fone
 * @property int $user_id
 * @property string $observacao
 *
 * @property \App\Model\Entity\User $user
 */
class Servidore extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        '*' => true,
        'id' => false
    ];
}
