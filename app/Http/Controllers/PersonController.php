<?php

namespace App\Http\Controllers;

use App\Person;
use Illuminate\Http\Request;

class PersonController extends Controller
{
    
    private $validationRules = [
        'first_name' => 'required',
        'last_name' => 'required',
        'email' => 'required|email|unique:people',
    ];

    /**
     * Index the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(Person::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, $this->validationRules);
        Person::create($request->only(['first_name', 'last_name', 'email', 'phone']));
        return response()->json(['message' => 'person created'], 201);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Person  $person
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Person $person)
    {
        // Update validation rules to allow same email for this person
        $validationRulesForUpdate = array_merge($this->validationRules, 
                ['email' => 'required|email|unique:people,email,'.$person->id]);

        // dd($validationRulesForUpdate);

        $this->validate($request, $validationRulesForUpdate);
        $person->update($request->only(['first_name', 'last_name', 'email', 'phone']));
        return response()->json(['message' => 'person created'], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Person  $person
     * @return \Illuminate\Http\Response
     */
    public function destroy(Person $person)
    {
        //
    }
}
