 @extends('layouts.master')

@section('title')
  Unique Users
@endsection

@section('content')



    <div align = center class="col-md-12" > 
      <h3> List of uniqure users</h3>
        @foreach ($posts as $post)
        <a href = "{{url("unique_users_action")}}" > {{$post->username}}</a><br> 
        @endforeach  
    </div>
    
@endsection



            
