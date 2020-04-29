<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<?php
$rows = [];
$rows[] = [
    "question_id" => 1,
    "question_text" => "Who is the current president of USA?",
    "answer1" => "Clinton",
    "answer2" => "Obama",
    "answer3" => "Trump",
    "answer4" => "Bush",
    "correct_answer" => 3
];

$rows[] = [
    "question_id" => 2,
    "question_text" => "What is the color of sky?",
    "answer1" => "Red",
    "answer2" => "Green",
    "answer3" => "Yellow",
    "answer4" => "Blue",
    "correct_answer" => 4
];
?>

<form method="POST" action="questions-post.php">
    <?php foreach($rows as $row): ?>
        <div >
            Q: <b><?php echo $row['question_text'];?></b><br>
            <?php 
                $answers = Array(
                    1 => $row['answer1'],
                    2 => $row['answer2'],
                    3 => $row['answer3'],
                    4 => $row['answer4']
                );
            ?>
            <input type="hidden" name="<?php echo $row['question_id'];?>[correct_answer]" 
                value="<?php echo $row["correct_answer"] ?>">
            <?php for($i=1; $i<5; $i++): ?>
                    <div>
                        <input type="radio" 
                            name="<?php echo $row['question_id'];?>[user_answer]" value="<?php echo $i; ?>">
                        <?php echo $answers[$i]; ?>
                    </div>      
            <?php endfor;?>           
        </div>
        <br>
    <?php endforeach; ?>
    <button type="submit">Submit</button>
</form>        


</body>
</html>
