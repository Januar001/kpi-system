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
        Schema::create('evaluations', function (Blueprint $table) {
            $table->id(); // Primary key
            $table->unsignedBigInteger('employee_id'); // Foreign key to employees table
            $table->unsignedBigInteger('kpi_indicator_id'); // Foreign key to kpi_indicators table
            $table->float('value'); // Value of the indicator
            $table->unsignedBigInteger('kpi_period_id'); // Foreign key to kpi_periods table
            $table->timestamps(); // Created at and Updated at

            // Foreign Key Constraints
            $table->foreign('employee_id')->references('id')->on('employees')->onDelete('cascade');
            $table->foreign('kpi_indicator_id')->references('id')->on('kpi_indicators')->onDelete('cascade');
            $table->foreign('kpi_period_id')->references('id')->on('kpi_periods')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('evaluations');
    }
};
