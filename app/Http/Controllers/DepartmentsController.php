<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Validator;

use Session;

use App\Department;

use App\Faculty;

use App\Document;

class DepartmentsController extends Controller
{



    public function create()
    {
        $faculties = Faculty::all();

        return view('depts.create')->withFaculties($faculties);
    }

    public function store(Request $request)
    {
        $department = new Department;

        $validator = Validator::make($request->all(), array(
            'name' => 'required | max:255',
            'description' => 'required | min:5',
            'faculty_id' => 'required'
             ));

            if ($validator->fails())
             {
                return redirect()->route('depts.create')
                            ->withErrors($validator)
                            ->withInput();
            }

            $department->name = $request->name;
            $department->description = $request->description;
            $department->faculty_id = $request->faculty_id;
            $department->save();

            Session::flash('success', 'New Department '.  $department->name. ' added successfully to '. $department->faculty->name);
            return redirect()->route('depts.show', $department->id);

    }

    public function show($id)
    {
        $department = Department::find($id);
        $message = "Do documents in this department";
        $documents = Document::where('department_id',$id)->paginate(4);
       

        if(count($documents)>0)
        {
            return view('depts.show')
                        ->withDocuments($documents)
                        ->withDepartment($department);
        }
           
        else
        {
            return view('depts.show')
                    ->withMessage($message)
                    ->withDepartment($department);
        }

    }



    public function edit($id)
    {
        //retrieve the faculty data from the db
        $department = Department::find($id);

        $faculties = Faculty::all();

        $current = $department->faculty_id;
        
        return view('depts.edit')
            ->withDepartment($department)
            ->withFaculties($faculties)
            ->withCurrent($current);
    }

    public function update(Request $request, $id)
    {

        $department = Department::find($id);
       
        
        $validator = Validator::make($request->all(), array(
            'name' => 'required | max:255',
            'description' => 'required | min:5',
            'faculty_id' => 'required'
            
             ));

            if ($validator->fails()) {
                return redirect()->route('depts.edit', $department->id)
                            ->withErrors($validator)
                            ->withInput();
            }
            

            $department->name = $request->input('name');
            $department->description = $request->input('description');
            $department->faculty_id =  $request->input('faculty_id');
            $department->save();

            Session::flash('success', 'Department '.  $department->name. ' updated successfully');
            return redirect()->route('depts.show', $department->id);
      
        }
        public function destroy($id)
        {
            $department = Department::find($id);
            $department->delete();
    
            Session::flash('success','Department deleted successfully');
            return redirect()->route('home');
        }

}
