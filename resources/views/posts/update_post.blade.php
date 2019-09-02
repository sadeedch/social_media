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
    <textarea type="text" name ="msg" value = "{{$post->post_date}}">
    </textarea><br>

    <input type="submit" value="Update item">
  </form>
@endsection