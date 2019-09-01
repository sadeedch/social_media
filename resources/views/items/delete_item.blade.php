@extends('layouts.master')

@section('title')
  Delete Post
@endsection

@section('content')

<form method="post" action= "{{url("delete_item_action")}}">
{{csrf_field()}}
<h3> Post has been deleted succefully !!! </h3> <br>


</form>


@endsection