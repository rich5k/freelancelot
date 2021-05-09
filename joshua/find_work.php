<!DOCTYPE html>
<html lang="en">
    <head>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
        <link rel="stylesheet" href="find_work.css">
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Find a job</title>
    </head>
    <body>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script></body>
        <script type="text/javascript" src="../student/app.js"></script>
        <?php
            include_once ("../header.php");
        ?>
        <div class="jumbotron jumbotron-fluid">
            <div class="container">
                <h1 class="display-4">Find jobs available to you here!</h1>
                <p class="lead">
                    You can apply for one of the jobs listed below              
                </p>
            </div>
        </div>
        // List of cards representing jobs
        <div class="row job-list d-flex justify-content-around flex-wrap">
            <?php
                $html="";
                // $orgs = new Organization();
                // $projs_data= $orgs->getAllProjects();
                // Test values
                $a = array("title"=>"Dish washing","projectID"=>24, "weekly_rate"=>55, "hourly_rate"=>4, "type"=>"Paid", "time_created"=>"14:23 PM 23/03/21","duration"=>"3 months", "short_description"=>"wash", "location"=>"Tatooine", "required_skills"=>"Must be friendly, good vibes needed");
                $projs_data = [$a, $a, $a, $a, $a, $a];
                if(count($projs_data)>0){
                        foreach ($projs_data as $proj) {
                            # A card for each job listing
                            if(is_null($proj["hourly_rate"]) && is_null($proj["weekly_rate"])){
                                $rate = "Not available";  
                            }else{
                                $rate = (is_null($proj["hourly_rate"]) ) ? $proj["weekly_rate"] : $proj["hourly_rate"];
                            }
                            $html.=
                            "
                            <div data-job-id='".$proj["projectID"]."' class='card'>
                                <div class='card-header'>
                                    ".$proj["title"]."
                                </div>
                                <div class='card-body'>
                                    <p class='card-text'>Date posted".$proj["time_created"]."</p>
                                    <p class='card-text'>Type: ".$proj["type"]."</p>
                                    <p class='card-text'>Rate: ".$rate."</p>
                                    <p class='card-text'>Duration: ".$proj["duration"]."</p>
                                    <p class='card-text'>Desription: ".$proj["short_description"]."</p>
                                    <p class='card-text'>Location: ".$proj["location"]."</p>
                                    <p class='card-text'>Skills needed: ".$proj["required_skills"]."</p>
                                    <button class='btn btn-outline-warning btn-job-details'>Read more</button>

                                </div>
                            </div>
                            ";
                        }
                        
                        // Each card/job
                        // foreach ($projs_data as $proj) {
                        //     # A card for each job listing
                        //     if(is_null($proj->hourly_rate) && is_null($proj->weekly_rate)){
                        //         $rate = "Not available";  
                        //     }else{
                        //         $rate = (is_null($proj->hourly_rate) ) ? $proj->weekly_rate : $proj->hourly_rate;
                        //     }
                        //     $html.=
                        //     "
                        //     <div data-job-id='$proj->projectID' class='card'>
                        //         <div class='card-header'>
                        //             Project title $proj->title$
                        //         </div>
                        //         <div class='card-body'>
                        //             <h5 class='card-title'>Time posted".$proj->time_created."</h5>
                        //             <p class='card-text'>".$proj->type."</p>
                        //             <p class='card-text'>".$rate."</p>
                        //             <p class='card-text'>".$proj->duration."</p>
                        //             <p class='card-text'>".$proj->short_description."</p>
                        //             <p class='card-text'>".$proj->$duration."</p>
                        //             <p class='card-text'>".$proj->$location."</p>
                        //             <p class='card-text'>".$proj->$required_skills."</p>
                        //             <button class='btn btn-outline-success btn-job-details'>Read more</button>
                        //         </div>
                        //     </div>
                        //     ";
                        // }
                    }else{
                        $html.="<p>No jobs found</p>";
                    }
                    echo $html;

                ?>
            </div>
    <?php
        include_once ("../footer.php");
    ?>
    </body>
</html>


