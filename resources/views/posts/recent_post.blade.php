 @extends('layouts.master')

@section('title')
  Recent Posts
@endsection

@section('content')


    <div class="col-md-4"> 
      
    </div>
    <div class="col-md-8" > 
      @if ($posts)   
        @foreach ($posts as $post)
          <div id = "post">
            <img src="{{asset('css/user.jpg')}}" width=100 height =100 alt="simsons user">
            <p><b>User Name </b>:{{$post->username}}</p>
            <a href = "{{url("item_detail/$post->post_id")}}" > <b>Post Title:</b> {{$post->title}}</a><br>
            <p><b>Message :</b> {{$post->msg}}</p>
            <p><b>Date:</b> {{$post->post_date}}</p>
          </div><br> 
        @endforeach
      @else
        No item Found
      @endif
    </div>
 
@endsection




{{-- url() function above is being used for absolute address --}}