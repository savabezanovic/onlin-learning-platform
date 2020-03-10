@extends("layouts.app")
@section("content")

        <h1>Edit</h1>

        <form action="{{action('EducatorController@update', $course->id)}}" method="POST">
        @csrf 
        @method("PUT")

            <span for="name">Course Name:</span>
            <input class="form-control" type="text" name="name" value="{{$course->name}}" required></input>
            
            <br>

            <span for="description">Course Description:</span>
            <input class="form-control" type="text" name="description" value="{{$course->description}}" required></input>

            <br>

            <span for="goals">Goals:</span>
            <input class="form-control" type="text" name="goals" value="{{$course->goals}}" ></input>

            <br>

            <span for="category">Course Category:</span>
            <select class="form-control" name="category">

            @foreach($categories as $category)

                <option <?php if($category->id === $course->category_id) {echo "selected";} ?> value= "{{ $category->id }}" > {{ $category->name }} </option>

            @endforeach	

            </select>

            <br>

            <span for="video_url">Video URL:</span>
            <input class="form-control" type="text" name="video_url" value="{{$course->video_url}}" ></input>

            <br>

            <span for="image_url">Image URL:</span>
            <input class="form-control" type="url" name="image_url" value="{{$course->image_url}}" ></input>

            <br>

            <input class="form-control" type="hidden" name="user_id" value="{{$course->user_id}}" ></input>

            <br>

            <button class="form-control" type="submit">Edit</button>

        </form>

@endsection