<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quiz Me</title>
</head>
<link rel="stylesheet" href="styles.css">
<style>
    .submit:hover{
        background-color: rgb(20, 84, 222);
    }
</style>
<body>
        <h1>Quiz Me</h1>
        <hr>
        <p><a href="new-quiz.html" >Create New Quiz</a></p>
        <h4>Choose one of the following:</h4>
    </body>
    <?php
    $conn = mysqli_connect("localhost:1000", "root", "root", "dbs") or die("Connection failed: " . mysqli_connect_error());

    $sql = "select id, quiz_name from Quiz order by id desc";
    $result = $conn->query($sql);
    
    while($row = mysqli_fetch_assoc($result)){
        $i = random_color();
        echo "<form action='take_quiz.php'>
       <p> <button type='submit' class='qzlnk' style='background-color: #$i' class='quiz' name='" . $row["id"] . "'>" . $row["quiz_name"] . "</button> </p>
        </form>";

    }

    function random_color_part() {
        return str_pad( dechex( mt_rand( 0, 255 ) ), 2, '0', STR_PAD_LEFT);
    }
    
    function random_color() {
        return random_color_part() . random_color_part() . random_color_part();
    }
    ?>

</html>
