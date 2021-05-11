<script src="https://cdn.jsdelivr.net/gh/recombee/js-api-client/dist/recombee-api-client.min.js"></script>
    var db = "freelancelot-db"
    var token = "1zu83UTbkZBr76ONrM4TvmFIal4n3jtUJAMdUdf6z6tCKiXTc5LGUFZcSU5lsxZP";

    // Record opening and viewing student's profile
    $(".btn-check-out-student").click(function(){
        var student_id = $(this).parent().attr("id");
        var org_id = sessionStorage.getItem("sessionId");

        var client = new recombee.ApiClient(db, token);

        client.send(new recombee.AddDetailView(org_id, student_id),
            (err, response) => {
                console.log(response);
            }
        );
    });

    // Record hiring
    $(".btn-hire-student").click(function(){
        var student_id = $(this).parent().attr("id");
        var org_id = sessionStorage.getItem("sessionId");

        var client = new recombee.ApiClient(db, token);
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

