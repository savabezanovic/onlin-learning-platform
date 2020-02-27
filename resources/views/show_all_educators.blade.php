@include("partials.header")
@include("partials.navigation")

    <h1>All Educators</h1>

    <h2>Recently Joined</h2>

    <?php foreach($recentJoins as $recentJoin): ?>

        <img src="https://via.placeholder.com/150">
        <p><?php echo $recentJoin->first_name . " " . $recentJoin->last_name ?></p>

    <?php endforeach; ?>

    <span for="name">Search for an educator:</span>
	<input type="text" name="name"></input>
    <br>
    
    <?php foreach($searchEducators as $searchEducator): ?>

        <img src="https://via.placeholder.com/150">
        <p><?php echo $searchEducator->first_name . " " . $recentJoin->last_name ?></p>
    
    <?php endforeach; ?>

@include("partials.footer")