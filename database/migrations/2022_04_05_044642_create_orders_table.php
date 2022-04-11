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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();

//            $table->string('o_reference', 10);
            $table->integer('session_id')->nullable()->default(null);
            $table->string('process_url')->nullable()->default(null);
            $table->unsignedBigInteger('user_id')->nullable();
                $table->foreign('user_id')->references('id')->on('users')->onDelete('set null');
            $table->enum('status', ['uncreated', 'APPROVED', 'PENDING', 'REJECTED', 'FAILED']);
            $table->integer('total_amount');
            $table->string('expiration');
            $table->json('transactions')->nullable();

            $table->timestamp('disabled_at')->nullable();
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
        Schema::dropIfExists('orders');
    }
};
