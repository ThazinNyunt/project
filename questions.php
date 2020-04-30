<?php
include('header_student.php');       
include('services.php');
include('form_library.php');

$courseId =$_GET['course_id'];
$rows = getQuestion($courseId);

if(!isset($_SESSION['user_id']) )
    {
        echo "<script>window.alert('Please login first to continue.')</script>";
        echo "<script>window.location='Login.php'</script>";
        exit();
    }
//print_r($rows);


?>
<div class="container bg-white">

<h1 align="center">Questions</h1>
<p style="float: right;">Total Question: <?php echo count($rows); ?></p>
<br/>
<form action="checkanswer.php" method="post">
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
<button type="submit" class="btn btn-primary">Check Answer</button>
</div>
</form>


