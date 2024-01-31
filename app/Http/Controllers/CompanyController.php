<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Http\Requests\StoreCompanyRequest;
use App\Http\Requests\UpdateCompanyRequest;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $companies = Company::get();
        return view('companies.show', compact('companies'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('companies.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255|string',
            'email' => 'required|max:255|string',
            'location' => 'required|max:255|string',
        ]);
        Company::create([
            'name' => $request->name,
            'email' => $request->email,
            'location' => $request->location,
        ]);
        return redirect('companies/create')->with('status', 'Company Inserted Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Company $company)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(int $id)
    {
        $company = Company::findOrFail($id);
        return view('companies.edit', compact('company'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, int $id)
    {
        $request->validate([
            'name' => 'required|max:255|string',
            'email' => 'required|max:255|string',
            'location' => 'required|max:255|string',
        ]);
        Company::findOrFail($id)->update([
            'name' => $request->name,
            'email' => $request->email,
            'location' => $request->location,
        ]);
        return redirect()->back()->with('status', 'Company updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Company $company)
    {
        //
    }
}