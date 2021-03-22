<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:300,300italic,700,700italic">
    <link rel="stylesheet" href="http://cdn.rawgit.com/necolas/normalize.css/master/normalize.css">
    <link rel="stylesheet" href="http://cdn.rawgit.com/milligram/milligram/master/dist/milligram.min.css">
    <link rel="stylesheet" href="goals.css" />
    <title>Goal Tracker</title>
</head>
<body>
    <div id="container">
        <h1>New Goal</h1>
        <form action="insert_goal.php" method="POST">
            <label for="cat">Category</label>
            <select name="cat" id="cat">
                <option value="0">Personal</option>
                <option value="1">Professional</option>
                <option value="2">Other</option>
            </select>
            <label for="text">Goal</label>
            <textarea name="text" id="text"></textarea>
            <label for="goaldata">Data</label>
            <input type="date" id="goaldata" name="goaldate" />
            <label for="complete">Goal Completed</label>
            <input type="checkbox" id="complete" name="complete" value="1" /><br/>
            <button type="submit">Submit Goal</button>
        </form>
        <?php
        require_once 'connect.php';
        $sql = "SELECT * from goals";
        $result = mysqli_query($link, $sql) or die($mysqli_error($link));
        print("<h2>Incomplete Goals</h2>");

        //Incomplete Goals
        while($row = mysqli_fetch_array($result)){
            if($row['goal_complete']== 0){
                    if($row['goal_complete']==0){

                            $cat = "Profesonal";
                    }
                    elseif ($row['goal_category'==1]){
                        $cat ="Professional";

                    } else{
                        $cat ="Other";
                    }

                    echo "<div class='goal'>";
                    echo "<a href='complete.php?id=" . $row['goal_id'] . "'><button class='btnComplete'>Complete</button></a><strong>";
                    echo $cat . "</strong><p>" . $row['goal_text'] . "</p>Goal Date: " . $row['goal_date'];
                    echo "</div>";
                    }

            }

            //Completed Goals
            print("<h2>Complete Goals</h2>");
            $result = mysqli_query($link, $sql) or die(mysqli_error($link));

            while($row = mysqli_fetch_array($result)){
                if($row['goal_complete'] !=0){
                    $cat = "Personal";
                } else if($row['goal_category' == 1]){
                    $cat = "Professional";
                } else{
                    $cat = "Other";
                }
                echo "<div class='goal'>";
                echo "<a href='delete.php?id=" . $row['goal_id'] . "'><button class='btnDelete'>Delete</button></a><strong>";
                echo $cat . "<strong><p>" . $row['goal_text'] . "<p>Goal Date: " . $row['goal_date'];
                echo "</div>";
            }
        

            ?>
    
</body>
</html>