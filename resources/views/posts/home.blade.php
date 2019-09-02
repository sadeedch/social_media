 @extends('layouts.master')

@section('title')
  Home Page
@endsection

@section('content')


    <div class="col-md-4"> 
      <form method="post" action="{{url("add_post_action")}}"> 
        {{csrf_field()}}
        <label>User Name:</label><br><input type = "text" name ="username"><br>
        <label>Title:</label><br><input type = "text" name ="title"><br>
        <label>Message:</label><br> <textarea type="text" rows="10" cols="35" name ="msg"></textarea><br>
        <input type ="submit" value="Create Post">
      </form>
    </div>
    <div class="col-md-8" > 
    </p>
   
      @if ($posts)   
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
      @else
        No Post Found
      @endif

      
   

    </div>
 
@endsection




{{-- url() function above is being used for absolute address --}}