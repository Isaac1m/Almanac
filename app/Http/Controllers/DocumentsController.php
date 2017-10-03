<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Document;

use App\Department;

use Session;

use Validator;


class DocumentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
       return view('docs.index');
    }

    /**
     * Show the form for adding a new document.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $departments = Department::all();
        
        return view('docs.create')->withDepartments($departments);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       

        $validator = Validator::make($request->all(), array(
            'title' => 'required | max:255',
            'abstract' => 'required | min:5',
            'doc' => 'required',
            'author' => 'required', 
            'department_id' => 'required' ));

            if ($validator->fails()) {
                return redirect('document/create')
                            ->withErrors($validator)
                            ->withInput();
            }
    
            $name = $request->title;
            $path = $request->file('doc')->storeAs('docs', $name);

            $doc = new Document;
            $doc->title = $request->title;
            $doc->abstract = $request->abstract;
            $doc->department_id = $request->department_id;
            $doc->path = $path;
            $doc->author = $request->author;
            $doc->save();
            //redirect to another page
            Session::flash('success', 'Document '.$doc->title.' added successfully');
            return redirect()->route('documents.show', $doc->id);

        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $document = Document::find($id);

        return view('docs.show')->withDocument($document);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
