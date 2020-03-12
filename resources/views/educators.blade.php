@extends("layouts.app")
@section("content")

        <img src="https://via.placeholder.com/150">

        <h2>Najnoviji Clanovi</h2>

        @foreach($recentEducators as $recentEducator)

            <a href="/profile/{{$recentEducator->slug}}">
                <img src="{{$recentEducator->profile->image_url}}" width=150 height=100>
                <p>{{$recentEducator->first_name}} {{$recentEducator->last_name}}</p>
            </a>
        @endforeach

        <form action="{{action('PageController@showEducators')}}" method="GET">
        @csrf
            <span for="name">Search for an educator:</span>
            <input type="text" name="name"></input>

            <input type="submit" value="Search">

        </form>
        <br>

        @foreach($allEducators as $educator)
            <a href="/profile/{{$educator->slug}}">
                <img src="{{$educator->profile->image_url}}" width=150 height=100>
                <p>{{$educator->first_name}} {{$educator->last_name}}</p>
            </a>
        @endforeach

@endsection
