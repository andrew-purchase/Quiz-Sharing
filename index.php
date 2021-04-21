<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quiz Me</title>
</head>
<style>
    h1{
        text-align: center;
        margin: auto;
        margin-top: 30px;
        
    }
    h4{
        padding-top: 20px;
    }
    hr{
        text-align: center;
        width: 500px;
        height: 3px;
        background-color: black;
        /* border-radius: 10px 10px 10px 10px; */
    }
    body{
        text-align: center;
        font-family: Verdana, sans-serif;
    }
    button:hover{
        background-color: rgb(20, 84, 222);
    }
    button{
        background-color: rgb(13, 126, 254); 
        width: 250px;
        border: none;
        color: white;
        padding: 15px 32px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 16px; 
        border-radius: 4px;
    }
</style>
    <body>
        <h1>Quiz Me</h1>
        <hr>
        <p><a href="new-quiz.html">Create New Quiz</a></p>
        <h4>Choose one of the following:</h4>
    </body>
    <?php
    $conn = mysqli_connect("localhost:3306", "root", "", "Quiz_Sharing") or die("Connection failed: " . mysqli_connect_error());

    $sql = "select id, quiz_name from Quiz order by id desc";
    $result = $conn->query($sql);

    while($row = mysqli_fetch_assoc($result)){
        echo "<form action='take_quiz.php'>
       <p> <button type='submit' name='" . $row["id"] . "'>" . $row["quiz_name"] . "</button> </p>
        </form>";
    }
    ?>
    <script>

    </script>
</html>
