<?php

namespace App\Http\Controllers;
use App\Models\post;
use App\Models\category;
use App\Models\posts_tags;
use App\Models\tags;
use App\Models\User;

use Illuminate\Http\Request;

class PostController extends Controller
{
    
    public function pantallaInicio(){

    }

    public function PostCategory(){
        //obtenemos la categoria
        $category = Category::findorfail($id);
        //consulta posts
        $posts = Post::where('category_id', $category->id)
        ->latest('id')
        ->limit(3)
        ->get();
        return response()->json([
            'categoria' => $category,
            'articulo'  => $posts
        ]);
    }
    
    public function categories(){
        $categories = Category::all();
        return response()->json(['Categories' => $categories ]);
    }
    public function unaCategoria($id){
        $category = Category::where('id',$id)->get();
        $posts = Post::where('category_id', $category->id)->get();
             //dd($post);
             return response()->json([
                'categoria' => $category,
                'articulo'  => $posts
            ]);
    }
    public function cuerpoPost($id){
        $post = Post::where('id',$id)->get();
             //dd($post);
             return response()->json(['Post'=> $post]);
    }


    // //index posts 
    // public function index(){
    //     $post = Post::all();
    //     //dd($post);
    //     return response()->json(['posts'=> $post]);
    // }
    // //show post
    // public function individual($id){
    //     $post = Post::findOrfail($id);
    //     //dd($post);
    //     return response()->json(['post'=> $post]);
    // }

    public function slider(){
        //el  metodo take es para limitar el resultado
        $posts = Post::all()->take(10);
        return response()->json(['Posts' => $posts]);
    }

    public function examenenpoint2(){
        $category = Category::all()->last()
        ->take(3)
        ->get();
        $posts = Post::where('category_id', '1' || '2' || '3')->latest()
        ->take(3)
        ->get();
        return response()->json([
            'categoria' => $category,
            'post'  => $posts,
            'categoria' => $category,
            'post'  => $posts,
            'categoria' => $category,
            'post'  => $posts
        ]);
    }


    public function examenenpoint(){
        $category1 = Category::where('id', '1')->latest()
        ->select(['nombre','description'])
        ->get();
        $posts1 = Post::where('category_id', '1')->latest()
        ->take(3)
        ->select(['title', 'description', 'slug'])
        ->get();
        $category2 = Category::where('id', '1')->latest()
        ->select(['nombre','description'])
        ->get();
        $posts2 = Post::where('category_id', '2')->latest()
        ->take(3)
        ->select(['title', 'description', 'slug'])
        ->get();
        $category3 = Category::where('id', '1')->latest()
        ->select(['nombre','description'])
        ->get();
        $posts3 = Post::where('category_id', '3')->latest()
        ->take(3)
        ->select(['title', 'description', 'slug'])
        ->get();
        return response()->json([
            'categoria1' => $category1,
            'posts1'  => $posts1,
            'categoria2' => $category2,
            'posts2'  => $posts2,
            'categoria3' => $category3,
            'posts3'  => $posts3
        ]);
    }

    
    // public function examenenpoint2(){
    //     //$category = Category::select('id')->get();
    //     $i = 0;
    //     for( $i; $i >= 3; $i++){
    //         $category = Category::where('id', $i)
    //         ->select(['nombre','description'])
    //         ->get();
    //     }
    //     return response()->json([
    //         'categoria' => $category
    //     ]);
        
    // }

    // -------------------------funciones ya correctas como en la clase------------------------

    //listar todos los post
    public function index(){
        $post = Post::all();
        //dd($post);
        return response()->json(['post' => $post]);

    }
    
    // listar 5 post ara el slider
    public function sliderPost(){
        $sliderPost = Post::latest()
        ->take(6)
        ->orderBy('id', 'desc')
        ->get();
        //dd($post):
        return response()->json(['sliderPost' => $sliderPost]);
    }
    //mostrar post individual detalle post
    public function individual($id){
        $post = Post::findOrfail($id);
        //dd($post);
        return response()->json(['post' => $post]);

    }

}
