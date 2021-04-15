<html>
    <form action="quiz_results.php">
    <?php
        $conn = mysqli_connect("localhost:1000", "root", "root", "deleteThis") or die("Connection failed: " . mysqli_connect_error());  
        $id = key($_REQUEST);
        $sql = "select quiz_creator from Quiz where id=$id";
        $data = $conn->query($sql);


        $creator = array_values(mysqli_fetch_assoc($data))[0];


        echo "<h3>Title:</h3>
                <h4>Created by: $creator</h4>
                <input type='hidden' name='id' value='$id'>
        ";

        $sql = "select question_string from Question where quiz_id=$id";
        $question_data = $conn->query($sql);
        
        $i = 0;
        //print questions
        while($row = mysqli_fetch_assoc($question_data)){
            $i++;
            printf($row["question_string"] . "<br>");
            $sql = "select answer_string from Answer where question_id='quiz$id" . "qstn" . $i . "'";
            $answer_data = $conn->query($sql);
            //print answers and checkboxes
            $j = 0;
            while($row2 = mysqli_fetch_assoc($answer_data)){
                $j++;
                printf($row2["answer_string"]);
                echo "<input type='checkbox' name='quiz" . $id . "qstn$i" . "a$j'><br>";
            }
            printf("<br>");
        }
    ?>
    <input type="submit" value="Submit Quiz">
    </form>
</html>