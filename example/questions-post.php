<pre>
<?php
print_r($_POST);
?>
</pre>

<h1>
    Course Id : <?php echo $_POST['course_id']?>
</h1>
<h1>
    User Id : <?php echo $_POST['user_id']?>
</h1>
<h1>
    Question Count: <?php echo count($_POST['question'])?>
</h1>

<?php $questions = $_POST['question']; ?>

<?php foreach($questions as $index => $question): ?>

<?php 
print_r($index)
?>

<?php endforeach; ?>