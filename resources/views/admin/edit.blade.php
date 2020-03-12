@extends("layouts.app")
@section("content")

    <h1>Edit</h1>

    <form action="{{action('AdminController@updateUser', $user->slug)}}" method="POST">
        @csrf
        @method("PUT")

        <img src="{{$user->profile->image_url}}" width='200' lenght='200'>

        <br>

        <span for="first_name">First Name:</span>
        <input type="text" name="first_name" value="{{$user->first_name}}" required></input>

        <br>

        <span for="last_name">Last Name:</span>
        <input type="text" name="last_name" value="{{$user->last_name}}" required></input>

        <br>

        <span for="password">Password:</span>
        <input type="password" name="password" value="{{$user->password}}" required></input>

        <br>

        <!-- <span for="re_password">Repeat Password:</span>
        <input type="password" re_password="re_password" required></input> -->

        <span for="email">Email:</span>
        <input type="email" name="email" value="{{$user->email}}" required></input>

        <br>

        <span for="age">Age:</span>
        <input type="number" name="age" value="{{$user->profile->age}}"></input>

        <br>

        <span for="linkedin_url">LinkedIn:</span>
        <input type="url" name="linkedin_url" value="{{$user->profile->linkedin_url}}"></input>

        <br>

        <span for="education">Education:</span>
        <input type="text" name="education" value="{{$user->profile->education}}"></input>

        <br>

        <span for="image_url">Image:</span>
        <input type="url" name="image_url" value="{{$user->profile->image_url}}"></input>

        <br>

        <span for="title">Title:</span>
        <input type="text" name="title" value="{{$user->profile->title}}"></input>

        <br>

        <span for="bio">Bio:</span>
        <input type="text" name="bio" value="{{$user->profile->bio}}"></input>

        <br>

        <span for="user_role">User Role Select Field:</span>
        <select name="user_role">

            @foreach($roles as $role)

                <option @if ($role->id === $user->roles[0]->id) selected
                        @endif value= {{$role->id }}> {{ $role->name }} </option>

            @endforeach

        </select>

        <button type="submit">Edit</button>

    </form>

@endsection
