@include("partials.header")
@include("partials.navigation")

    <h1>All Educators</h1>

    <?php foreach($educators as $educator): ?>

        <?php 
        
        echo "User ID: " . $educator->{"user_id"} . " First Name: " .  
        
        $educator->{"first_name"} . " Last Name: " . $educator->{"last_name"} . 
        
        " Email: " . $educator->{"email"}

        ?>   
        
        <a href='/editeducator/{{$educator->user_id}}'>Edit</a>
       
        <form action="{{action('AdminsController@deleteEducator', $educator->user_id)}}" method="POST">
        
        {{method_field("DELETE")}}

        {{csrf_field()}}
        
        <input type="submit" value="Delete">
       
        </form>
        
        <br>

    <?php endforeach; ?>

@include("partials.footer")