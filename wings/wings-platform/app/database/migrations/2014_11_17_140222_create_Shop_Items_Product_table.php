<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateShopItemsProductTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('Shop_Items_Product', function(Blueprint $table)
		{
			$table->integer('ID', true);
			$table->string('Title', 100);
			$table->text('Description');
			$table->float('Price', 10, 0);
			$table->integer('Amount');
			$table->string('Pic1', 100);
			$table->string('Pic2', 100)->nullable();
			$table->string('Pic3', 100)->nullable();
			$table->integer('Users_ID')->index('fk_Shop_Items_Product_Users1');
			$table->integer('Categories_ID')->index('fk_Shop_Items_Product_Categories1');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('Shop_Items_Product');
	}

}
