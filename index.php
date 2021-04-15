<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quiz Application</title>
</head>
    <body>
        <h1>Quiz Application</h1>
        <p><a href="new-quiz.html">Create New Quiz</a></p>
        <h4>Take one of the following quizzes:</h4>
    </body>
    <?php
    $conn = mysqli_connect("localhost:1000", "root", "root", "deleteThis") or die("Connection failed: " . mysqli_connect_error());

    $sql = "select id from Quiz order by id desc";
    $result = $conn->query($sql);
    while($row = mysqli_fetch_assoc($result)){
        echo "<form action='take_quiz.php'>
        <button type='submit' name='" . $row["id"] . "'>" . $row["id"] . "</button>
        </form>";
    }
    ?>
    <script>

    </script>
</html>
