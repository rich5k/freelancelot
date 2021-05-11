<!-- 
To generate recommendations, user interactions need to be
recorded, then create a catalog of items to recommend,
and finally retrieve recommendations
 -->
<!-- DB name and token currently not available -->



<?php
require_once '../vendor/autoload.php';

use Recombee\RecommApi\Client;
use Recombee\RecommApi\Requests as Reqs;

$token  = "THPVz8AiAdXYQFakEgLDXROdUltS3b4ybH8fXxs9VXUboggM0EvFJQFM5jMwuVJh";
$db_name = "freelancelot-db";


$client = new Client($db_name, $token);


// Build catalog of students 

$client -> send(new Reqs\AddItemProperty("name", "string"));
$client -> send(new Reqs\AddItemProperty("major", "string"));
$client -> send(new Reqs\AddItemProperty("university", "string"));
$client -> send(new Reqs\AddItemProperty("email", "string"));
$client -> send(new Reqs\AddItemProperty("deleted", "boolean"));


// Set properties for organizaiton in catalog
$client->send(new AddUserProperty("", ""));

// Add an organization to catalog
$client->send(new AddUser($org_id));
// or alternatively
$client->send(new SetUserValues($org_id, 
	[
		"" => "",
		"" => ""
	],
	[
    	'cascadeCreate' => true
  	]
));

// Add a student to catalog
// After a student is registered and completes their bio
// add student data to catalog
$client -> send(new Reqs\SetItemValues($stud_id,
    [
      "name" => "",
      "major" => "",
	    "email" => "",
      "university" => "",
      "image" => "http://examplesite.com/products/xyz.jpg",
    ],
    [
      "cascadeCreate" => true
    ]
));

//  Get recmmendations on students to hire
$max = 5;
$org_id = $_SESSION["sessionId"];
$student = new Student();

// Based on org's past interactions (purchases,
// ratings, etc.) with the users, recommends top-N items
// that are most likely to be of high value for a given user
$result = $client->send(new RecommendItemsToUser($org_id, $count, [
    'returnProperties' => true,
	//filter is a boolean expression
    'filter' => "'major'=='computer science'",
    'logic' => "personal" 
  ])
);
// Example return data
// {
// 	"recommId": "ce52ada4-e4d9-4885-943c-407db2dee837",
// 	"recomms":
// 	  [
// 		{
// 		  "id": "tv-178",
// 		  "values": {
// 			"description": "4K TV with 3D feature",
// 			"categories":   ["Electronics", "Televisions"],
// 			"price": 342,
// 			"url": "myshop.com/tv-178"
// 		  }
// 		},
// 		{
// 		  "id": "mixer-42",
// 		  "values": {
// 			"description": "Stainless Steel Mixer",
// 			"categories":   ["Home & Kitchen"],
// 			"price": 39,
// 			"url": "myshop.com/mixer-42"
// 		  }
// 		}
// 	  ],
// 	 "numberNextRecommsCalls": 0
//   }
$result = json_decode($result);





// Recommends set of items that are somehow related to one given
// item, X. Typical scenario is when user A is viewing X. 
// Then you may display items to the user that he might be also
// interested in. Recommend items to item request gives you
// Top-N such items, optionally taking the target user A into account.
// Recommend students with similar profiles
$similar = $client -> send(new Reqs\RecommendItemsToItem($stud_id, $org_id, $max,
	[
        'logic' => 'similar',
        'returnProperties' => true,
        'cascadeCreate' => true
    ])
);
// Example return data
// {
// 	"recommId": "0c6189e7-dc1a-429a-b613-192696309361",
// 	"recomms":
// 	  [
// 		{
// 		  "id": "tv-178",
// 		  "values": {
// 			"description": "4K TV with 3D feature",
// 			"categories":   ["Electronics", "Televisions"],
// 			"price": 342,
// 			"url": "myshop.com/tv-178"
// 		  }
// 		},
// 		{
// 		  "id": "mixer-42",
// 		  "values": {
// 			"description": "Stainless Steel Mixer",
// 			"categories":   ["Home & Kitchen"],
// 			"price": 39,
// 			"url": "myshop.com/mixer-42"
// 		  }
// 		}
// 	  ],
// 	"numberNextRecommsCalls": 0
//}


// Records the event of hiring a student
$client->send(new AddPurchase($user_id, $item_id, [
    // optional parameters:
    'timestamp' => "string / number",
    'cascadeCreate' => true,
    'amount' => number,
    'projectID' => number,
    'recommId' => "if based on a recommendation, add recommid"
  ])
);

// Rate a student 
$client->send(new AddRating($org_id, $student_id, $rating, [
    // optional parameters:
    'timestamp' => "string / number",
    'cascadeCreate' => true,
  ])
);

// Get all ratings made by different users for a given student
$result = $client->send(new ListItemRatings($item_id));

// Example return data
//-----------------------------
// [
// 	{
// 	  "itemId": "item-x",
// 	  "userId": "user-a",
// 	  "rating": -0.25,
// 	  "timestamp": 1348151906.0
// 	},
// 	{
// 	  "itemId": "item-x",
// 	  "userId": "user-b",
// 	  "rating": 0.0,
// 	  "timestamp": 1348239363.0
// 	}
// ]

// Get search results
$result = $client->send(new SearchItems($user_id, $search_query, $count, [
    // optional parameters:
    'returnProperties' => true,
    'filter' => "",
    'booster' => "",
    'logic' => "recently-viewed" or "popular"
  ])
);
// Example return data 
// {
// 	"recommId": "ce52ada4-e4d9-4885-943c-407db2dee837",
// 	"recomms":
// 	  [
// 		{
// 		  "id": "tv-178",
// 		  "values": {
// 			"description": "4K TV with 3D feature",
// 			"categories":   ["Electronics", "Televisions"],
// 			"price": 342,
// 			"url": "myshop.com/tv-178"
// 		  }
// 		},
// 		{
// 		  "id": "mixer-42",
// 		  "values": {
// 			"description": "Stainless Steel Mixer",
// 			"categories":   ["Home & Kitchen"],
// 			"price": 39,
// 			"url": "myshop.com/mixer-42"
// 		  }
// 		}
// 	  ],
// 	"numberNextRecommsCalls": 0
// }

?>



Recording interactions using batches
<?php

$client = new Client($db_name, $token);
$org = new Organization();
$requests = array();

// Create table named viewings where 
// a record is created when an org looks at a 
// students profile/bio/prposal
$viewings = $org->getAllViewings();

foreach($viewings as $interacion) {
	$stud = $interacion['studID'];
	$org = $interacion['orgID'];
	$time = $interacion['timestamp'];

	$r = new Reqs\AddDetailView($org, $stud,
									['timestamp' => $time, 'cascadeCreate' => true]);
	array_push($requests, $r);
}

$br = new Reqs\Batch($requests);
$client->send($br);

// Returns json object containing list of ids of students 
function getRecommStudents($org, $limit){
	$recommended = $client->send(new Reqs\RecommendItemsToUser($org, $limit,
	[
		'returnProperties' => true,
		//filter is a boolean expression
		'filter' => "'major'=='computer science'",
		'logic' => "personal" 
	]));
	return $recommended;
}

// Returns json object containing list of student objects 
function getSimilarStudents($org, $limit){
	$recommended = $client->send(new Reqs\RecommendItemsToItem($stud_id, $org_id, $limit, [
		'logic' => 'similar',
        'returnProperties' => true,
        'cascadeCreate' => true
	]));
	return $recommended;
}

// Returns search results(json object containig a
// list of student objects) to user based on 
// past/recorded interactions
function getSearchResults($org, $search_term, $count){
	$matches = $client -> send(new Reqs\SearchItems($org, $search_term, $count,
	[
		'scenario' => 'search_top',
		'returnProperties' => true,
		'cascadeCreate' => true
	])
);
}


?>
