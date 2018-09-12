// go to content div and shove some stuff in
$(document).ready(function() {
    
}); // end function

function loadMemberHomeView(){
	var view = "view/member-home-view.php";

	//make link on nav active
    $('.nav li').removeClass('active');
    $('#memHome').addClass('active');

    $("#viewGoesHere").load(view);
}

function loadProfileView(){

	var view = "view/member-profile-view.php";

	//make link on nav active
    $('.nav li').removeClass('active');
    $('#profile').addClass('active');
	
	$("#viewGoesHere").load(view);
}

function loadRentalHistoryView(){
	var view = "view/rental-history-view.php";
	//make link on nav active
    $('.nav li').removeClass('active');
    $('#rentHistory').addClass('active');

    $("#viewGoesHere").load(view);
}


// function loadRentalHistoryView(){
// 	var view = "view/member-home-view.html";
// 	//make link on nav active
//     $('.nav li').removeClass('active');
//     $('#rentHistory').addClass('active');

//     $("#viewGoesHere").load(view);
// }

function loadReviewView() {
	var view = "view/review-view.php";
	//make link on nav active
    $('.nav li').removeClass('active');
    $('#makeReview').addClass('active');

    $("#viewGoesHere").load(view);
	
}

function loadMakeResView(){
	var view = "view/make-reservation.php";
	//make link on nav active
    $('.nav li').removeClass('active');
    $('#makeRes').addClass('active');

    $("#viewGoesHere").load(view);
	
}


function loadPaymentsView() {
	var view = "view/make-payment.php";
	//make link on nav active
    $('.nav li').removeClass('active');
    $('#makePay').addClass('active');

    $("#viewGoesHere").load(view);
	
}