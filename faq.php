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
        <section class="faq">
            <h2>General Questions</h2>
            <div class="question">
                <h3>What is the best-selling game console of all time?</h3>
                <p>The best-selling game console of all time is the PS2, clocking in at 159 million units sold worldwide. </p>
            </div>
            <div class="question">
                <h3>What is the most-played video game of all time?</h3>
                <p>The most-played video game on record is Fortnite, 3.8 million game plays.</p>
            </div>
            <div class="question">
                <h3>Roughly how many people play Roblox each month?</h3>
                <p>Roblox attracts about 150 million monthly players. </p>
            </div>
        </section>
        <section class="faq">
            <h2>Technical Questions</h2>
            <div class="question">
                <h3>What is “Pixel Art”?</h3>
                <p>A digital art which is created by drawing individual pixels in an image rather than rendering a 3D model is known as “Pixel Art”.</p>
            </div>
            <div class="question">
                <h3>What do you mean by “Lag” ?</h3>
                    <p>In online gaming, the delay between the action of players and the response time of the server is known as ‘Lag’.</p>
            </div>
            <div class="question">
                <h3>How can you reduce game lag?</h3>
                <p>To reduce game lag you can either lower the performance setting for the game or by upgrading certain parts on your computer.</p>
            </div>
        </section>
        <section class="ask">
            <h2>Ask a Question</h2>
            <form id="question-form">
                <label for="name">Name:</label>
                <input type="text" id="name" name="name" required>
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>
                <label for="question">Question:</label>
                <textarea id="question" name="question" required></textarea>
                <input type="submit" name="Submit1" value="Submit">
            </form>
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
