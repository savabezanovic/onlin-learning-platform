@extends("layouts.app")
@section("content")

    <h1>Create New User</h1>

    <form method="POST" action="{{action('AdminController@storeUser')}}">
        
            @csrf

            <span for="first_name">First Name:</span>
            <input type="text" name="first_name" required></input>
            
            <br>

            <span for="last_name">Last Name:</span>
            <input type="text" name="last_name" required></input>
        
            <br>

            <span for="password">Password:</span>
            <input type="password" name="password" required></input>
        
            <br>

            <span for="email">Email:</span>
            <input type="email" name="email" required></input>
        
            <br>

            <span for="user_role">User Role Select Field:</span>
            <select name="user_role">

            @foreach($userRoles as $userRole)

            <option value= {{ $userRole->id }} > {{ $userRole->name }} </option>

            @endforeach	

            </select>

            <button type="submit">Create</button>
    </form>
  
@endsection