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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // varchar // char
            $table->decimal('price', 8, 2); // 	decimal // double
            $table->integer('stock'); // int // int4
            $table->boolean('active')->default(true); // al momentrar un registro, el valor por defecto es true
            $table->string('image', 500)->nullable();
            $table->text('description')->nullable();
            $table->timestamps(); // created_at, updated_at
            $table->softDeletes(); // deleted_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('table_products');
    }
};
