<!-- 
User is routed to this page from find_work.php after
clicking on a read more button for one of the jobs. 
Page shows more information about job
 -->
<!DOCTYPE html>
<html lang="en">
    <head>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
        <link rel="stylesheet" href="find_work.css">
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Job Details</title>
    </head>
    <body>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>
        <script type="text/javascript" src="../student/app.js"></script>

        <?php
            include_once ("../header.php");

            if(isset($_SESSION["detail_id"])){
                // Get job and organization info 

                // $employer= new Organization();
                // $job = ['projectID'=>$job_id];
                // $job_data= $employer->getProject($job);
                // $data = $employer->getOrgProj($job);
                // $org=['organID'=>$data->organID];
                // $org_data1 = $employer->getOrgDetails($org);
                // $org_data2 = $employer->getOrgInfo($org);

            }else{
                // Navigate away if id is not set
                $id=$_SESSION["detail_id"];
                // header("location: ../controller/logged_out.php");
            }
            // Test values
            $user_id = 2;
            $job_id = 24;
            $job_data = array("title"=>"Dish washing","projectID"=>24, "weekly_rate"=>55, "hourly_rate"=>4, "type"=>"Paid", "time_created"=>"14:23 PM 23/03/21","duration"=>"3 months", "description"=>"wash", "location"=>"Tatooine", "required_skills"=>"Must be friendly, good vibes needed");
            $org_data = array("name"=>"Uber", "bio"=>"We love to make food and wash dishes", "website"=>"www.danielcraig.com", "location"=>"Tatooine");


        ?>

        <div class="container-fluid" >
            <div class="row">
                <div class="col-sm-12  back-button">
                    <a  href="../student/find_work.php">
                        <h2><i width ="80" height="80" class="bi bi-arrow-left-square text-warning"></i></h2>
                    </a>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-9 d-flex flex-column justify-content-around align-items-start">
                    <div class="shadow-sm card border-warning" style="width: 100%;">
                        <div class="card-body">
                            <h5 class="card-title">Job details</h5>
                            <h6 class="card-subtitle mb-2 text-muted"><?php echo $job_data["title"]; ?></h6>
                            <div class="d-flex justify-content-between">
                                <p class="card-subtitle mb-2 text-muted">Location:<?php echo $job_data["location"];?> </p>
                                <p class="card-subtitle mb-2 text-muted"><?php echo $job_data["time_created"];?> </p>
                            </div>
                            <p class="card-subtitle mb-2 text-muted">Type:<?php echo $job_data["type"];?> </p>
                            <h6 class="card-subtitle text-muted">Description</h6>
                            <p class="card-text"><?php echo $job_data["description"]?></p>
                            <div class="d-flex justify-content-start">
                                <h6 class="card-link text-muted">Hourly rate $<?php echo $job_data["hourly_rate"]?></h6>
                                <h6 class="card-link text-muted">weekly rate $<?php echo $job_data["weekly_rate"]?></h6>
                            </div>
                        </div>
                    </div>
                    <div class="shadow-sm card border-warning" style="width: 50%;">
                        <div class="card-body">
                            <h6 class="card-subtitle mb-2 text-muted">
                                Required skills
                            </h6>
                            <p class="card-text">
                               <?php echo $job_data["required_skills"];?>
                            </p>
                        </div>
                    </div>
                </div>

                <div class="col-sm-3">
                    <div class="apply-group">
                        <button class="btn btn-block btn-warning student-apply" data-toggle="modal" data-target="#apply-form">
                            Apply
                        </button>
                    </div>

                    <?php
                        $html=
                        "<div class='card' style='width: 18rem;'>
                            <div class='shadow-sm card-body'>
                                <h5 class='card-title'>About employer</h5>
                                <p class='card-text'>
                                <p class='card-text'>Employer: ".$org_data["name"]."</p>
                                <p class='card-text'>Bio: ".$org_data["bio"]."</p>
                                <p class='card-text'>Location: ".$org_data["location"]."</p>
                                <p class='card-text'>Website: ".$org_data["website"]."</p>
                            </div>
                        </div>";

                        echo $html;
                    ?>
                </div>
            </div>
        </div>

        <?php
            include_once ("../footer.php");
        ?>
    <!-- Modal used to fill out proposal  -->
    <div class="modal fade" id="apply-form" tabindex="-1" aria-labelledby="applicationForm" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Apply for this opportunity</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="apply.php">
                        <div class="form-group apply-input">
                            <label for="cover">You can put your cover letter here</label>
                            <textarea class="form-control" id="cover" rows="9"></textarea>
                        </div>
                        <div class="form-group apply-input">
                            <label for="attachments">Upload any other attachments</label>
                            <input type="file" class="form-control-file" id="attachments">
                        </div>
                        <div class="form-group">
                            <label for="notes">Any additional notes or comments</label>
                            <textarea class="form-control" id="notes" rows="3"></textarea>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Close</button>
                    <button type="button" id="btn-apply" class="btn btn-primary">Apply</button>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Toast to notify user that submission was successful -->
    <div class="toast" id="toast-save" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="toast-header">
                <strong class="mr-auto">Save</strong>
                <small class="text-muted"></small>
                <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="toast-body">
                Application submitted successfully
            </div>
    </div>

    </body>
</html>