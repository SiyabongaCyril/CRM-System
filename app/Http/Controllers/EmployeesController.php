<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employees;
use App\Models\Companies;

class EmployeesController extends Controller
{
    public function index()
    {
        try{
             // Get employees along with their company information
            $employees = Employees::with('company')->get();
            if($employees->isEmpty()) {
                return redirect()->route('employees.index')->with('error', 'No employees found. There are no employees in the system.');
            }
            return view('employees.index', compact('employees'));
        } catch (\Exception $e) {
            return redirect()->route('employees.index')->with('error', 'Unable to fetch employees.');

        }
    }
       
    public function create()
    {
        try{
            // An employee shoulf be associated with a certain company, hence we need to fetch all companies
            $companies = Companies::all();

            if($companies->isEmpty()) {
                return redirect()->route('employees.index')->with('error', 'No companies found. There are no companies in the system to add employee to.');
            }

            return view('employees.create', compact('companies'));

        } catch (\Exception $e) {
            return redirect()->route('employees.index')->with('error', 'Unable to fetch companies to add employee to.');
        }
        
    
       
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'company_id' => 'required|exists:companies,id',
            'email' => 'nullable|email|max:255',
            'phone' => 'nullable|string|max:255',
        ]);

        try{
            Employees::create($validated);

            return redirect()->route('employees.index')->with('success', 'Employee created successfully');

        } catch ( \Exception $e) {

            return redirect()->route('employees.index')->with('error', 'Unable to create employee.');
        }

       
    }

    public function show(Employees $employee)
    {
        return view('employees.show', compact('employee'));
    }

    public function edit(Employees $employee)
    {
        try {
            $companies = Companies::all();

            if($companies->isEmpty()) {
                return redirect()->route('employees.index')->with('error', 'No companies found. There are no companies in the system.');
            }
        } catch (\Exception $e) {
            return redirect()->route('employees.index')->with('error', 'Unable to fetch companies.');
        }
    
        return view('employees.edit', compact('employee', 'companies'));
    }

    public function update(Request $request, Employees $employee)
    {
        $validated = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'company_id' => 'required|exists:companies,id',
            'email' => 'nullable|email|max:255',
            'phone' => 'nullable|string|max:255',
        ]);

        try {
            $employee->update($validated);

            return redirect()->route('employees.index')->with('success', 'Employee updated successfully.');
        } catch (\Exception $e) {
            return redirect()->route('employees.index')->with('error', 'Failed to update employee: ' . $e->getMessage());
        }

    }

    public function destroy(Employees $employee)
    {
        try {
            $employee->delete();
            
            return redirect()->route('employees.index')->with('success', 'Employee deleted successfully.');
        } catch (\Exception $e) {
            return redirect()->route('employees.index')->with('error', 'Failed to delete the employee: ' . $e->getMessage());
        }
    }
}
