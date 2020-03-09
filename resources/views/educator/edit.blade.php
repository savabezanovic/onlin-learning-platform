@extends("layouts.app")
@section("content")

        <h1>Edit</h1>

        <form action="{{action('ProfileController@update', $educator->id)}}" method="POST">
        @csrf 
        @method("PUT")

            <img src="{{$educator->profile->image_url}}" width='200' lenght='200'>

            <br>

            <span for="first_name">First Name:</span>
            <input type="text" name="first_name" value="{{$educator->first_name}}" required></input>
            
            <br>

            <span for="last_name">Last Name:</span>
            <input type="text" name="last_name" value="{{$educator->last_name}}" required></input>

            <br>

            <span for="age">Age:</span>
            <input type="number" name="age" value="{{$educator->profile->age}}" ></input>

            <br>

            <span for="linkedin_url">LinkedIn:</span>
            <input type="url" name="linkedin_url" value="{{$educator->profile->linkedin_url}}" ></input>

            <br>

            <span for="education">Education:</span>
            <input type="text" name="education" value="{{$educator->profile->education}}" ></input>

            <br>

            <span for="image_url">Image:</span>
            <input type="url" name="image_url" value="{{$educator->profile->image_url}}" ></input>

            <br>

            <span for="title">Title:</span>
            <input type="text" name="title" value="{{$educator->profile->title}}" ></input>

            <br>

            <span for="bio">Bio:</span>
            <input type="text" name="bio" value="{{$educator->profile->bio}}" ></input>

            <button type="submit">Edit</button>

        </form>

@endsection