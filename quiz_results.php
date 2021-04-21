<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
        body{
            text-align: center;
            font-family: Verdana, sans-serif;
        }
        .submit:hover{
            background-color: rgb(20, 84, 222);
        }
        .submit{
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
    <?php
        $answers = array();
        $answer_key = array();
        foreach($_REQUEST as $key => $val)
            if($val == 'on')
                array_push($answers, $key);
                $conn = mysqli_connect("localhost:3306", "root", "", "Quiz_Sharing") or die("Connection failed: " . mysqli_connect_error());
        //compare results
        $sql = "select id from Answer where isAnswer = 1 and quiz_id=" . $_REQUEST["id"] . ";";
        $result = $conn->query($sql);
        while($row = mysqli_fetch_assoc($result))
            array_push($answer_key, $row["id"]);
        $result=array_intersect($answer_key,$answers);

        //calculate score
        $points = count($result) * 10;

        //check if highest score
        $sql = "select score, usrname from High_Score where quiz_id = " . $_REQUEST["id"] . " order by score desc limit 1;";
        // var_dump($sql);
        $r = $conn->query($sql);
        $values = $r->fetch_assoc();
        $high_score = $values["score"];
        $high_name = $values["usrname"];

        echo "<h2>Quiz Results</h2>";

        // var_dump($high_score);
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            if($points >= $high_score){
                echo "<br>";
                echo "Congratulations! You got the highest score!<br><br>
                <form action=''method='post'>
                <label>Your name <input type='text' name='usrname' id='usrname'></label>
                <input type='hidden' id='id' name='hidden' value='" . $_REQUEST["id"] . "'>
                <br><br><input type='submit' class = 'submit' name='enter'></button>
                </form>";
            }
            else{
                echo "<br>High Score:<br>" . $high_name . ": " . $high_score . "<br>";
                echo "<p><a href='index.php'>Take another quiz</a></p>";
            }
        }

        echo "<br>You scored " . count($result) . "/" . count($answer_key) . " and got $points points!";
        //show high scores
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            //update high score
            $sql = "update High_Score set score = $points, usrname = '" . $_REQUEST["usrname"] . "' where quiz_id = " . $_REQUEST["id"];
            $conn->query($sql);
            echo "<br>High Score:<br>" . $_REQUEST["usrname"] . ": " . $points . " pts";
            echo "<p><a href='index.php'>Take another quiz</a></p>";
        }
    ?>
</body>
</html>
