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
    <h4>login checking</h4>
    <?php

        //prints everything
       print_r($_REQUEST);
       printf("<br><br><br>");

       //prints the name
        print_r($_REQUEST["name"]);
       printf("<br><br>");


        //prints all the questions
        $i = 1;
        while(!empty($_REQUEST["qstn#" . $i])) {
            print_r($_REQUEST["qstn#" . $i]);
            printf("<br>");
            //prints answers for each question
            $j=1;
            while(!empty($_REQUEST["qstn#" . $i . "ans" . $j])) {
                print_r($_REQUEST["qstn#" . $i . "ans" . $j]);
                printf("<br>");
                $j++;
            }
            $i++;
            printf("<br><br>");
       }
       
    ?>
    <script>
        //redirect to the homepage
    </script>
</body>
</html>