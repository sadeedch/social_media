 @extends('layouts.master')

@section('title')
  Home Page
@endsection

@section('content')



    <div align = center class="col-md-12" > 
      <h3> List of uniqure users</h3>
        @foreach ($posts as $post)
        <a href = "" > {{$post->username}}</a><br> 
        @endforeach  
    </div>
    
@endsection



            
