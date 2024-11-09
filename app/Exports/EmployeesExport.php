<?php

namespace App\Exports;

use App\Models\Employee;
use Maatwebsite\Excel\Concerns\FromCollection;

class EmployeesExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Employee::all();
    }

    /**
     * Menentukan judul kolom di file Excel atau CSV.
     *
     * @return array
     */
    public function headings(): array
    {
        return [
            'NIP',
            'Nama',
            'Departemen',
            'Posisi',
            'Email',
            'Gaji',
            'Tanggal Rekrutmen',
        ];
    }
}
