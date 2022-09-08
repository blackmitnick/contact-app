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
    public function up(): void
    {
        Schema::create('contacts', function (Blueprint $table) {
            $table->id("contact_id");
            $table->string("first_name");
            $table->string("last_name");
            $table->string("phone")->nullable();
            $table->string("email");
            $table->string("address");
            $table->unsignedBigInteger("company_id");
            $table->foreign('company_id')
                ->references('id')->on('companies')->onDelete('cascade');
//     foreign key
           // $table->foreignId("company_id")->references("id")->on("companies");
            //$table->foreignId("company_id")->constrained()->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists('contacts');
    }
};
