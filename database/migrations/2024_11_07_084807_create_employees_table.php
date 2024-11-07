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
        Schema::create('employees', function (Blueprint $table) {
            $table->bigIncrements('id'); // Primary Key
            $table->string('nip', 20)->unique(); //NIP
            $table->string('name', 255); // Nama karyawan
            $table->string('position', 255); // Jabatan
            $table->string('department', 255); // Departemen
            $table->string('email', 255)->unique(); // Email, harus unik
            $table->decimal('salary', 15, 2); // Gaji pokok
            $table->date('hire_date'); // Tanggal mulai bekerja
            $table->timestamps(); // created_at dan updated_at otomatis
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employees');
    }
};
