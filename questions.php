<?php
include('header_student.php');       
include('services.php');
include('form_library.php');

$courseId =$_GET['course_id'];
$rows = getQuestion($courseId);
//print_r($rows);

if(isset($_POST['btnsubmit']))
{
    $question1 = $_POST['question-1'];
    $question2 = $_POST['question-2'];

    echo $question1;
    echo $question2;
    //header("Location: checkanswer.php"); 
}

?>
<div class="container bg-white">

<h1 align="center">Questions</h1>
<p style="float: right;">Total Question: <?php echo count($rows); ?></p>
<br/>
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
                    <label class="radio-inline">
                        <input type="radio" name="question-<?php echo $row['question_id'];?>" value="<?php echo $i; ?>">
                            <?php echo $answers[$i]; ?>
                    </label>
                    
                </div>      
        <?php endfor;?>           
    </div>
    <br>
<?php endforeach; ?>
<button type="submit" name="btnsubmit" class="btn btn-primary">Check Answer</button>
</div>

