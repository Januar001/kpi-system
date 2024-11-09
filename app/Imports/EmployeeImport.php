<?php

namespace App\Imports;

use App\Models\Employee;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class EmployeeImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        // Cari employee berdasarkan NIP
        $employee = Employee::where('nip', $row['nip'])->first();

        if ($employee) {
            // Jika data dengan NIP tersebut sudah ada, lakukan update
            $employee->update([
                'name' => $row['name'],
                'department' => $row['department'],
                'position' => $row['position'],
                'email' => $row['email'],
                'salary' => $row['salary'],
                'hire_date' => $row['hire_date'],
            ]);
            return null; // Return null untuk mencegah penambahan data baru
        } else {
            // Jika data tidak ada, buat data baru
            return new Employee([
                'nip' => $row['nip'],
                'name' => $row['name'],
                'department' => $row['department'],
                'position' => $row['position'],
                'email' => $row['email'],
                'salary' => $row['salary'],
                'hire_date' => $row['hire_date'],
            ]);
        }
    }
}
