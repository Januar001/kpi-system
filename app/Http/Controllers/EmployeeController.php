<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;
use App\Imports\EmployeeImport;
use Maatwebsite\Excel\Facades\Excel;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $employee = Employee::paginate(10);
        return view('employees.index', compact('employee'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('employees.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nip' => 'required|unique:employees,nip',
            'name' => 'required|string|max:255',
            'department' => 'required|string|max:255',
            'position' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'salary' => 'required|numeric|min:0',
            'hire_date' => 'required|date',
        ]);

        // Store the data in the database
        Employee::create([
            'nip' => $validatedData['nip'],
            'name' => $validatedData['name'],
            'department' => $validatedData['department'],
            'position' => $validatedData['position'],
            'email'=>$validatedData['email'],
            'salary' => $validatedData['salary'],
            'hire_date' => $validatedData['hire_date'],
        ]);

        // Redirect to the employees list with a success message
        return redirect()->route('employees.index')->with('success', 'Employee created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Employee $employee)
    {
        // Menampilkan detail data karyawan
        return view('employees.show', compact('employee'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Employee $employee)
    {
        // Mengembalikan view edit dengan data karyawan
        return view('employees.edit', ['employee' => $employee]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Employee $employee)
    {
        $validatedData = $request->validate([
            'nip' => 'required|unique:employees,nip,' . $employee->id,
            'name' => 'required|string|max:255',
            'department' => 'required|string|max:255',
            'position' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'salary' => 'required|numeric|min:0',
            'hire_date' => 'required|date',
        ]);

        // Update data karyawan di database
        $employee->update($validatedData);

        // Redirect ke halaman daftar karyawan dengan pesan sukses
        return redirect()->route('employees.index')->with('success', 'Employee updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Employee $employee)
    {
            // Menghapus data employee yang ditemukan
        $employee->delete();

        // Redirect to the employees list with a success message
        return redirect()->route('employees.index')->with('success', 'Employee deleted successfully.');
    }

    public function import(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:csv,xlsx,xls',
        ]);

        Excel::import(new EmployeeImport, $request->file('file'));

        return redirect()->route('employees.index')->with('success', 'Data berhasil diimpor.');
    }

}
