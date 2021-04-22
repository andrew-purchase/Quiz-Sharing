<html>
<link rel="stylesheet" href="styles.css">
    <style>
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
        p{
            font-weight: bold;
        }
    </style>
    <body>
    <form action="quiz_results.php">
    <?php
    $conn = mysqli_connect("localhost:1000", "root", "root", "dbs") or die("Connection failed: " . mysqli_connect_error());        $id = key($_REQUEST);
        $sql = "select quiz_creator from Quiz where id=$id";
        $data = $conn->query($sql);

        $creator = array_values(mysqli_fetch_assoc($data))[0];

        $sql2 = "select quiz_name from Quiz where id =$id";
        $data2 = $conn->query($sql2);

        $quizName = array_values(mysqli_fetch_assoc($data2))[0];


        echo "<h2>$quizName </h2><hr>
                <h4>Created by: $creator</h4>
                <input type='hidden' name='id' value='$id'>
        ";

        $sql = "select question_string from Question where quiz_id=$id";
        $question_data = $conn->query($sql);
        
        $i = 0;
        //print questions
        while($row = mysqli_fetch_assoc($question_data)){
            $i++;
            echo "<p>"; printf($row["question_string"] . "<br>"); echo "</p>";
            $sql = "select answer_string from Answer where question_id='quiz$id" . "qstn" . $i . "'";
            $answer_data = $conn->query($sql);
            //print answers and checkboxes
            $j = 0;
            while($row2 = mysqli_fetch_assoc($answer_data)){
                $j++;
                echo "<input type='checkbox' class='input input1' name='quiz" . $id . "qstn$i" . "a$j'>";
                printf("  " . $row2["answer_string"]);
                echo "<br>";
                // echo "<input type='checkbox' name='quiz" . $id . "qstn$i" . "a$j'><br>";
            }
            printf("<br>");
        }
    ?>
    <input type="submit" value="Submit Quiz" class = 'submit'>
    </form>
    </body>
</html>