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
        Schema::create('istr_amla_forms', function (Blueprint $table) {
            $table->id('form_id'); // bigint identity, primary key
            $table->string('form_type', 100)->nullable();
            $table->string('doc_no', 50)->nullable();
            $table->string('branch_name', 50)->nullable();
            $table->string('trx_no', 255)->nullable();
            $table->string('created_by', 50)->nullable();
            $table->string('status', 20)->nullable();
            $table->dateTime('created_date')->nullable();
            $table->dateTime('updated_date')->nullable();
            $table->text('uuid')->nullable();
            $table->dateTime('sales_date')->nullable();
            $table->text('reviewed_by')->nullable();
            $table->dateTime('reviewed_date')->nullable();
            $table->string('related_form_id', 50)->nullable();
            $table->text('reviewed_comment')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('istr_amla_forms');
    }
};
