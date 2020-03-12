@extends("layouts.app")
@section("content")

    <h1>All Educators</h1>

    @foreach($admins as $admin)

        <img src="{{$admin->profile->image_url}}" width=150 height=100>
        <p> User ID: {{ $admin->id }} </p>
        <p> First Name: {{ $admin->first_name }} </p>
        <p> Last Name: {{ $admin->last_name }} </p>
        <p> Email: {{ $admin->email }} </p>

        <a href='/admin/edit//user/{{$admin->slug}}'>Edit</a>

        @if(!$admin->trashed())

            <form action="{{action('AdminController@restrictUser', $admin->slug)}}" method="POST">

                @method("DELETE")

                @csrf

                <input type="submit" value="Restrict">

            </form>

        @elseif($admin->trashed())

            <form action="{{action('AdminController@restoreUser', $admin->slug)}}" method="GET">

                @csrf

                <input type="submit" value="Restore">

            </form>

        @endif

        @if($admin->active == true)

            <form action="{{action('AdminController@deactivateUser', $admin->slug)}}" method="POST">

                @csrf

                <input type="submit" value="Deactivate">

            </form>

        @elseif($admin->active == false)

            <form action="{{action('AdminController@activateUser', $admin->slug)}}" method="POST">

                @csrf

                <input type="submit" value="Activate">

            </form>

        @endif

        <form action="{{action('AdminController@deleteUser', $admin->slug)}}" method="POST">

            @method("DELETE")

            @csrf

            <input type="submit" value="Delete">

        </form>



    @endforeach

@endsection
