<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
    </style>
</head>
<body>
    <h4>Your quiz has been created!</h4>
    just a moment...
    <?php 

$conn = mysqli_connect("localhost:3306", "root", "", "Quiz_Sharing") or die("Connection failed: " . mysqli_connect_error());
//sql statement to find maximum quiz id in database, then +1 to create an unused quiz id
$sql = "select id from Quiz order by id desc limit 1;";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$quiz_id= $row["id"] + 1;

//now create new quiz object using quiz_id and name
$sql = "insert into Quiz values($quiz_id, '" . $_REQUEST["name"]. "');";
$conn->query($sql);


        //prints everything
        //print_r($_REQUEST);


        //prints all the questions
        $i = 1;
        while(!empty($_REQUEST["qstn#" . $i])) {
            // print_r($_REQUEST["qstn#" . $i]);
            // printf("<br>");
            $sql = "INSERT INTO Question VALUES ('quiz" . $quiz_id . "qstn" . $i . "','" .  $_REQUEST["qstn#" . $i]. "'," . $quiz_id .");";
            $conn->query($sql);
            //prints answers for each question
            $j=1;
            while(!empty($_REQUEST["qstn#" . $i . "ans" . $j])) {
                // print_r($_REQUEST["qstn#" . $i . "ans" . $j]);
                if(isset($_REQUEST["qstn#" . $i . "ans" . $j . "cb"]))  //checklists are boolean values (0 | 1)
                    $b = 1;
                else $b = 0;
                $sql = "INSERT INTO Answer VALUES('quiz$quiz_id" . "qstn$i" . "a$j" . "', '" . $_REQUEST["qstn#" . $i . "ans" . $j]. "'," . $b . ", 'quiz" . $quiz_id . "qstn$i'" . ",$quiz_id);";
                $conn->query($sql);
                $j++;
            }
            $i++;
       }
       $sql = "INSERT INTO High_Score VALUES ('empty', 0, " . $quiz_id . ");";
       $conn->query($sql);
       mysqli_close($conn);
    //    echo '<script type="text/javascript">someFunction();</script>'; 
    echo "<script>setTimeout(function() {window.location.replace('/quiz_project')}, 2000);</script>";
    ?>
</body>
</html>
