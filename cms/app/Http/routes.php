<?php
use App\Blog;
/*
|--------------------------------------------------------------------------
| Application Routes //insert data in blog table
|--------------------------------------------------------------------------
|
*/


// Route::get('/insert',function(){
// 	DB::insert('insert into blog(title,content) values(?,?)', ['PHP with laravel 3', 'Laravel is the best thing that has happened to php']);
// });



/*
|--------------------------------------------------------------------------
| Application Routes //read data in blog table
|--------------------------------------------------------------------------
|
*/

// Route::get('/read',function(){
// 	$results = DB::select('select * from blog where id = ?',['1']);

// 	foreach ($results as $value) {
// 		echo $value->title.'<br>';
// 	}

// });


/*
|--------------------------------------------------------------------------
| Application Routes //update data in blog table
|--------------------------------------------------------------------------
|
*/

// Route::get('/update',function(){
// 	DB::update('update blog set title = ? , content = ? where id = ?',['update title','New in laravel','1']);
// });



/*
|--------------------------------------------------------------------------
| Application Routes //delete data in blog table
|--------------------------------------------------------------------------
|
*/

// Route::get('/delete',function(){
// 	$delete = DB::delete('delete from blog where id=?',['4']);
// 	return $delete;
// });



/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/about', function () {
// 	return "Hey! It's About Page";
// });


// Route::get('/contact', function () {
// 	return "Hey! It'Contact Page";
// });


// Route::get('/post/{id}/{name}', function ($id,$name) {

// 	echo "name = " .$name;
// 	echo "<br>"; 
// 	echo "id = " .$id;
// });



// Route::get('admin/posts/example', array('as'=> 'admin.home', function(){

// 	$url = route('admin.home');
// 	return "The url is ". $url;

// }));



//Route::get('/post/{name}','postController@index');



// //Route::resource('/post','postController');
Route::get('/contact','postController@contact');


// //passing data vai url
// Route::get('post/{id}/{name}/{password}','postController@show_post');



/*
|--------------------------------------------------------------------------
| ELOQUENT (ORM)
|--------------------------------------------------------------------------
|
*/

// Route::get('/read', function(){

// 	$blogs = Blog::all();
// 	foreach ($blogs as $post){
// 		return $post->title;
// 	}

// });

// Route::get('/find', function(){

// 	$post = Blog::find(2);
// 	return $post->title;

// });


// Route::get('/findwhere',function(){

// 	$posts = Blog::where('title','PHP with laravel')->orderby('id','desc')->take(2)->get();
// 	return $posts;


// });



// Route::get('/findmore',function(){
// 	$posts = Blog::findOrFail(4)->get();

// 	//$posts = Blog::where('id', '<', 20)->firstOrFail();


// 	return $posts;


// });


// Route::get('/post', function(){
//     return Blog::where('title', '<>', '')->Where('created_at','<>','')->count();
// });



/*
|--------------------------------------------------------------------------
| Insert data 
|--------------------------------------------------------------------------
|
*/
// Route::get('/basicInsert',function(){

// 	$post = new Blog;
// 	$post->title = "One More Light";
// 	$post->content = "Who Cares if one more light goes out.There are million of stars in the sky.";

// 	$post->save();


// });

/*
|--------------------------------------------------------------------------
| update data
|--------------------------------------------------------------------------
|
*/

// Route::get('/basicUpdate',function(){

// 	$post = Blog::find(2);
// 	$post->title = "Jei sohore tumi nei ami thakbo na shei sohore.";
// 	$post->content = "Ekhane nei kono utshob,Anonder osrudhara,Nei kono pakhir kolorob,Fulera o subas hara.";

// 	$post->save();


// });


/*
|--------------------------------------------------------------------------
| Creating data & configure mass assignment
|--------------------------------------------------------------------------
|
*/

// Route::get('/create',function(){

// 	blog::create(['title' => 'the create method', 'content' => 'Wow i\'m learning laravel']);


// });


/*
|--------------------------------------------------------------------------
| Update eloquent
|--------------------------------------------------------------------------
|
*/

// Route::get('/update',function(){

// 	Blog::where('id',4)->where('is_admin',1)->update(['title' => 'Updating again', 'content' => 'Wow i\'m Updating data in laravel']);


// });

/*
|--------------------------------------------------------------------------
| delete eloquent (1st way)
|--------------------------------------------------------------------------
|
*/

Route::get('/delete',function(){

	$post = Blog::find(5);
	$post->delete();


});

/*
|--------------------------------------------------------------------------
| delete eloquent (2nd way)
|--------------------------------------------------------------------------
|
*/

// Route::get('/delete2',function(){

// 	Blog::destroy(6);
// 	//Blog::destroy([1,2]);

//});


/*
|--------------------------------------------------------------------------
| soft delete eloquent
|--------------------------------------------------------------------------
|
*/
// Route::get('/softdelete',function(){

// 	blog::find(2)->delete();
	
// });


/*
|--------------------------------------------------------------------------
| read soft delete eloquent
|--------------------------------------------------------------------------
|
*/
//Route::get('/readSoftDelete',function(){

	// $post = Blog::find(1);
	// return $post;
	
	//here will show all data form blog table with trashed items.
	// $post = Blog::withTrashed()->where('is_admin',0)->get();
	// return $post;

	
	//here will show with/without trashed data based on id form blog table.
	// $post = Blog::withTrashed()->where('id',1)->get();
	// return $post;

	//here will show only all trashed data form blog table.
	// $post = Blog::onlyTrashed()->where('is_admin',0)->get();
	// return $post;

	//here will show only trashed data based on id form blog table with trashed items.
	// $post = Blog::onlyTrashed()->where('id',1)->get();
	// return $post;

//});


/*
|--------------------------------------------------------------------------
| restore delete eloquent
|--------------------------------------------------------------------------
|
*/

// Route::get('/restore',function(){

// 	blog::withTrashed()->where('id',1)->restore();

// });


/*
|--------------------------------------------------------------------------
| force-delete eloquent
|--------------------------------------------------------------------------
|
*/

Route::get('/forceDelete',function(){

	blog::onlyTrashed()->where('id',5)->forceDelete();

});