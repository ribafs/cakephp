<?php

use Phinx\Migration\AbstractMigration;
use Cake\Auth\DefaultPasswordHasher;

class UsersSeed extends AbstractMigration
{
    /**
     * Change Method.
     *
     * Write your reversible migrations using this method.
     *
     * More information on writing migrations is available here:
     * http://docs.phinx.org/en/latest/migrations.html#the-abstractmigration-class
     *
     * The following commands can be used in this method and Phinx will
     * automatically reverse them when rolling back:
     *
     *    createTable
     *    renameTable
     *    addColumn
     *    renameColumn
     *    addIndex
     *    addForeignKey
     *
     * Remember to call "create()" or "update()" and NOT "save()" when working
     * with the Table class.
     */
    public function up()
    {
		$faker = \Faker\Factory::create();
		$populator = new Faker\ORM\CakePHP\Populator($faker);
		
		$populator->addEntity('Users', 1, [
			'username' => 'super',	
			'group_id' => 1,				
			'password' => function (){
				$hasher = new DefaultPasswordHasher();
				return $hasher->hash('super');
			},
			'created' => function() use ($faker) {
				return $faker->dateTimeBetween($startDate = 'now', $endDate = 'now');
			},
			'modified' => function() use ($faker) {
				return $faker->dateTimeBetween($startDate = 'now', $endDate = 'now');
			}
		]);
		$populator->execute();
				
		$populator->addEntity('Users', 1, [
			'username' => 'admin',	
			'group_id' => 2,							
			'password' => function (){
				$hasher = new DefaultPasswordHasher();
				return $hasher->hash('admin');
			},
			'created' => function() use ($faker) {
				return $faker->dateTimeBetween($startDate = 'now', $endDate = 'now');
			},
			'modified' => function() use ($faker) {
				return $faker->dateTimeBetween($startDate = 'now', $endDate = 'now');
			}
		]);		
		$populator->execute();
				
		$populator->addEntity('Users', 1, [
			'username' => 'manager',	
			'group_id' => 3,							
			'password' => function (){
				$hasher = new DefaultPasswordHasher();
				return $hasher->hash('manager');
			},
			'created' => function() use ($faker) {
				return $faker->dateTimeBetween($startDate = 'now', $endDate = 'now');
			},
			'modified' => function() use ($faker) {
				return $faker->dateTimeBetween($startDate = 'now', $endDate = 'now');
			}
		]);				
		$populator->execute();
				
		$populator->addEntity('Users', 1, [
			'username' => 'user',	
			'group_id' => 4,							
			'password' => function (){
				$hasher = new DefaultPasswordHasher();
				return $hasher->hash('user');
			},
			'created' => function() use ($faker) {
				return $faker->dateTimeBetween($startDate = 'now', $endDate = 'now');
			},
			'modified' => function() use ($faker) {
				return $faker->dateTimeBetween($startDate = 'now', $endDate = 'now');
			}
		]);				
		$populator->execute();
    }
}
