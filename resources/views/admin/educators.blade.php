@extends("layouts.app")
@section("content")

    <h1>All Educators</h1>

    @foreach($educators as $educator)

        <img src="{{$educator->profile->image_url}}" width=150 height=100>
        <p> User ID: {{ $educator->id }} </p>
        <p> First Name: {{ $educator->first_name }} </p>
        <p> Last Name: {{ $educator->last_name }} </p>
        <p> Email: {{ $educator->email }} </p>

        <a href='/admin/edit/{{$educator->slug}}'>Edit</a>

        @if(!$educator->trashed())

            <form action="{{action('AdminController@restrictUser', $educator->slug)}}" method="POST">

                @method("DELETE")

                @csrf

                <input type="submit" value="Restrict">

            </form>

        @elseif($educator->trashed())

            <form action="{{action('AdminController@restoreUser', $educator->slug)}}" method="GET">

                @csrf

                <input type="submit" value="Restore">

            </form>

        @endif

        @if($educator->active == true)

            <form action="{{action('AdminController@deactivateUser', $educator->slug)}}" method="POST">

                @csrf

                <input type="submit" value="Deactivate">

            </form>

        @elseif($educator->active == false)

            <form action="{{action('AdminController@activateUser', $educator->slug)}}" method="POST">

                @csrf

                <input type="submit" value="Activate">

            </form>

        @endif

        <form action="{{action('AdminController@deleteUser', $educator->slug)}}" method="POST">

            @method("DELETE")

            @csrf

            <input type="submit" value="Delete">

        </form>

    @endforeach

@endsection
