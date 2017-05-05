<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrderItemsTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('order_items', function (Blueprint $table) {
            $table->integer('order_id')->index();
            $table->integer('item_id')->index();
            $table->decimal('price');
            $table->integer('amount')->unsigned();
            $table->primary(['order_id', 'item_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('order_items');
    }

}
