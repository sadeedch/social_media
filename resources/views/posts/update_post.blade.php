@extends('layouts.master')

@section('title')
  Update Post
@endsection

@section('content')

  <form method="post" action= "{{url("update_post_action")}}">
    {{csrf_field()}}
    <input type="hidden" name="post_id" value="{{$post->post_id}}">

    <label>User Name:</label><br>
    <input type = "text" name ="username" value = "{{$post->username}}"><br>

    <label>Title:</label><br>
    <input type = "text" name ="title" value = "{{$post->title}}"><br>

    <label>Message:</label><br> 
    <textarea type="text" name ="msg" rows="10" cols="35" value = "{{$post->msg}}">
    </textarea><br>

    <input type="submit" value="Update Post">
  </form>
@endsection