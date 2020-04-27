<?php
include('header_student.php');       
include('services.php');
include('form_library.php');

$courseId =$_GET['course_id'];
$rows = getQuestion($courseId);
//print_r($rows);

?>
<div class="container bg-white">

<h1 align="center">Questions</h1>
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
                    <input type="radio" class="form-control"
                        name="question-<?php echo $row['question_id'];?>" value="<?php echo $i; ?>">
                    <?php echo $answers[$i]; ?>
                </div>      
        <?php endfor;?>           
    </div>
    <br>
<?php endforeach; ?>
Total Question: <?php echo count($rows); ?>
</div>

