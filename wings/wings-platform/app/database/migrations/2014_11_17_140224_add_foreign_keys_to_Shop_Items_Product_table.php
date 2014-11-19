<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToShopItemsProductTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('Shop_Items_Product', function(Blueprint $table)
		{
			$table->foreign('Users_ID', 'fk_Shop_Items_Product_Users1')->references('ID')->on('users')->onUpdate('NO ACTION')->onDelete('NO ACTION');
			$table->foreign('Categories_ID', 'fk_Shop_Items_Product_Categories1')->references('ID')->on('Categories')->onUpdate('NO ACTION')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('Shop_Items_Product', function(Blueprint $table)
		{
			$table->dropForeign('Users_ID');
			$table->dropForeign('Categories_ID');
		});
	}

}
