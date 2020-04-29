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
    "answer4" => "Bush"
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
            <?php for($i=1; $i<5; $i++): ?>
                    <div>
                        <input type="radio" 
                            name="<?php echo $row['question_id'];?>" value="<?php echo $i; ?>">
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
