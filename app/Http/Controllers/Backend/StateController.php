<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\StateStoreRequest;
use App\Http\Requests\StateUpdateRequest;
use App\Models\Country;
use App\Models\State;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $states = State::paginate(5);


        if($request->has('search')){
            $sample = State::where('name', 'like', "%{$request->search}%")->get();

            $states = $sample->paginate(5);

            /* $states = DB::table('states')
                ->select('*')
                ->join('countries', 'states.country_id', '=', 'countries.id')
                ->where('countries.country_code', 'like', "%{$request->search}%")
                ->orWhere('name', 'like', "%{$request->search}%")
                ->get();

            $states = DB::select('SELECT *
            FROM states
            JOIN countries
            ON states.country_id = countries.id
            WHERE "japan" = countries.name');
 */

        }

        return view('states.index', compact('states'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $countries = Country::all();
        return view('states.create', compact('countries'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StateStoreRequest $request)
    {
        State::create($request->validated());
        return redirect()->route('states.index')->with('message', 'State Created Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(State $state)
    {
        $countries = Country::all();
        return view('states.edit', compact('state', 'countries'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StateUpdateRequest $request, State $state)
    {
        $state->update($request->validated());
        return redirect()->route('states.index')->with('message', 'State Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(State $state)
    {
        $state->delete();
        return redirect()->route('states.index')->with('message', "{$state->name} Deleted Successfully");
    }
}
