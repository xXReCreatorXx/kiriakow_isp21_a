<?php
    $conn = new mysqli("localhost", "kiriakow", "aBXrQBA796", "question_base");
    if($conn->connect_error) {
        die("Ошибка!: " . $conn->connect_error);
    }

    $sql_questions = "SELECT * FROM questions WHERE is_del = 0";
    $result_questions = $conn->query($sql_questions);

    if (isset($_POST["score"])) {
        $score = $_POST["score"];
    } else {
        $score = 0;
    }
    
    if (isset($_POST["actiwRow"])) {
        $activRow = $_POST["actiwRow"];
    } else {
        $activRow = 1;
    }

    if (isset($_POST["answer"])) {
        $userAnswer = $_POST["answer"];
        $curentAnswer = $_POST["curentAnswer"];
            if ($userAnswer == $curentAnswer) {
                $score++;
            }
    }

    $activRowNext = $activRow + 1;

    if (isset($result_questions)) {

        echo "<!DOCTYPE html><html><head><title>Questions</title><meta charset='utf-8' /><meta name='viewport' content='width=device-width, initial-scale=1.0'><link rel='stylesheet' href='questions.css'></head><body>";
         
        //-----------------------------------------------

        if (isset($_POST["userName"]) && $_POST["userName"] != "") {

            $userName = $_POST["userName"];

            $rowsCount = $result_questions->num_rows;
            $rowNum = 1;

            foreach($result_questions as $row){

                if ($activRow == $rowNum) {

                    $answer = $row["answer"];

                    echo "<div class='content'><div class='question'><div class='header'>";

                        echo "
                        <form class='back' action='' method='post'>
                            
                            <button type='submit' class='back_button' name='userName' value=''><img src='svg/Close.svg'/></button>

                        </form>
                        ";

                        if($rowNum < 10) echo "<div class='header_number'>0$rowNum</div>"; else echo "<div class='header_number'>$rowNum</div>";

                        echo "<div class='score_block'>
                            <img class='svg' src='svg/Heart.svg'/>
                            <div class='score'>" . $score . "</div>
                            </div>
                        </div>";
                    
                        echo "<div class='question_image'><img class='image' src='" . $row["image"] . "'></div>";

                        echo "<div class='question_title_block'><div class='question_number'>Вопрос $rowNum из $rowsCount</div>";
                        echo "<div class='question_title'>" . $row["title"] . "</div></div>";

                        echo "<form class='question_block' action='' method='post'>

                                <input type='hidden' name='actiwRow' value='" . $activRowNext . "' />
                                <input type='hidden' name='score' value='" . $score . "' />
                                <input type='hidden' name='curentAnswer' value='" . $answer . "' />
                                <input type='hidden' name='userName' value='" . $userName . "' />
                                <div class='questions'><button type='submit' class='questions_button' name='answer' value='1'>" . $row["question_1"] . "</button></div>
                                <div class='questions'><button type='submit' class='questions_button' name='answer' value='2'>" . $row["question_2"] . "</button></div>
                                <div class='questions'><button type='submit' class='questions_button' name='answer' value='3'>" . $row["question_3"] . "</button></div>
                                <div class='questions'><button type='submit' class='questions_button' name='answer' value='4'>" . $row["question_4"] . "</button></div>
                    
                            </form>";

                    echo "</div></div>";

                }

                $rowNum++;
            }

            if ($activRow > $rowsCount) {
                $sqlUserInsert = "INSERT INTO users SET name = '$userName'";
                $conn->query($sqlUserInsert);
                $updateScoreSql = "UPDATE users SET score = $score WHERE name = '$userName'";
                $conn->query($updateScoreSql);
                header("Location: score_tab.php");
            }

        } else {

            echo "
            <div class='container_reg'>
                <div class='reg'>
                        <form class='user_form' action='' method='post'>

                            <input class='user_form_input' type='text' name='userName' placeholder='Введите имя пользователя'/>
                            
                            <button type='submit' class='user_form_button'>Продолжить</button>

                        </form>

                        <div class='conteiner_menu'>
                            <form class='user_form' action='score_tab.php' method='post'>
                                
                                <button type='submit' class='user_form_button'>Таблица лидеров</button>

                            </form>

                            <form class='user_form' action='../../index.php' method='post'>
                                
                                <button type='submit' class='user_form_button'>Главная страница</button>

                            </form>
                        </div>
                </div>
            </div>";

        }

        //-----------------------------------------------
        
        echo '</body></html>';

    } else {
        echo "Ошибка!: " . $conn->error;
    }
    
    $conn->close();
?>