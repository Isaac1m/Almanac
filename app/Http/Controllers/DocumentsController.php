<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Document;

use App\Department;

use Storage;

use Session;

use File;

use Validator;


class DocumentsController extends Controller
{
    /**
     * Display a listing of all documents.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $departments = Department::all();
        $documents = Document::paginate(6);

       return view('docs.index')->withDocuments($documents)->withDepartments($departments);
    }

    /**
    *Display a listing of the latest documents
    *
    *@return \Illuminate\Http\Response
    */

    public function latest(){
        
        $documents = Document::orderBy('id','DESC')->simplePaginate(6);


        return view('docs.latest')->withDocuments($documents);
    }

    public function most_read(){
        
        $documents = Document::orderBy('views','DESC')->paginate(6);


        return view('docs.most_read')->withDocuments($documents);
    }

    /**
     * Show the form for adding a new document.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()

    {
    
        $years = range(2000,(int)date('Y'));
        
        $departments = Department::all();
        
        return view('docs.create')
                ->withYears($years)
                ->withDepartments($departments);
    }

    /**
     * Store a newly created document in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $messages = [
        'title.required' => 'Specify the title of the document',
        'doc.required' => 'Please attach a pdf document',
        'author.required' => 'Please specify who authored the document',
        'abstract.required' => 'Provide an abstract for the document',
        'date.required' => 'Please specify when the document was authored',
        'doc.mimes' => 'Make sure you have specified a PDF document',
        'department_id.required' => 'Specify the department to which the document belongs'
       ];

        $validator = Validator::make($request->all(), array(
            'title' => 'required | max:255',
            'abstract' => 'required | min:5',
            'doc' => 'required | mimes:pdf',
            'author' => 'required', 
            //'year' => 'required',
            'department_id' => 'required' ), $messages);

            if ($validator->fails()) {
                return redirect('document/create')
                            ->withErrors($validator)
                            ->withInput();
            }
    
            
            $extension = $request->file('doc')->getClientOriginalExtension();
            $name = $request->title.".".$extension;
            $path = $request->file('doc')->move('public/Documents', $name);

            $doc = new Document;
            $doc->title = $request->title;
            $doc->abstract = $request->abstract;
            $doc->department_id = $request->department_id;
            $doc->path = $path;
            $doc->author = $request->author;
            $doc->year = $request->year;
            $doc->save();
            
            Session::flash('success', 'Document '.$doc->title.' added successfully');
            return redirect()->route('documents.show', $doc->id);

        
    }

    /**
     * Display the specified document.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $document = Document::find($id);

        $document->views += 1;

        $document->save();

        $path = Storage::url($document->path); 

       

        return view('docs.show')->withDocument($document)->withPath($path);
    }

    /**
     * Show the form for editing the specified document.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     public function edit($id)
     {
         //retrieve the department data from the db
        
        $document = Document::find($id);
       
        $departments = Department::all();

        if(strlen($document->title) > 50 )
        {
            $currentPath = substr($document->title, 0,50)."...pdf";
        } else{
            $currentPath = substr($document->title, 0,50).".pdf";
        }
             
        
            

        $current_department = $document->department_id;

        $currentYear = $document->year;

        $years = range(2000,(int)date('Y'));
         
         return view('docs.edit')
                ->withDocument($document)
                ->withDepartments($departments)
                ->withCurrentPath($currentPath)
                ->withYears($years)
                ->withCurrentYear($currentYear)
                ->withCurrent($current_department);
     }
 
     public function update(Request $request, $id)
     {
 
        $document = Document::find($id);
         var_dump($request->doc);
        $messages = [
            'title.required' => 'Specify the title of the document',
            'author.required' => 'Please specify who authored the document',
            'abstract.required' => 'Provide an abstract for the document',
            'doc.mimes' => 'Make sure you have specified a PDF document',
            'date.required' => 'Please specify when the document was authored',
            'department_id.required' => 'Specify the department to which the document belongs'
           ];
    if( $request->hasFile('doc'))
        {

        $validator = Validator::make($request->all(), array(
            'title' => 'required | max:255',
            'abstract' => 'required | min:100',
            'doc' => 'mimes:pdf',
            'author' => 'required',
            'year' => 'required', 
            'department_id' => 'required' ), $messages);
        }

        else
        {
            $validator = Validator::make($request->all(), array(
                'title' => 'required | max:255',
                'abstract' => 'required | min:100',
                'author' => 'required',
                'year' => 'required', 
                'department_id' => 'required' ), $messages);
        }


            if ($validator->fails()) {
                return redirect()->route('documents.edit', $document->id)
                            ->withErrors($validator)
                            ->withInput();
            }
    if( $request->hasFile('doc')) 
    {

        File::delete("public/documents/".$document->title.".pdf");

        //$old_file = 'public/documents/'.$document->title.".pdf"; //get old file from storage

        //unlink($old_file);


        $timestamp = str_replace([' ', ':'], '-', Carbon::now()->toDateTimeString()); 

        $extension = $request->file('doc')->getClientOriginalExtension();
        $name = $timestamp."-".$request->title.'.'.$extension;
        $path = $request->file('doc')->move("public/documents/".$name);;

        

        $document->title = $request->title;
        $document->abstract = $request->abstract;
        $document->department_id = $request->department_id;
        $document->path = $path;
        $document->year = $request->year;
        $document->author = $request->author;

        //Storage::move($document->path, "public/documents/".$path);

        $document->save();
    }
    else
    {
        
        $document->title = $request->title;
        $document->abstract = $request->abstract;
        $document->department_id = $request->department_id;
        $document->year = $request->year;
        $document->author = $request->author;
        $document->save();

    }
            
            
            
            Session::flash('success', 'Document <i>'.$document->title.'</i> updated successfully');
            return redirect()->route('documents.show', $document->id);
            
         }
 
         public function destroy($id)
         {
            $document = Document::find($id);
             $document->delete();
     
             Session::flash('success','Deleted successfully');
             return redirect()->route('documents.index');
         }
   
}
