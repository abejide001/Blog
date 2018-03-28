<?php

namespace App\Http\Controllers;

use App\Tag;
use Illuminate\Http\Request;
use App\Category;
use App\Post;
use Session;
use Auth;
class PostsController extends Controller
{
    /**->paginate(3)
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $posts = Post::latest()->get();

        return view('admin.posts.index')->with('posts', $posts);
//        $posts->dump();
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
                $tags=Tag::all();
            $categories=Category::all();

            if($categories->count()===0){

                Session::flash('info', 'you must have a category');
                return redirect()->back();

            }
        if($tags->count()===0){

            Session::flash('info', 'you must have tag');
            return redirect()->back();

        }
        return view('admin.posts.create')->with('categories',$categories)->with('tags', $tags);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request->all());
        $this->validate($request,[
            'title'=>'required',
            'featured'=>'image',
            'content'=>'required',
            'category_id'=>'required',
            'tags'=>'required'
        ]);
        //get the request
        $featured=$request->featured;

        //give a new name to the image
        $featured_new_name=time().$featured->getClientOriginalName();
        //move the file i.e store
        $uploaded=$featured->move('uploads/posts', $featured_new_name);




        $post=new Post;

        $post->title=$request->input('title');
        $post->content=$request->input('content');
        $post->category_id=$request->input('category_id');
        $post->featured=$uploaded;
        $post->slug=str_slug($request->input('title'));

        $post->user_id=Auth::id();
        $post->save();

        $post->tags()->attach($request->tags);
        Session::flash('success', 'Post created');
        return redirect('/admin/post');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $posts=Post::find($id);
        $categories=Category::all();
        $tags=Tag::all();
        return view('admin.posts.edit')->with('posts',$posts )->with('categories', $categories)->with('tags', $tags);

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
        $this->validate($request,[
            'title'=>'required',
           'featured'=>'image',
            'content'=>'required',
            'category_id'=>'required'
        ]);

        $post=Post::find($id);
        if($request->hasFile('featured')){
            $featured=$request->featured;
            $featured_new_name=time().$featured->getClientOriginalName();
          $uploaded= $featured->move('uploads/posts', $featured_new_name);
            $post->featured=$uploaded;
        }
        $post->title=$request->input('title');
        $post->content=$request->input('content');
        $post->category_id=$request->input('category_id');



        $post->save();
        $post->tags()->sync($request->tags);
        return redirect('admin/post');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post=Post::find($id);
        $post->delete();

        return redirect()->back();
    }
    public function trashed(){
        $posts=Post::onlyTrashed()->get();

        return view('admin.posts.trashed')->with('posts', $posts);
    }
    public function kill($id){
        $post=Post::withTrashed()->where('id', $id)->first();
            $post->forceDelete();
        return redirect()->back();
    }
    public function restore($id){
        $post=Post::withTrashed()->find($id);
        $post->restore();

        return redirect()->back();

    }
}
