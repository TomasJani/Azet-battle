<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Company;
use App\Question;

class CompanyController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('employee')->except(['store', 'login', 'create']);
    }

	public function create()
	{
		return view('companies.create');
	}

    public function store(Request $request)
    {
    	$this->validate(request(), [
            'name' => 'required|min:3'
        ]);

        $company = new Company;

        $company->user_id = auth()->user()->id;
        $company->name = request('name');
        $company->unique_key = substr(str_shuffle(str_repeat($x='0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ', ceil(15/strlen($x)))), 1, 15);
        $company->save();

        $user = auth()->user();
        $user->company_id = $company->id;
        $user->save();

        return redirect()->back();
    }

    public function login()
    {
        $company = Company::where('name', '=', request('name'))->first();

        if ($company and ($company->unique_key = request('unique_key'))) {
            $user = auth()->user();
            $user->company_id = $company->id;
            $user->save();
        }

        return redirect()->home();
    }

    public function show($company)
    {
        $company = Company::find($company);
        $questions = Question::where('company_id', '=', $company->id)->get();

        return view('companies.show', compact('questions'));
    }

    public function edit()
    {
        return view();
    }

    public function update($company)
    {
    	$this->validate(request(), [
            'name' => 'required|min:3'
        ]);

        $company = Company::find($company);
        $company->name = request("body");
        $company->save();

        return redirect()->back();
    }

}
