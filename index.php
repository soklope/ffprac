<?php

    include('connect.php');

    // write query for all reviews
    $sql = 'SELECT * FROM pizzas';

    // make query get result
    $result = mysqli_query($conn, $sql);

    // fetch the result rows as an array
    $pizzas = mysqli_fetch_all($result, MYSQLI_ASSOC);


    if(isset($_POST['btn-atc'])) {
        $kitchen = $_POST["name"]; 
        $rating = $_POST["rating"];
        $tags = $_POST["tags"];
        $comment = $_POST["comment"];

        $sql = "INSERT INTO pizzas(kitchen, rating, tags, comment) VALUES ('".$kitchen."', '".$rating."', '".$tags."', '".$comment."');";
        $missingReviewsDB = "DELETE FROM kitchen_missing_reviews WHERE kitchen_name = '".$kitchen."';";

        if (mysqli_query($conn, $sql) && mysqli_query($conn, $missingReviewsDB)){
            echo "<meta http-equiv='refresh' content='0'>";
        } else {
            echo 'query error' . mysqli_error($conn);
        }
    }

    // write query for all missing reviews
    $missingReviewsDB = 'SELECT * FROM kitchen_missing_reviews';

    $missingReviewsResult = mysqli_query($conn, $missingReviewsDB);

    $missingReviews = mysqli_fetch_all($missingReviewsResult, MYSQLI_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My firt PHP file</title>
    <script src="script.js" defer></script>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <?php foreach($missingReviews as $missingReview) { ?>
        <div class="missingReviewClass">
            <?php echo "uge " . htmlspecialchars($missingReview['week_number']) . " "; ?>
            <h5><?php echo htmlspecialchars($missingReview['kitchen_name']); ?></h5>
            <Button class="openModal">BESVAR</Button>
        </div>
    <?php } ?>


    <?php if(($pizzas) || !$pizzas) { ?>
        <div id="progressContainer">
            <?php foreach($pizzas as $pizza){ ?>
                <div class="progressBar"></div>
            <?php } ?>
        </div>
    <?php } ?>

    <div id="ratingModal">
    
        <h1 id="nameOfKitchen">Placeholder</h1>
            <div class="stars">
                <a>&starf;</a>
                <a>&starf;</a>
                <a>&starf;</a>
                <a>&starf;</a>
                <a>&starf;</a>
            </div>
    
        <h6>Hvad kunne gøres bedre?</h6>
    
        <div>
            <form method='post'>
                <input hidden id="nameValue" type="text" name="name" value=""> <br>
                <input id="commentInput" type="text" name="comment" value=""> <br>
                <input hidden id="tagValue" type="text" name="tags" value=""> <br>
                <input hidden id="starRating" name="rating" value="">  <br>
                <input id="submitButton" type="submit" name="btn-atc" value="Indsend" onsubmit="return validateMyForm();">
            </form>
            
            <div id="tags">
                <button class="tagButton" value="Smag">SMAG</button>
                <button class="tagButton" value="Levering">LEVERING</button>
                <button class="tagButton" value="Lugt">LUGT</button>
            </div>
        </div>
    </div>
</body>
</html>
