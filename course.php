<?php 
include('header_student.php');
include('services.php');

$courseId = $_GET['id'];
$connection = new mysqli('localhost','root','','thazinschool');

$result = $connection->query("SELECT * from course where course_id = " . $courseId);
$row = $result->fetch_assoc();

$weeks =  getWeeks($courseId);

$teacher = getTeacherName($row['teacher_id']);
//print_r($teacher);
 
?>


<div class="container-fluid bg-white pt-4">
<div class="container pt-4">
    <h1 class="card-title"><?php echo $row['course_name'];?></h1>
    <a href="questions.php?course_id=<?php echo $courseId; ?>"class="btn btn-primary" style="float: right;">Enroll Now</a>
    <p><?php echo $row['description'];?></p>
    <p>Teacher Name: <a href="teacher_profile.php?teacher_id=<?php echo $teacher['teacher_id']; ?>"><?php echo $teacher['teacher_name']; ?></a></p>

        <div class="accordion" id="accordionExample">
            <?php foreach($weeks as $week): ?>   

            <?php //print_r($week); ?>         

            <div class="card">
                <div class="card-header" id="heading-<?php echo $week->number;?>">
                <h2 class="mb-0">
                    <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapse-<?php echo $week->number;?>" aria-expanded="true" aria-controls="collapseOne">
                    Week <?php echo $week->number; ?> -  <?php echo $week->description; ?>
                    </button>
                </h2>
                </div>

                <div id="collapse-<?php echo $week->number;?>" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                <div class="card-body">
                    <?php foreach($week->sections as $section): ?>  
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col"><?php echo $section->title; ?></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <?php foreach($section->contents as $content): ?>
                                    <td><a class="nav-link active" href="content.php?id=<?php echo $content->id; ?>"><?php echo $content->title; ?>
                                    <?php
                                        //$_SESSION['free'] = $content->free;
                                        if(($content->free) == "true")
                                        {
                                            ?><span class="badge badge-success">Free</span><?php
                                        }
                                        //echo $_SESSION['free'];
                                    ?>
                                    </a></td>
                                </tr>
                            <?php endforeach;?>   
                            </tbody>
                        </table>  
                    <?php endforeach;?>   
                </div>
                </div>
            </div>
            <?php endforeach;?>   
        </div>
        <div class= " p-4">
           
            <a href="questions.php?course_id=<?php echo $courseId; ?>"class="btn btn-primary">Questions</a>
        </div>
                                    </div>
     
</div>

</div>


