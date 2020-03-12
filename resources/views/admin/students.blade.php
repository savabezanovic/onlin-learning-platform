@extends("layouts.app")
@section("content")

    <h1>All Students</h1>

    @foreach($students as $student)

        <p> First Name: {{ $student->first_name }} </p>
        <p> Last Name: {{ $student->last_name }} </p>
        <p> Email: {{ $student->email }} </p>

        <a href='/admin/edit/{{$student->slug}}'>Edit</a>

        @if(!$student->trashed())

            <form action="{{action('AdminController@restrictUser', $student->slug)}}" method="POST">

                @method("DELETE")

                @csrf

                <input type="submit" value="Restrict">

            </form>

        @elseif($student->trashed())

            <form action="{{action('AdminController@restoreUser', $student->slug)}}" method="GET">

                @csrf

                <input type="submit" value="Restore">

            </form>

            @endif

            @if($student->active == true)

                <form action="{{action('AdminController@deactivateUser', $student->slug)}}" method="POST">

                    @csrf

                    <input type="submit" value="Deactivate">

                </form>

            @elseif($student->active == false)

                <form action="{{action('AdminController@activateUser', $student->slug)}}" method="POST">

                    @csrf

                    <input type="submit" value="Activate">

                </form>

            @endif

        <form action="{{action('AdminController@deleteUser', $student->slug)}}" method="POST">

            @method("DELETE")

            @csrf

            <input type="submit" value="Delete">

        </form>

    @endforeach

@endsection
