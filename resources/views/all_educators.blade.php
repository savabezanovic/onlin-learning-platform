<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Educators</title>
</head>
<body>
    <h1>All Educators</h1>
    <?php

    foreach($educators as $educator) {

        echo $educator->first_name . " " . "<a href='/editeducators'>Edit</a>" . "<br>";

    }

    ?>
</body>
</html>