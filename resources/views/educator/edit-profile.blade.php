@extends("layouts.app")
@section("content")

        <h1>Edit</h1>

        <form action="{{action('ProfileController@update', $user->slug)}}" method="POST">
        @csrf 
        @method("PUT")

            <span for="first_name">First Name:</span>
            <input type="text" name="first_name" value="{{$user->first_name}}" required></input>
            
            <br>

            <span for="last_name">Last Name:</span>
            <input type="text" name="last_name" value="{{$user->last_name}}" required></input>

            <br>

            <span for="linkedin_url">LinkedIn:</span>
            <input type="url" name="linkedin_url" value="{{$user->profile->linkedin_url}}" ></input>

            <br>

            <span for="education">Education:</span>
            <input type="text" name="education" value="{{$user->profile->education}}" ></input>

            <br>

            <span for="image_url">Image:</span>
            <input type="url" name="image_url" value="{{$user->profile->image_url}}" ></input>

            <br>

            <span for="title">Title:</span>
            <input type="text" name="title" value="{{$user->profile->title}}" ></input>

            <br>

            <span for="bio">Bio:</span>
            <input type="text" name="bio" value="{{$user->profile->bio}}" ></input>

            <br>

            <button type="submit">Edit</button>

        </form>

@endsection