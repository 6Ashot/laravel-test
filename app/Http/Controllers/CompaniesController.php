<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Company;
use App\Http\Requests\CreateCompanieRequest;
use Session;
use Illuminate\Support\Facades\File;

class CompaniesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $companies = Company::paginate(10);
        return view('company.Index')->with(compact('companies'));;
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('company.Create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateCompanieRequest $request)
    {
        $fileName = '';
        if ($request->file('logo')) {
            $fileName = $request->file('logo')->store('/public');
            $fileName = str_replace('public', 'storage', $fileName);
        }
        Company::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'logo' => $fileName,
            'website' => $request['website']
        ]);
        Session::flash('message', 'Company was created!'); 
        // return redirect()->back()->with('message', 'Company was created!');
        return redirect('companies');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $company = Company::find($id);
        return view('company.Edit')->with(compact('company'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CreateCompanieRequest $request, $id)
    {
        $company = Company::find($id);
        $company->name = $request->input('name');
        $company->email = $request->input('email');
        $company->website = $request->input('website');
        if ($request->logo) {
            if ($company->logo != '') {
                unlink(storage_path('app/public/'.str_replace('storage/', '', $company->logo)));
            }
            $fileName = $request->file('logo')->store('/public');
            $fileName = str_replace('public', 'storage', $fileName);
            $company->logo = $fileName;
            
        }
        $company->save();
        Session::flash('message', 'Company '.$company->name.' was updated!'); 
        return redirect('companies');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $company = Company::find($id);
        if ($company->logo != '') {
            unlink(storage_path('app/public/'.str_replace('storage/', '', $company->logo)));
        }
        $company->delete();
        Session::flash('message', 'Company '.$company->name.' was deleted!'); 
        return redirect()->back();
    }
}
