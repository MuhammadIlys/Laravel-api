<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blogs;
use PHPUnit\Framework\MockObject\Stub\ReturnArgument;
use Illuminate\Support\Facades\Validator;

class myBlogs extends Controller
{
    public function list($id = null)
    {
        return $id ? Blogs::find($id) : Blogs::all();
        // $result = Blogs::where('id', $id)->exists();
        // if($result){
        //     return Blogs::find($id);
        // }
        // else{
        //     return Blogs::all();

        // }
    }

    public function store_blog(Request $request)
    {
        $blog = new Blogs;
        $blog->blog_name = $request->blog_name;
        $blog->blog_description = $request->blog_description;


        

        ///////// To check if data exist

        $data_exist = Blogs::where('blog_name', $request->blog_name)->exists();
        if ($data_exist) {
            return [
                'Result'=>'Data already exist',
                
            ];
        } else {
            $result = $blog->save();
        if ($result) {
            return ['Result'=>'data has been saved successfully',
            'id'=>$blog->id];
        } else {
            return ['Result'=>'data has not been saved successfully'];

        }
        }
    }

    public function update_blog(Request $request){
        $blog=Blogs::find($request->id);
        $blog->id = $request->id;
        $blog->blog_name = $request->blog_name;
        $blog->blog_description = $request->blog_description;
        $result = $blog->save();
        if($result){
            return ["Result"=>"Data updated successfully"];
        }
        else{
            return ["Result"=>"Data Did not updated successfully"];

        }
    }

    public function search($name){
        return Blogs::where('blog_name','like','%'.$name.'%')->get();
    }

     public function delete($id)
    {
        $blog = Blogs::find($id);
        if($blog){

            $result = $blog->delete();
            if($result){
                return ['Result'=>'Redcord has been deleted '.$id];
            }else{
                return ['Result'=>'Redcord has not been deleted '.$id];
                
            }

        }
        else{
            return ['Result'=>'No User Found of id: '.$id];

        }
        

    }

     public function test(Request $request)
    {
        $rules = array(
            'id'=>'required|min:2|max:4'
        );

        $validator = Validator::make($request->all(),$rules);
        if($validator->fails()){
            return $validator->errors();
        }
        else{
            return "no errors";
        }
    }
}
