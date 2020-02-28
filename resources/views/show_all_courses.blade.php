@include("partials.header")
@include("partials.navigation")

    <h1>Recentlly added</h1>

    <?php foreach($recentCreations as $recentCreation): ?>

    <video src="<?php echo $recentCreation->video_url ?>" > </video>
    <p> <?php echo $recentCreation->name ?> </p>

    <?php endforeach; ?>

@include("partials.footer")