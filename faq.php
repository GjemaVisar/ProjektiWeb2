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
    <!-- <link rel="stylesheet" href="admin/admin.css" type="text/css"/> -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        .logo{
            margin: 0px;
            margin-left: 28px;
            font-weight: bold;
            color: white;
            margin-bottom: 30px;
        }
        .logo span{
            color: #f7403b;
        }
        .sidenav {
        height: 100%;
        width: 300px;
        position: fixed;
        z-index: 1;
        top: 0;
        left: 0;
        background-color: #272c4a;
        overflow: hidden;
        transition: 0.5s;
        padding-top: 30px;
      }
      .sidenav a {
        padding: 15px 8px 15px 32px;
        text-decoration: none;
        font-size: 20px;
        color: #818181;
        display: block;
        transition: 0.3s;
      }
      .sidenav a:hover {
        color: #f1f1f1;
        background-color:#1b203d;
      }
      .sidenav{
        position: absolute;
        top: 0;
        right: 25px;
        font-size: 36px;
      }   
      main, header {
        margin-left: 300px; /* Adjust the margin value to match the width of the navigation bar */
    }
    </style>

    <!-- <style>
    nav {
        position: fixed;
        top: 0;
        left: 0;
        width: 200px;
        height: 100vh;
        background-color: #f1f1f1;
        text-align: center;
        display: flex;
        flex-direction: column;
        justify-content: center;
    }

    main, header {
        margin-left: 200px; /* Adjust the margin value to match the width of the navigation bar */
    } -->
</style>
</head>
<body>
    <header>
        <h1 align="center">FAQ</h1>
    </header>
    
    <nav>
        <div id="mySidenav" class="sidenav">
            <p class="logo"><span>Gamics</span></p>
    
            <a href="admin/user.php"class="icon-a"><i class="fa fa-users icons"></i> &nbsp;&nbsp;Users</a>
            <a href="admin/admins.php"class="icon-a"><i class="fa fa-lock" aria-hidden="true"></i> &nbsp;&nbsp;Admins</a>
            <a href="admin/"class="icon-a"><i class="fa fa-user icons"></i> &nbsp;&nbsp;Products</a>
            <a href="faq.php"class="icon-a"><i class="fa fa-list-alt icons"></i> &nbsp;&nbsp;Faq</a>
        </div>
    </nav>
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
