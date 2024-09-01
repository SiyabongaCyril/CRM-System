<?php

namespace App\Http\Controllers;

use App\Models\Companies;
use Illuminate\Http\Request;

class CompaniesController extends Controller
{
    public function index()
    {
        try {
            //Paginate (10) companies
            $companies = Companies::paginate(10);
            if ($companies->isEmpty()) {
                return view('companies.index', ['error' => 'No companies found in the system']);
            }
            return view('companies.index', compact('companies'));
        } catch (\Exception $e) {
            return view('companies.index', ['error' => 'An error occurred while retrieving companies: ' . $e->getMessage()]);
        }
    }

    public function create()
    {
        return view('companies.create');
    }

    public function store(Request $request)
    {
        try {
            $validated = $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'nullable|email|max:255',
                'logo' => 'nullable|image|dimensions:min_width=100,min_height=100',
                'website' => 'nullable|url|max:255',
            ]);

            if ($request->hasFile('logo')) {
                $validated['logo'] = $request->file('logo')->store('logos', 'public');
            }

            Companies::create($validated);
            return redirect()->route('companies.index')->with('success', 'Companies created successfully!');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => 'An error occurred while creating the company: ' . $e->getMessage()]);
        }
    }

    public function show($id)
    {
        try{
            $company = Companies::find($id);
            if(!$company) {
                return redirect()->route('companies.index')->with('error', 'Company not found');
            }
            return view('companies.show', compact('company'));
        } catch (\Exception $e) {
            return redirect()->route('companies.index')->with('error', 'An error occurred while fetching company: ' . $e->getMessage());
        }
        
    }

    public function edit($id)
    {
        try{
            $company = Companies::find($id);
            if(!$company) {
                return redirect()->route('companies.index')->with('error', 'Company not found');
            }
            return view('companies.edit', compact('company'));
    }
        catch (\Exception $e) {
            return redirect()->route('companies.index')->with('error', 'An error occurred while fetching company: ' . $e->getMessage());
        }
    }
            
    public function update(Request $request, $id)
{
    try {
        $company = Companies::findOrFail($id);

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'nullable|email|max:255',
            'logo' => 'nullable|image|dimensions:min_width=100,min_height=100',
            'website' => 'nullable|url|max:255',
            'description' => 'nullable|string', // add this line to validate the description field
        ]);

        if ($request->hasFile('logo')) {
            $validated['logo'] = $request->file('logo')->store('logos', 'public');
        }

        $company->update($validated);
        return redirect()->route('companies.index')->with('success', 'Company information updated successfully!');
    } catch (\Exception $e) {
        return redirect()->back()->withErrors(['error' => 'Failed to update company information: ' . $e->getMessage()]);
    }
}
    public function destroy($id)
    {
        try {
            $Companies = Companies::findOrFail($id)->delete();
            return redirect()->route('companies.index')->with('success', 'Company deleted successfully!');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => 'Failed to delete company: ' . $e->getMessage()]);
        }
    }
}
