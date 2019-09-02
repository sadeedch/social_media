@extends('layouts.master')

@section('title')
  Comments
@endsection

@section('content')
    <div class="col-md-4">
      <img src="{{asset('css/user.jpg')}}" width=100 height =100 alt="simpsons user">
      <h1>Title : {{$post->title}}</h1>
      <p> <b>User Name:</b> {{$post->username}}</p>
      <p> <b>Message:</b> {{$post->msg}}</p>
      <p> <b>Date:</b> {{$post->post_date}}</p>

      <p><a href = "{{url("delete_post/$post->post_id")}}"> Delete Post</a></p>   
      <a href = "{{url("update_post/$post->post_id")}}" > Update Post</a><br>
      
    </div>   


  <div class="col-md-8" >
      <form method="post" action="{{url("add_comment_action/$post->post_id")}}">
      {{csrf_field()}}
        <div align = center style="background-color: #008080;">
          <label>User Name:</label><br><input type = "text" name ="comment_username"><br><br>
          <label>Comment:</label><br> <textarea type="text" rows="5" cols="70" name ="comment_msg"></textarea><br>
          <input type ="submit" value="Add new Comment">
        </div>
      </form><br> <br>
      <h3 align = center>Comments:</h3>
      
        @if ($comments)
          @foreach ($comments as $comment)
            <div style="background-color: #3D9970">
              <p> <b>User Name: </b>{{$comment->comment_username}}</p>
              <p> <b>Comment: </b> {{$comment->comment_msg}}</p>
                <form method="post" action="{{url("delete_comment_action/$comment->comment_id")}}">
                <input type ="submit" value="Delete Comment" style = "background-color: white; /* Green */
                 
                  color: black;
                  padding: 15px 32px;
                  text-align: center;
                  
                  display: inline-block;
                  font-size: 10px;
                  margin: 4px 2px;">
                </form>
            </div><br>
          @endforeach
        @else
          <h4>There are no comments for this post</h4> 
        @endif
        

  </div>
@endsection
