<?php
$conn = new mysqli("localhost", "kiriakow", "aBXrQBA796", "question_base");
if($conn->connect_error) {
    die("Ошибка!: " . $conn->connect_error);
}

$sql_users = "SELECT name, score FROM users";
$result_users = $conn->query($sql_users);
$array_users = $result_users->fetch_assoc();

if(isset($result_users)) {

echo "<!DOCTYPE html><html><head><title>Questions</title><meta charset='utf-8' /><meta name='viewport' content='width=device-width, initial-scale=1.0'><link rel='stylesheet' href='questions.css'></head><body>";
echo "<div class='content'><div class='tab'>";

echo "<h1 class='title'>Таблица лидеров</h1>";
echo "<div class='score_table'>";
echo "<div class='title_row'><div class='cell'>Name</div><div class='cell'>Score</div></div>";
foreach ($result_users as $row) {

    echo "<div class='row'>";
    echo "<div class='cell'>" . $row["name"] . "</div>";
    echo "<div class='cell'>" . $row["score"] . "</div>";
    echo "</div>";
}
echo "</div>";

echo "<form class='question_block' action='questions.php' method='post'>

        <div class='questions'><button type='submit' class='questions_button'>Назад</button></div>

    </form></div></div>";

echo "</body>";

}
?>