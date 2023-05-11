<?php
require("storeDB.php");
session_start();
$name = $_SESSION['admin'];
if(isset($_POST['submit'])){
    $question = $_POST['question'];
    $answer = $_POST['answer'];
    $date_created = date('d/m/Y');
    $date_updated = NULL;
    $insert_query = "INSERT INTO faq(question,answer,date_created,date_updated,asker,answerer) VALUES('$question','$answer','$date_created',
    '$date_updated','$name','$name')";
    
    if(mysqli_query($conn,$insert_query)){
       #echo "Right";
    }
    else{
        #echo "problem adding";}
}
}
?>
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
    <main>
        <section class="ask">
            <h2>Ask a Question</h2>
            <form id="question-form" action="" method="Post">
                
                <label for="question">Question:</label>
                <textarea id="question" name="question" required></textarea>
                <label>Answer:</label>
                <textarea id="answer" name="answer" ></textarea>
                <input type="submit" name="submit" value="Submit">
            </form>
        </section>
        <section class="faq">
            <?php
                $get_faq = "SELECT * FROM faq";
                $result = mysqli_query($conn,$get_faq);
                if(mysqli_num_rows($result)>0){
                    while($row = mysqli_fetch_assoc($result)){
                        $id = $row['id'];
                        $questions = $row['question'];
                        $answers = $row['answer'];
                        $askers = $row['asker'];
                        $answerers = $row['answerer'];
                        echo '<h2>General Questions </h2>
                        <div class="question">
                        <h3>'.$questions.'</h3>
                        <h4>Question by:'.$askers.'</h4>
                        <p>'.$answers.'</p>
                        <h4>Answered by: '.$answerers.'</h4><br>
                        
                        <form action="?faq='.$id.'" method="Post">
                        <input type="submit" name="delete_faq" value="Delete FAQ">
                        </form>

                        <form action="faq-edit.php?faq='.$id.'" method="Post">
                        <input type="submit" value="Edit FAQ" name="edit_faq">
                        </form>
                        </div>';
                    }
                } 
                
               
               if(isset($_POST['delete_faq'])){
                $faq_id = $_GET['faq'];
                #echo $faq_id;
                $delete_query = "DELETE FROM faq WHERE id=$faq_id";
                   if(mysqli_query($conn,$delete_query)){
                    header("Location: faq.php");
                   }else{
                    echo "Deletion not OK";
                   }
               }
               
            ?>
           
           
        </section>
       <script>
        if ( window.history.replaceState ) {
            window.history.replaceState( null, null, window.location.href );
        }
       </script>
    </main>
    <script src="script.js"></script>
</body>
</html>

<script>
window.addEventListener("load",function(){
    $("answer").richText();
});
</script>
