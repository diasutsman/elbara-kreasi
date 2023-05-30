<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoices', function (Blueprint $table) {
            $table->id();
            $table->string('slug')->unique();
            $table->string('bill_from');
            $table->string('bill_from_address');
            $table->string('bill_to');
            $table->string('bill_to_address');
            $table->string('recipient_email');
            $table->string('bill_title');
            $table->date('issued_on');
            $table->date('due_on');
            $table->boolean('paid')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('invoices');
    }
};
