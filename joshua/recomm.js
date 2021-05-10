<script src="https://cdn.jsdelivr.net/gh/recombee/js-api-client/dist/recombee-api-client.min.js"></script>
    
    // Record opening and viewing student's profile
    $(".check-out-student").click(function(){
        var student_id = $(this).parent().attr("id");
        var org_id = sessionStorage.getItem("sessionId");

        var client = new recombee.ApiClient('myDb', publicToken);

        client.send(new recombee.AddDetailView(org_id, student_id),
            (err, response) => {
                console.log(response);
            }
        );
    });

    // Record hiring
    $(".hire_student").click(function(){
        var student_id = $(this).parent().attr("id");
        var org_id = sessionStorage.getItem("sessionId");

        var client = new recombee.ApiClient('myDb', publicToken);
        client.send(new recombee.AddPurchase(org_id, student_id),
            (err, response) => {
                console.log(response);
            }
        );
    });

    function getSearchResults(){
        client.send(new recombee.SearchItems(userId, searchQuery, count, {
            'returnProperties': true,
            'filter': '',
            'logic': ''
        }), callback);
    }

