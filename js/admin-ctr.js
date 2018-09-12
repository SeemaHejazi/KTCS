// go to content div and shove some stuff in
$(document).ready(function() {
    
}); // end function

function loadAdminHomeView(){

	var view = "view/admin-home-view.php";
	//make link on nav active
    $('.nav li').removeClass('active');
    $('#adminHome').addClass('active');

    $("#viewGoesHere").load(view);
}


// function loadProfileView(){

// 	var view = "view/member-home-view.html";

// 	//make link on nav active
//     $('.nav li').removeClass('active');
//     $('#profile').addClass('active');
	
// 	$("#viewGoesHere").load(view){
    	
//     }
// }

function loadMembersListView(){
	var view = "view/member-list-view.php";
	//make link on nav active
    $('.nav li').removeClass('active');
    $('#viewMem').addClass('active');

    $("#viewGoesHere").load(view);
}


function loadMembersHistoryView(){
	var view = "view/allmember-history-view.php";
	//make link on nav active
    $('.nav li').removeClass('active');
    $('#rentHistory').addClass('active');
    
    $("#viewGoesHere").load(view);

}


// function loadPaymentsView(){
// 	var view = "view/member-home-view.html";
// 	//make link on nav active
//     $('.nav li').removeClass('active');
//     $('#makeReview').addClass('active');

//     $("#viewGoesHere").load(view);
// }


function loadAllReviewsView(){
	var view = "view/admin-reviews-view.php";
	//make link on nav active
    $('.nav li').removeClass('active');
    $('#revs').addClass('active');

    $("#viewGoesHere").load(view);
}



function loadCarListView(){
	var view = "view/car-list-view.php";
	//make link on nav active
    $('.nav li').removeClass('active');
    $('#viewCars').addClass('active');

    $("#viewGoesHere").load(view);
}


function loadLocationsView(){
	var view = "view/locations-view.php";
	//make link on nav active
    $('.nav li').removeClass('active');
    $('#viewLocations').addClass('active');

    $("#viewGoesHere").load(view);
}





