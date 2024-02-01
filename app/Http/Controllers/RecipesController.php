<?php

namespace App\Http\Controllers;

use App\Models\Recipes;
use Illuminate\Support\str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class RecipesController extends Controller
{
    /**
     * Display a listing of the resource.
     */


     public function search(Request $request)
     {


        $keyword = $request->input('keyword');     
        
        $posts = Recipes::where('title', 'like', '%' . $keyword . '%')
             ->orWhere('content', 'like', '%' . $keyword . '%')
             ->get();
 
         return view('search', compact('posts'));
     }



    public function index()
    {
        $userid = auth::id();
        $resp = Recipes::where('user_id',$userid)->latest('updated_at')->paginate(5);
     
        return view('resp.index')->with('resp',$resp);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        return view('resp.create');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
           
        ]);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->move(public_path('images'), $imageName); 
        }

        $recipe = new Recipes();
        $recipe->uuid = str::uuid();
        $recipe->user_id = auth()->id();
        $recipe->title = $request->title;
        $recipe->content = $request->content;
        $recipe->image = 'images/' . $imageName; // Save the image path relative to public directory
        $recipe->save();


        return to_route('note.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

        $recp = Recipes::where('id',$id)->where('user_id',auth::id())->firstOrFail();
        return view('resp.show')->with('recp',$recp);

    }
  
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {

        $recp = Recipes::where('id',$id)->where('user_id',auth::id())->firstOrFail();
        return view('resp.edit')->with('recp',$recp);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $recp = Recipes::where('id',$id)->where('user_id',auth::id())->firstOrFail();

        $request->validate([
            'title' => 'required',
            'content' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);


        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->move(public_path('images'), $imageName); 
        }

        $recp->update([

            'title' => $request->title,
            'image' => $image = 'images/' . $imageName,
            'content' => $request->content
        ]);

        return to_route('note.show',$recp);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $recp = Recipes::where('id',$id)->where('user_id',auth::id())->firstOrFail();

        $recp->delete();

        return to_route('note.index');
    }


    public function show_home()
    {

        // $resp = Recipes::all();
        // $res = Recipes::get();
        $resp = DB::table('recipes')->latest('updated_at')->get();

        return view('welcome')->with('resp',$resp);

    }


    
    public function display( $id)
    {
    
        $recp = Recipes::find($id);
        return view('resp.recipePage')->with('recp',$recp);

    }
}
