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
        Schema::create('photos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('name');
            $table->text('details');
            $table->string('image');
            $table->unsignedBigInteger('approve_by')->nullable();
            $table->date('approve_date')->nullable();
            $table->unsignedBigInteger('boyout_by')->nullable();
            $table->date('buyout_date')->nullable();
            $table->double('rate',2)->nullable();
            $table->enum('status',['pending','approved','declined','selling','buy_out','approve_unsellable'])->default('pending');
            $table->timestamps();

            // manual foreign key setup
            $table->foreign('approve_by')->on('admins')->references('id')->onDelete('cascade');
            $table->foreign('boyout_by')->on('admins')->references('id')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('photos');
    }
};
