@extends("layouts.app")
@section("content")
    @include("components.navigation")

        <h1>All Students</h1>

        @foreach($students as $student)
            
            <p> User ID: {{ $student->id }} </p> 
            <p> First Name: {{ $student->first_name }} </p>  
            <p> Last Name: {{ $student->last_name }} </p> 
            <p> Email: {{ $student->email }} </p> 
        
            <a href='/admin/edit/{{$student->id}}'>Edit</a>
        
            <form action="{{action('AdminsController@delete', $student->id)}}" method="POST">
            
            {{method_field("DELETE")}}

            {{csrf_field()}}
            
            <input type="submit" value="Delete">
        
            </form>
            
            <br>

        @endforeach

    @include("components.footer")
@endsection