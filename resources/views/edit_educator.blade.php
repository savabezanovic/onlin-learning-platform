@include("partials.header")
@include("partials.navigation")

    <h1>Edit</h1>

    <form action="{{action('AdminsController@updateEducator', $educator[0]->user_id)}}" method="POST">
    @csrf 
    @method("PUT")

        <img src="{{$educator[0]->image_url}}" width='200' lenght='200'>

        <br>

        <span for="first_name">First Name:</span>
		<input type="text" name="first_name" value={{$educator[0]->first_name}} required></input>
        
        <br>

        <span for="last_name">Last Name:</span>
		<input type="text" name="last_name" value={{$educator[0]->last_name}} required></input>

        <br>

        <span for="password">Password:</span>
		<input type="password" name="password" value={{$educator[0]->password}} required></input>

        <br>

        <!-- <span for="re_password">Repeat Password:</span>
		<input type="password" re_password="re_password" required></input> -->

        <span for="email">Email:</span>
		<input type="email" name="email" value={{$educator[0]->email}} required></input>

        <br>

        <span for="age">Age:</span>
		<input type="number" name="age" value={{$educator[0]->age}} ></input>

        <br>

        <span for="linkedin_url">LinkedIn:</span>
		<input type="url" name="linkedin_url" value={{$educator[0]->linkedin_url}} ></input>

        <br>

        <span for="education">Education:</span>
		<input type="text" name="education" value={{$educator[0]->education}} ></input>

        <br>

        <span for="image_url">Image:</span>
		<input type="url" name="image_url" value={{$educator[0]->image_url}} ></input>

        <br>

        <span for="title">Title:</span>
		<input type="text" name="title" value={{$educator[0]->title}} ></input>

        <br>

        <span for="bio">Bio:</span>
		<input type="text" name="bio" value={{$educator[0]->bio}} ></input>

        <br>

		<span for="user_role">User Role Select Field:</span>
		<select name="user_role">

        <?php foreach($educator["roles"] as $role): ?>

        <option value= <?php echo $role->{"id"} ?> > <?php echo $role->{"name"} ?> </option>

        <?php endforeach; ?>	

        </select>

        <button type="submit">Edit</button>

    </form>

@include("partials.footer")