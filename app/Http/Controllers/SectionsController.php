<?php

namespace App\Http\Controllers;

use App\sections;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SectionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $sections = sections::all();
        return view('sections.sections', compact('sections'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $validatedData = $request->validate([
            'section_name' => 'required|unique:sections|max:255',
        ],[

            'section_name.required' =>'! Please Enter a name ',
            'section_name.unique' =>'! Name Already Exists ',

        
        ]);
        
            sections::create([
                'section_name' => $request->section_name,
                'description' => $request->description,
                'Created_by' => (Auth::user()->name),

            ]);
            session()->flash('Add', 'Department has been Added Succefuly ');
            return redirect('/sections');
        
        }
        
        /**
     * Display the specified resource.
     *
     * @param  \App\sections  $sections
     * @return \Illuminate\Http\Response
     */
    public function show(sections $sections)
    {
        //
    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\sections  $sections
     * @return \Illuminate\Http\Response
     */
    public function edit(sections $sections)
    {
        //
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\sections  $sections
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //
        $id = $request->id;

        $this->validate($request, [

            'section_name' => 'required|max:255|unique:sections,section_name,'.$id,
            'description' => 'required',
        ],[

            'section_name.required' =>'Enter departement Name',
            'section_name.unique' =>'! Departement Name Already Exists',
            'description.required' =>'Enter a Description',

        ]);

        $sections = sections::find($id);
        $sections->update([
            'section_name' => $request->section_name,
            'description' => $request->description,
        ]);

        session()->flash('edit','Departement Edited Succesfuly');
        return redirect('/sections');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\sections  $sections
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        //
        $id = $request->id;
        sections::find($id)->delete();
        session()->flash('delete','Departement Deleted Succesfuly');
        return redirect('/sections');
    }
}














// ### Store Data 1st Method ###
//     $input = $request->all();

//     // Cecking for the department name
//     $b_exists = sections::where('section_name','=',$input['section_name'])->exists();

//     if($b_exists) {
//         session()->flash('Error', 'Already Exists');
//         return redirect('/sections');
//     } 
//     else {
//         sections::create([
//             'section_name' => $request->section_name,
//             'description' => $request->description,
//             'Created_by' => (Auth::user()->name)

//         ]);
//         session()->flash('Add', 'Department has been Added Succefuly ');
//         return redirect('/sections');
//     }
// }
