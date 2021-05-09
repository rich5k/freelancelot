function send_detail_id(id){
    $.post("../student/job_details.php", { detail_id : id});
}

$(document).ready(function(){
    
    // Handles when a job card is clicked on
    // Shows page with job details where  
    // application can be submitted
    $(".btn-job-details").on("click", function(){
        var card_id = $(this).parent().parent().data("job-id");
        console.log("Card id:"+card_id);
        // send_detail_id(card_id);
        sessionStorage.setItem("detail_id", card_id);
        window.location.href="job_details.php";
    });


    // Handles submit event for when job applicaion
    // form is filled
    $("#btn-apply").on("click", function(){
        // get fields data
        var cover_letter = $("#cover").val();
        var attachments = $("#attachments").val();
        var notes = $("#notes").val();

        // submit data
        $.post("save_application.php",
        {
            cover_apply: cover_letter,
            attachments: attachments,
            add_notes: notes
        }
        ,function(data, status){
            // Indicate successful submission
            if(status=="success"){
                setTimeout(function(){
                    $("#apply-form").modal("toggle");
                    $("#toast-save").toast("show");
                    $(".apply-group").html("<p><i class='bi bi-check-circle text-success'></i>Application submitted</p>");
                }, 2500);
            }
        });
        // clear fields
        $.each($(".apply-input textarea"), function(index,value){
            $(value).val("");
        });
    });

    // Update current page link
    // $(".nav-item").on("click", function(){
    //     $(".nav-item active").removeClass("active");
    //     $(this).addClass("active");
    // });

});