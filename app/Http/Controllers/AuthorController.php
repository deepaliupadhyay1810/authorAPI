<?php

namespace App\Http\Controllers;

use App\Author;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    /*public function create(Request $request){
    	$author = Author::create($request->all);
    	return response()->json($author, 201);
    }*/

    /*Show data*/
    public function show()
    {
    	$author = Author::all();
        return response()->json($author);
    }

    /*Create Data*/
	public function create(Request $request)
    {
    	if(!empty($request->all())){
    		$author = Author::create($request->all());
    		return response()->json($author, 201);	
    	}else{
    		return response('Something went wrong!');
    	}
        
    }

    /*Update Data*/
  	public function update($id, Request $request)
    {	
    	$author = Author::findOrFail($id);
    	$author->update($request->all());
 
    	return response()->json($author, 200);   	
    }

    /*Show single data*/
    public function showone($id)
    {
        //$author = Author::findOrFail($id); //This will show own message if data not founded
        $author = Author::find($id); //This statement will allow to show custom message
        if($author){
        	return response()->json($author, 200);
        }else{
        	return response('Sorry the data you are looking for is not available');
        }

    }

    /*Delete Data*/
    public function delete($id){
    	Author::findOrFail($id)->delete();
    	return response('Deleted Sucessfully');
    }

    /*public function update($id, Request $request)
    {
        $author = Author::findOrFail($id);

echo 'shonna';
        echo '<pre>';
        print_r($request->all());
        echo '</pre>';

        $author->update($request->all());
        //return response()->json($author, 200);
    }*/

}
