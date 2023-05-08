<?php
require("storeDB.php");
session_start();
$asker = $_SESSION['user'];
if(isset($_POST['submit'])){
    $question = $_POST['question'];
    $answer = NULL;
    $date_created = date('d/m/Y');
    $date_updated = NULL;
    $answerer = NULL;
    $insert_query = "INSERT INTO faq(question,answer,date_created,date_updated,asker,answerer) VALUES('$question','$answer','$date_created',
    '$date_updated','$asker','$answerer')";
    
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
                <textarea id="answer" name="answer" readonly></textarea>
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
                        if($answers == null && $answerers == null){
                            $answers="This question hasn't gotten a response yet!";
                            $answerers="No Admin has answered yet";
                        }
                        echo '<h2>General Questions </h2>
                        <div class="question">
                        <h3>'.$questions.'</h3>
                        <h4>Question by:'.$askers.'</h4>
                        <p>'.$answers.'</p>
                        <h4>Answered by: '.$answerers.'</h4><br>
                        
                        </div>';
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

<script>
window.addEventListener("load",function(){
    $("answer").richText();
});
</script>
</html>

