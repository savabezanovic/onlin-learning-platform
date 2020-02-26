@include("partials.header")
@include("partials.navigation")
<h1>Create New Profile</h1>

<?php echo $user_id . "PICKO JAVI SE"; ?>

<form action="{{action('AdminsController@storeProfile', $user_id) }}" method="POST">
    @csrf
    
    <span for="age">Age:</span>
	<input type="number" name="age" ></input>
     
    <br>

    <span for="linkedin_url">LinkedIn:</span>
	<input type="url" name="linkedin_url" ></input>
     
    <br>

    <span for="education">Education:</span>
	<input type="text" name="education" ></input>
     
    <br>

    <span for="image_url">Image:</span>
	<input type="url" name="image_url" ></input>
     
    <br>

    <span for="title">Title:</span>
	<input type="text" name="title" ></input>
     
    <br>

    <span for="bio">Bio:</span>
	<input type="text" name="bio" ></input>

    <input type="submit" value="Create">

</form>
@include("partials.footer")