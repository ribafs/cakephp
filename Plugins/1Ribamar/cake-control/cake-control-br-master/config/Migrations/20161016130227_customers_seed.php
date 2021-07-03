<?php

use Phinx\Migration\AbstractMigration;

class CustomersSeed extends AbstractMigration
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

		$populator->addEntity('Customers', 100, [
			'name'=> function() use ($faker) {
				return $faker->name();
			},
			'birthday'=>function() use ($faker) {
				return $faker->dateTimeBetween($startDate = 'now', $endDate = 'now');
			},						
			'phone'=> function() use ($faker) {
				return $faker->phoneNumber();
			},		
			'user_id'=>function() use ($faker) {
				return $faker->numberBetween($min = 1, $max = 4);
			},													
			'observation'=>function() use ($faker) {
				return $faker->realText($faker->numberBetween(10,100));
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
