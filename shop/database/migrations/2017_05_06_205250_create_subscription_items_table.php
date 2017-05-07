<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubscriptionItemsTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('subscription_items', function (Blueprint $table) {
            $table->integer('subscription_id')->index();
            $table->integer('item_id')->index();
            $table->integer('amount')->unsigned();
            $table->primary(['subscription_id', 'item_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('subscription_items');
    }

}
