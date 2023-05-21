<!DOCTYPE html>
<html>
<head>
    <title>FAQ Page</title>
    <link rel="stylesheet" type="text/css" href="faq.css">
</head>
<body>
    <header>
        <h1 align="center">FAQ</h1>
    </header>
    

    
    <?php 
        require("storeDB.php");
        session_start();
        $name = $_SESSION['admin'];
        $faq_id = $_GET['faq'];

        $query = "SELECT * FROM faq where id=$faq_id";
        $filter_admin = "SELECT name from user where role = 'admin'";

        $c = 0;
        $filter_result = mysqli_query($conn,$filter_admin);
        while($row_admin = mysqli_fetch_assoc($filter_result)){
            // add each row returned into an array
            $array[] = $row_admin;
            $c++;
          }
        
        
        if(isset($_POST['edit_faq'])){
            $result = mysqli_query($conn,$query);
            $row = mysqli_fetch_assoc($result);
            $questions = $row['question'];
            //echo $questions;
            $answers = $row['answer'];
            //echo $answers;
            $askers = $row['asker'];
            $answerers = $row['answerer'];


            $editable_question=false;
            
            for($i=0;$i<$c;$i++){
                //echo $askers;
                if(implode($array[$i])==$askers)
                {
                    $editable_question = true;
                    break;
                    
                }else{
                    $editable_question = false;
                }
            }
            //echo $editable_question;

            echo '<h2>Edit the Question </h2>
            <form method="Post" action="">
                <div class="question">
                    <h4>Old question</h4>
                    <p>'.$questions.'</p>
                    <h4>New Question</h4>';
        if($editable_question){
            echo '<input type="text" name="new_question" size="100" required>';
        }else{
            echo '<input type="text" name="new_question" size="100" readonly>';
        }

                    echo '<h4>Old answer</h4>
                    <p>'.$answers.'</p>
                    <h4>New answer</h4>
                <input type="text" name="new_answer" size="100" required>
            <br>
                <input type="submit" name="edit" value="Submit Edit">
                <<input type="submit" name="exit" value="Exit">
                </div>
            </form>';
        }
        else if(isset($_POST['edit'])){
            
            $result = mysqli_query($conn,$query);
            $row = mysqli_fetch_assoc($result);
            $questions = $row['question'];

            if($editable_question){
                $new_question = $_POST['new_question'];
            }else{
                $new_question = $questions;
            }
            $new_answer = $_POST['new_answer'];
            $new_update_date =date('d/m/Y');
            $edit_query = "UPDATE faq SET question='$new_question',answer='$new_answer',date_updated='$new_update_date',answerer='$name' WHERE id='$faq_id' ";
            if(mysqli_query($conn,$edit_query)){
                header("Location:faq.php", TRUE, 301);
            }else{
                echo "Error during editing question or answer";
            }
        }
        mysqli_close($conn);
    ?>
    
</body>
</html>