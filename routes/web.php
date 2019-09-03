<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// route for home page showing all posts
Route::get('/', function(){
    $sql = "select * from post order by post_id DESC";
    $posts = DB::select($sql);

    
    $comments_number = DB::table('comment')->count('comment.post_id');
    return view('posts.home')->with('posts', $posts)->with('comments_number', $comments_number);
});

// route for recent post page
Route::get('recent_post', function(){
    $sql = "select * FROM post WHERE post_date > (SELECT DATETIME('now', '-7 day')) order by post_id DESC";
    $posts = DB::select($sql);
    return view('posts.recent_post')->with('posts', $posts); 
});

// route for list of unique users
Route::get('unique_users', function(){
    $sql = "select DISTINCT username from post ";
    $posts = DB::select($sql);
    return view('posts.unique_users')->with('posts', $posts); 
});


Route::get('unique_users_action/', function(){
    $sql = "select * from post where username = 'Sadeed'";
    $posts = DB::select($sql);
    dd($posts);
    return view('posts.unique_users_action')->with('posts', $posts); 
});
// route for documentation page
Route::get('doc', function(){
    return view('posts.doc');
});

Route::get('post_detail/{post_id}', function($id){
    $post = get_post($id);
    $comments = get_comment($id);
    return view('posts.post_detail')->with('post', $post)->with('comments', $comments);
});



// get post function
function get_post($id){
    $sql = "select * from post where post_id =?";    // ? is used as a placeholder for SQL sanitisation 
    $posts = DB::select($sql, array($id));
    if (count ($posts) != 1){                   // if id is not exactly to 1, raise an error. 
        die ("Something has gone wrong");
    }
    $post = $posts[0];
    return $post;
}

// get comments function
function get_comment($id){
    $sql = "select * from post, comment where post.post_id = comment.post_id and comment.post_id = ? ";    
    $comments = DB::select($sql, array($id));
    return $comments;
}


// add item route, action and function
//Route::get('add_item', function(){
//    return view('items.add_item');
//});
Route::post('add_post_action', function (){
    $username = request('username');
    $title = request('title');
    $msg = request('msg');
    
    $tna = add_post($username,$title, $msg);
    
    if ($tna){
        return redirect (url("/"));    
    } else {
        die ("All fields are required to create a new post");
    }
    return $tna;
    
    
});

function add_post($username,$title, $msg){
    $sql = "insert into post (username, title, msg) values (?,?,?)";
    DB::insert($sql, array($username,$title, $msg));
    $id = DB::getPdo()->lastInsertId();     //DB::getPdo()->lastInsertId()to fetch last inserted item's id
    return ($id);
}


// ********************



Route::post('add_comment_action/{post_id}', function ($id){
    $post_id = $id;
    $username = request('comment_username');
    $msg = request('comment_msg');
    $new_comment = add_comment($username,$msg, $post_id);
    return redirect (url("post_detail/$id"));

});

function add_comment($username,$msg, $post_id){
    $sql = "insert into comment (comment_username,  comment_msg, post_id) values (?,?,?)";
    DB::insert($sql, array($username, $msg, $post_id));
    
}


//update item route, action and function
Route::get('update_post/{post_id}', function($id){
    $post = get_post($id);
    return view('posts.update_post')->with('post', $post); 
});
Route::post('update_post_action', function (){
    $username = request ('username');
    $title = request('title');
    $msg = request('msg');
    $id = request('post_id');
    $post = update_post($username, $title, $msg, $id);
    return redirect (url("post_detail/$id"));     // this will redirect to item details. url() for absolute path 
});
function update_post($username, $title, $msg, $id) {
    $sql = "update post set username = ?, title = ?, msg = ? where post_id = ?";
    DB::update($sql, array($username, $title, $msg, $id));
    }



// delete item route and function
Route::get('delete_post/{post_id}', function($id){
    $post = delete_post($id);
    return view('posts.delete_post')->with('post', $post); 
});

function delete_post($id) {
    $sql = "delete from post where post_id = ?";
    DB::delete($sql, array($id));
} 

Route::get('delete_comment/{comment_id}', function($id){
    $post = delete_comment($id);
    return view('posts.delete_comment')->with('post', $post); 
    
});


Route::post('delete_comment_action', function (){
    $id = request('id');
    $post = delete_comment($id);


});
function delete_comment($id) {
    $sql = "delete from comment where comment_id = ?";
    DB::delete($sql, array($id));
} 








