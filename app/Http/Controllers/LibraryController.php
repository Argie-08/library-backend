<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Library;

class LibraryController extends Controller
{
    public function uploadFile(Request $request){

        $field = $request -> validate ([
            "subject" => "required",
            "title" => "required",
            "content" => "required",    
        ]);
        
        $file = Library::create([
            "subject" => $field ["subject"],
            "title" => $field ["title"],
            "content" => $field ["content"]
        ]);

        return response()->json([
            "message"=>"File Saved",
            "data"=>$file],
            201, [], JSON_PRETTY_PRINT
        );   
    }

    public function getFile(Request $request){
        $query = $request->input('key'); 
        $results = Library::where('subject', 'LIKE', "%{$query}%")
                    ->orWhere('title', 'LIKE', "%{$query}%")
                    ->orWhere('content', 'LIKE', "%{$query}%")
                    ->get();

        return response()->json($results);
    }

    public function getFiles(){
        $results = Library::all();
        return response()->json($results);
    }

    public function getFilesReact(){
        $results = Library::where('subject', 'LIKE', "%React%")->get();
        return response()->json($results);
    }
}
