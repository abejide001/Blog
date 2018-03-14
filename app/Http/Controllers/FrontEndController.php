<?php

namespace App\Http\Controllers;
use App\Post;
use App\Setting;
use App\Category;
use App\Tag;
use Illuminate\Http\Request;

class FrontEndController extends Controller
{
    public function index(){
        $setting=Setting::first()->site_name;
        $category=Category::limit(4)->get();
        $postOne=Post::orderBy('created_at', 'desc')->first();
        $postTwo=Post::orderBy('created_at', 'desc')->skip(1)->take(1)->get()->first();
        $postThree=Post::orderBy('created_at', 'desc')->skip(2)->take(1)->get()->first();
    $wordpress=Category::find(1);
    $javascript=Category::find(4);
    $php=Category::find(3)
    ;
        return view('index')
            ->with('title',$setting)
            ->with('category', $category)
            ->with('post_one', $postOne)
            ->with('post_two', $postTwo)
            ->with('post_threee', $postThree)
            ->with('wordpress', $wordpress)
            ->with('javascript', $javascript)
            ->with('php', $php)
            ->with('settings', Setting::first());;
    }
  public function single($slug){
        $post=Post::where('slug', $slug)->first();

        $next_id=Post::where('id', '>', $post->id )->min('id');
        $prev_id=Post::where('id', '<', $post->id )->max('id');
        return view('single')
            ->with('post', $post)
            ->with('title', $post->title)
            ->with('category', Category::take(5)->get())
            ->with('settings', Setting::first())
            ->with('next', Post::find($next_id))
            ->with('prev', Post::find($prev_id));


   }
   public function category($id){
      $category=Category::find($id);
    $post=Post::latest()->get();
      return view('category')
          ->with('category', $category)
          ->with('title', $category->name)
          ->with('settings', Setting::first())
          ->with('category', Category::take(5)->get())
          ->with('post', $post);

   }
   public function tag($id){
       $tag=Tag::find($id);

       return view('tag')->with('tag', $tag)
           ->with('title',$tag->tag)
           ->with('settings', Setting::first())
           ->with('category', Category::take(5)->get());
   }
}
