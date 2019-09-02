@extends('layouts.master')

@section('title')
  Delete Post
@endsection

@section('content')

<form method="post" action= "{{url("delete_comment_action")}}">
{{csrf_field()}}
<h3> comment has been deleted succefully !!! </h3> <br>


</form>


@endsection