<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Blog;


class BlogController extends Controller
{
    /*
        Return all blogs
    */
    public function index(){

    }

    /*
        Return single blogs
    */
    public function show(){

    }

    /*
        Store a blog
    */
    public function store(Request $request){
        $validator = Validator::make($request->all(), [
            'title' => 'required|min:10',
            'author' => 'required|min:3'
        ]);

        if ($validator->fails()){
            return response()->json([
                'status' => 'false',
                'message' => "There are errors",
                'errors' => $validator->errors()
            ]);
        }

        $blog = new Blog();
        $blog->title = $request->title;
        $blog->author = $request->author;
        $blog->description = $request->description;
        $blog->shortDesc = $request->shortDesc;
        $blog->save();

        return response()->json([
            'status' => 'true',
            'message' => "Blog added successfully",
            'errors' => $blog
        ]);
        
    }

    /*
        Update a blog
    */
    public function update(){

    }

    /*
        Delete a blog
    */
    public function delete(){

    }


}
