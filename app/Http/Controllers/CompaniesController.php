<?php

namespace App\Http\Controllers;

use App\Models\Companies;
use Illuminate\Http\Request;

class CompaniesController extends Controller
{
    public function index()
    {
        try {
            $companies = Companies::all();
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

    public function show(Companies $Companies)
    {
            return view('companies.show', compact('Companies'));
        
    }

    public function edit(Companies $Companies)
    {
 
            return view('companies.edit', compact('Companies'));
    }

    public function update(Request $request, Companies $Companies)
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

            $Companies->update($validated);
            return redirect()->route('companies.index')->with('success', 'Company information updated successfully!');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => 'Failed to update company information: ' . $e->getMessage()]);
        }
    }

    public function destroy(Companies $Companies)
    {
        try {
            $Companies->delete();
            return redirect()->route('companies.index')->with('success', 'Company deleted successfully!');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => 'Failed to delete company: ' . $e->getMessage()]);
        }
    }
}
