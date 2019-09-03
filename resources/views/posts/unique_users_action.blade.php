 @extends('layouts.master')

@section('title')
  Unique Users
@endsection

@section('content')

<h2>HEllo</h2>

    <div align = center class="col-md-12" > 
      <h3> List of uniqure users</h3>
      @foreach ($posts as $post)
          <div id = "post">
            <img src="{{asset('user.jpg')}}" width=100 height =100 alt="simpsons user">
            <p><b>User Name </b>:{{$post->username}}</p>
            <a href = "{{url("post_detail/$post->post_id")}}" > <b>Post Title:</b> {{$post->title}}</a><br>
            <p><b>Message :</b> {{$post->msg}}</p>
            <p><b>Date:</b> {{$post->post_date}}</p>
            <p><b>Comments Number:</b> {{$comments_number}}</p>
          </div><br> 
        @endforeach
    </div>
    
@endsection



            
