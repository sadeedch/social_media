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


Route::get('/', function(){
    $sql = "select * from post order by post_id DESC";
    $posts = DB::select($sql);
    
    return view('items.home')->with('posts', $posts); 
});

Route::get('recent_post', function(){
    $sql = "select * FROM post WHERE post_date > (SELECT DATETIME('now', '-7 day'))";
    $posts = DB::select($sql);
    
    return view('items.recent_post')->with('posts', $posts); 
});


Route::get('item_detail/{post_id}', function($id){
    $post = get_item($id);
    $comment = get_comment($id);
    return view('items.item_detail')->with('post', $post);
});
// get item function
function get_item($id){
    $sql = "select * from post where post_id =?";    // ? is used as a placeholder for SQL sanitisation 
    $posts = DB::select($sql, array($id));
    if (count ($posts) != 1){                   // if id is not exactly to 1, raise an error. 
        die ("Something has gone wrong");
    }
    $post = $posts[0];
    return $post;
}
function get_comment($id){
    $sql = "select * from comment";    
    $comments = DB::select($sql);
    $comment = $comments[0];
    return $comment;
}


// add item route, action and function
Route::get('add_item', function(){
    return view('items.add_item');
});
Route::post('add_item_action', function (){
    $username = request('username');
    $title = request('title');
    $msg = request('msg');
    
    $id = add_item($username,$title, $msg);
    if ($id){
        return redirect (url("/"));     // this will redirect to item details. url() for absolute path 
    } else {
        die ("All fields are required to create a new post");
    }
});
function add_item($username,$title, $msg){
    $sql = "insert into post (username, title, msg) values (?,?,?)";
    DB::insert($sql, array($username,$title, $msg));
    $id = DB::getPdo()->lastInsertId();     //DB::getPdo()->lastInsertId()to fetch last inserted item's id
    return ($id);
}


//update item route, action and function
Route::get('update_item/{post_id}', function($id){
    $post = get_item($id);
    return view('items.update_item')->with('post', $post); 
});
Route::post('update_item_action', function (){
    $username = request ('username');
    $title = request('title');
    $msg = request('msg');
    $id = request('post_id');
    $post = update_item($username, $title, $msg, $id);
    return redirect (url("item_detail/$id"));     // this will redirect to item details. url() for absolute path 
});
function update_item($username, $title, $msg, $id) {
    $sql = "update post set username = ?, title = ?, msg = ? where post_id = ?";
    DB::update($sql, array($username, $title, $msg, $id));
    }



// delete item route, action and function
Route::get('delete_item/{post_id}', function($id){
    $post = delete_item($id);
    return view('items.delete_item')->with('post', $post); 
});

Route::post('delete_item_action', function (){
    $id = request('id');
    $post = delete_item($id);
});
function delete_item($id) {
    $sql = "delete from post where post_id = ?";
    DB::delete($sql, array($id));
} 







