<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\CountryStoreRequest;
use App\Http\Requests\CountryUpdateRequest;
use App\Models\Country;
use Illuminate\Http\Request;

class CountryCountroller extends Controller
{
    public function index(Request $request)
    {
    $countries = Country::all();
        if($request->has('search')){
            $countries = Country::where('name', 'like', "%{$request->search}%")->orWhere('country_code', 'like', "%{$request->search}%")->get();
        }

       return view('countries.index', compact('countries'));
    }

    public function create()
    {
        return view('countries.create');
    }

    public function store(CountryStoreRequest $request)
    {
        # code...
        Country::create($request->validated());
        return redirect()->route('countries.index')->with('message','Country Registered Successfully!');
    }

    public function show()
    {
        # code...
    }

    public function edit(Country $country)
    {
        # code...
        return view('countries.edit', compact('country'));
    }

    public function update(CountryUpdateRequest $request, Country $country)
    {
        # code...
        /* $country->update([
            'country_code' => $request->country_code,
            'name' => $request->name,
        ]); */

        $country->update($request->validated());

        return redirect()->route('countries.index')->with('message', 'Country Updated Successfully');

    }

    public function destroy(Country $country)
    {
        $country->delete();
        return redirect()->route('countries.index')->with('message', "{$country->name} Deleted Successfully");
    }
}
