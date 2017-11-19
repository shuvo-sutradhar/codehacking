<?php

namespace App\Http\Controllers;
use App\Http\Requests\PostsCreateRequest;
use App\Category;
use App\User;
use App\Post;
use App\Photo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AdminPostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $posts = Post::paginate(2);
        return view('admin.posts.index',compact('posts'));
    }
    public function welcomeView()
    {
        //
        $posts = Post::paginate(2);
        $catagories = Category::all();
        return view('welcome',compact('posts','catagories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $categories = Category::pluck('name','id')->all();

        return view('admin.posts.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostsCreateRequest $request)
    {
        //
        $input = $request->all();
        $user = Auth::user();

        if($file = $request->file('photo_id')){
            
            $name = time() . $file->getClientOriginalName();
            $file->move('images',$name);
            $photo = Photo::create(['file'=>$name]);
            $input['photo_id'] = $photo->id;

        }

        $user->post()->create($input);
        Session::flash('create_post','Post Has Been Created.');
        return redirect('/admin/posts');
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
        //
        $post = Post::findOrFail($id);
        $categories = Category::pluck('name','id')->all();
        return view('admin.posts.edit', compact('post','categories'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PostsCreateRequest $request, $id)
    {
        //
        $input = $request->all();


        if($file = $request->file('photo_id')){

            $name = time() . $file->getClientOriginalName();
            $file->move('images',$name);
            $photo = Photo::create(['file'=>$name]);
            $input['photo_id'] = $photo->id;

        }

        Auth::user()->post()->whereId($id)->first()->update($input);
        Session::flash('update_post','Post Has Been updated.');
        return redirect('/admin/posts');

        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // User::findOrFail($id)->delete();
        $post = Post::findOrFail($id);

        unlink(public_path() . $post->photo->file);

        $post->delete();
        
        Session::flash('delete_post','Post Has Been Deleted.');
        return redirect('/admin/posts');
    }


    public function post($slug){
        $post = Post::findBySlugOrFail($slug);
        $comments = $post->comments()->whereIsActive(1)->get();
        $categories = Category::all();
        return view('post',compact('post','categories','comments'));
    }


    public function getAllCat($slug){
        $categories = Category::all();
        $category = Category::findBySlugOrFail($slug);;
        $posts = $category->post()->paginate(2);
        return view('category',compact('categories','category','posts'));
       // return view('category')->with('category', $category)->with('categories',$categories)->with('posts', $posts);
    }


    public function searchResult(Request $request){
        $s = $request->input('s');
        $posts = Post::latest()->search($s)->paginate(10);

        return view('search',compact('posts'));
    }








}
