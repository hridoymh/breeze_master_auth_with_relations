<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('createpost');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    public function postlist()
    {
        $posts = Post::where('status','aprove')->get();
        return view('posts', compact('posts'));
    }
    public function postlistwithcat(Request $request)
    {
        $cat = $request->query('cat');
        $posts = Post::where('status','aprove')->whereRelation('categories','category_name',$cat)->get();
        return view('posts', compact('posts'));
    }
    

    public function adminlist()
    {
        $posts = Post::withTrashed()->get();
        return view('admin.posts', compact('posts'));
    }

    public function aprove($id){
        $post = Post::find($id);
        $post->status = 'aprove';
        $post->save();
        return redirect('admin/posts');
    }
    public function trash($id){
        $post = Post::find($id);
        $post->delete();
        return redirect('admin/posts');
    }
    public function pdelete($id){
        $post = Post::withTrashed()->find($id);
        $post->categories()->detach();
        $post->forceDelete();
        return redirect('admin/posts');
    }
    
    
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $input = $request->all();
        $cats = str_replace(" ","",$input['cat']);
        $cats = explode(',',$cats);

        $data = [
            'user_id' => $request->user()->id,
            'title'=>$input['title'],
            'description'=>$input['desc'],
            
        ];

        $post = Post::create($data);

        $dbcats = [];

        foreach($cats as $cat){
            $dbcat = Category::firstOrCreate(['category_name'=>$cat]);
            array_push($dbcats,$dbcat->id);
        }

        $post->categories()->sync($dbcats);

        return redirect()->back();

    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        //
    }
}
