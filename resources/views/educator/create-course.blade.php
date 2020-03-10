@extends("layouts.app")
@section("content")

    <h1>Create New Course</h1>

    <form method="POST" action="{{action('EducatorController@save')}}">
        
            @csrf

            <span for="name">Course Name:</span>
            <input type="text" name="name" required></input>
            
            <br>

            <span for="description">Course Description:</span>
            <input type="text" name="description" required></input>
        
            <br>

            <span for="goals">Course Goals:</span>
            <input type="text" name="goals" required></input>
        
            <br>

            <select name="category">

                @foreach($categories as $category)

                    <option value= "{{ $category->id }}" > {{ $category->name }} </option>

                @endforeach	
            
            </select>

            <br>

            <span for="video_url">Video URL:</span>
            <input name="video_url" type="text">

            <br>
            
            <input type="hidden" name="user_id" value="{{auth()->user()->id}}">

            <br>

            <span for="image_url">Image URL</span>
            <input type="text" name="image_url">

            <button type="submit">Create</button>
            
    </form>
  
@endsection