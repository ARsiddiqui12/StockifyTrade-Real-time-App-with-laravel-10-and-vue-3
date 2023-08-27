<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('sellandpurchases', function (Blueprint $table) {
            $table->id();
            $table->integer('adv_type')->default(0);
            $table->text('company_name');
            $table->bigInteger('number_of_shares')->default(0);
            $table->bigInteger('cost_per_share')->default(0);
            $table->string('name');
            $table->string('email');
            $table->string('mobile');
            $table->string('stock_code');
            $table->longText('description');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sellandpurchases');
    }
};
