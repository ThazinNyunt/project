<?php

$data = $_POST;

$num = count($data);
$result = 0;
while ($num > 0) 
{
    $user_answer = $data[$num]['user_answer'];
    $correct_answer = $data[$num]['correct_answer'];
    if($user_answer == $correct_answer)
    
    { 
        $result++; 
    } 
    $num--;
}
echo $date =date('d-M-Y');

$row = insertExamRecord(3,1,$result,$date);

if(isset($row))
{
    echo "success";
}

$percentage = ($result*100)/count($data);
?>
<div align="center">
    <?php if($percentage>=50)
            {
                echo "<h1>Pass</h1>";
            }
            else
            {
                echo "<h1>Fail</h1>";
            }
    ?>
    <br>
    <p>Your Result: <?php echo $result; ?>/<?php echo count($data);?></p>
    
    <br>
    <button type="submit" class="btn btn-primary">Download the certificate</button>
</div>