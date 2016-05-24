<?php
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
class UsersNewColumns extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::table ( 'users', function ($table) {
			$table->renameColumn ( 'name', 'first_name' );
			$table->string ( 'last_name', 255 );
			$table->string ( 'date_of_birth', 255 );
		} );
	}
	
	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::table ( 'users', function ($table) {
			$table->dropColumn ( 'last_name' );
			$table->renameColumn ( 'first_name', 'name' );
		} );
	}
}
