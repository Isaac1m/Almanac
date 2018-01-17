<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

use App\Document;

class SearchController extends Controller
{
  public function search()
  {
        $query = Input::get('query');

        $results =  Document::where('title', 'LIKE', '%'.$query. '%')
                        ->orWhere('author', 'LIKE', '%'.$query. '%')
                        ->orWhere('abstract', 'LIKE', '%'.$query. '%')
                        ->get();
        if(count($results)>0)
        {
            return view('docs.search_results')
                        ->withResults($results)
                        ->withQuery($query);
        }
            
        else
        {
            return view('docs.search_results')
                        ->withMessage('No documents found. Try searching again');
        }
            
  }
}
