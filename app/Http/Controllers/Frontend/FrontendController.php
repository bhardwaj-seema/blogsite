<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index(){
        $all_categories =  Category::where('status', '0')->get();
        $latest_posts = Post::where('status','0')->orderBy('created_at','DESC')->get()->take(15);
        $posts =Post::where('status','0')->orderBy('created_at','DESC')->get()->take(1);
        $latest_post =Post::where('status','0')->orderBy('created_at','ASC')->get()->take(1);

        $old_post = Post::where('status','0')->orderBy('created_at','ASC')->get()->take(2);

        return view('frontend.index', compact('all_categories','latest_posts','posts','old_post'));

        


    }

    public function viewCategoryPost(string $category_slug){
        $category = Category::where('slug', $category_slug)->where('status', '0')->first();
        if($category){
               $post = Post::where('category_id', $category->id)->where('status','0')->paginate(1);

               return view('frontend.post.index', compact('post', 'category'));

           }
           else{
            return redirect('/');
           }


    }

    public function viewPost(string $category_slug, string $post_slug){
        $category = Category::where('slug', $category_slug)->where('status', '0')->first();
        if($category){
               $post = Post::where('category_id', $category->id)->where('slug', $post_slug)->where('status','0')->first();

               $latest_posts = Post::where('category_id', $category->id)->where('status','0')->orderBy('created_at', 'DESC')->get()->take(10);

               return view('frontend.post.view', compact('post', 'latest_posts' ));

           }
           else{
            return redirect('/');
           }

    }

    public function about(){
        $all_categories =  Category::where('status', '0')->get();
        return view('frontend.about', compact('all_categories'));
    }

    public function contact(){
        return view('frontend.contact');
    }

    public function privacy_policy(){
        return view('frontend.privacy-policy');
    }
}
