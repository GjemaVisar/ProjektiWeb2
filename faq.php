<?php
// connect with database
// $conn = new PDO("mysql:host=localhost:3307;dbname=storeDB", "admin", "admin");
// if (isset($_POST["submit"])) {
//     $sql = "CREATE TABLE IF NOT EXISTS faqs (
//         id INTEGER NOT NULL PRIMARY KEY AUTO_INCREMENT,
//         question varchar(100) NOT NULL,
//         answer varchar(100) NOT NULL,
//         created_at DATETIME DEFAULT CURRENT_TIMESTAMP
//     )";
//     $statement = $conn->prepare($sql);
//     $statement->execute();

//     $sql = "INSERT INTO faqs (question, answer) VALUES (?,?)";
//     $statement = $conn->prepare($sql);
//     $statement->execute([
//         $_POST["question"],
//         $_POST["answer"]
//     ]);
// }
require("storeDB.php");
$name = $_SESSION['admin'];
if(isset($_POST['submit'])){
    $question = $_POST['question'];
    $answer = $_POST['answer'];
    $date_created = date('d/m/Y');
    $date_updated = NULL;
    $insert_query = "INSERT INTO faq(question,answer,date_created,date_updated,asker,answerer) VALUES($question,$answer,$date_created,
    $date_updated,$name,$name)";
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
            <form id="question-form" action="">
                
                <label for="question">Question:</label>
                <textarea id="question" name="question" required></textarea>
                <label>Answer:</label>
                <textarea id="answer" name="answer" ></textarea>
                <input type="submit" name="Submit1" value="Submit">
            </form>
        </section>
        <section class="faq">
            <h2>General Questions</h2>
            <div class="question">
                <h3 >What is the best-selling game console of all time? </h3>
                <h4>Question by: </h4>
                <p>The best-selling game console of all time is the PS2, clocking in at 159 million units sold worldwide. </p>
                <h4>Answered by: </h4>
            </div>
           
        </section>
       
    </main>
    <script src="script.js"></script>
</body>
</html>

<script>
window.addEventListener("load",function(){
    $("answer").richText();
});
</script>
