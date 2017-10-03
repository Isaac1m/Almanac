<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Session;

use Validator;

use App\Faculty;

class FacultiesController extends Controller
{

    public function index()
    {
        $faculties = Faculty::all();
        return view('faculties.index')->withFaculties($faculties);

    }

    public function create()
    {
        return view('faculties.create');
    }

    public function store(Request $request)
    {
        $faculty = new Faculty;

        $validator = Validator::make($request->all(), array(
            'name' => 'required | max:255',
            'description' => 'required | min:5'
             ));

            if ($validator->fails()) {
                return redirect("{{ route('faculties.create') }}")
                            ->withErrors($validator)
                            ->withInput();
            }

            $faculty->name = $request->name;
            $faculty->description = $request->description;
            $faculty->save();

            Session::flash('success', 'New Faculty '.  $faculty->name. ' added successfully');
            return redirect()->route('faculties.show', $faculty->id);

    }

    public function show($id)
    {
        $faculty = Faculty::find($id);

        return view('faculties.show')->withFaculty($faculty);
    }

    public function edit($id)
    {
        //retrieve the faculty data from the db
        $faculty = Faculty::find($id);

        
        return view('faculties.edit')->withFaculty($faculty);
    }

    public function update(Request $request, $id)
    {

        $faculty = Faculty::find($id);
        
        $validator = Validator::make($request->all(), array(
            'name' => 'required | max:255',
            'description' => 'required | min:5'
             ));

            if ($validator->fails()) {
                return redirect("{{ route('faculties.edit') }}")
                            ->withErrors($validator)
                            ->withInput();
            }
            

            $faculty->name = $request->input('name');
            $faculty->description = $request->input('description');
            $faculty->save();

            Session::flash('success', 'Faculty '.  $faculty->name. ' updated successfully');
            return redirect()->route('faculties.show', $faculty->id);
      
        }

        public function destroy($id)
        {
            $faculty = Faculty::find($id);
            $faculty->delete();
    
            Session::flash('success','Deleted successfully');
            return redirect()->route('home');
        }

}
