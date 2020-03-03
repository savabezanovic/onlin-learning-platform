@include("partials.header")
@include("partials.navigation")

    <h1>All Educators</h1>

    @foreach($educators as $educator)
        
        <p> User ID: {{ $educator->id }} </p> 
        <p> First Name: {{ $educator->first_name }} </p>  
        <p> Last Name: {{ $educator->last_name }} </p> 
        <p> Email: {{ $educator->email }} </p> 
    
        <a href='/admin/edit/educator/{{$educator->id}}'>Edit</a>
       
        <form action="{{action('AdminsController@deleteEducator', $educator->id)}}" method="POST">
        
        {{method_field("DELETE")}}

        {{csrf_field()}}
        
        <input type="submit" value="Delete">
       
        </form>
        
        <br>

    @endforeach

@include("partials.footer")