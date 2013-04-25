/************ Start Slide Show Script ***********/

$(document).ready(function() {
$(".paging").show();
$(".paging a:first").addClass("active");

//Get size of the image, how many images there are, then determin the size of the image reel.
var imageWidth = $(".window").width();
var imageSum = $(".image_reel img").size();
var imageReelWidth = imageWidth * imageSum;

//Adjust the image reel to its new size
$(".image_reel").css({'width' : imageReelWidth});

/* Setting up the Slider Function and Timer.We first create the function for the slide event by itself (rotate).
Then create another function (rotateSwitch) that will rotate and repeat that slide event (rotate).*/

//Paging  and Slider Function
rotate = function(){
    var triggerID = $active.attr("rel") - 1; //Get number of times to slide
    var image_reelPosition = triggerID * imageWidth; //Determines the distance the image reel needs to slide

    $(".paging a").removeClass('active'); //Remove all active class
    $active.addClass('active'); //Add active class (the $active is declared in the rotateSwitch function)

    //Slider Animation
    $(".image_reel").animate({
        left: -image_reelPosition
    }, 500 );

};

//Rotation  and Timing Event
rotateSwitch = function(){
    play = setInterval(function(){ //Set timer - this will repeat itself every 7 seconds
        $active = $('.paging a.active').next(); //Move to the next paging
        if ( $active.length === 0) { //If paging reaches the end...
            $active = $('.paging a:first'); //go back to first
        }
        rotate(); //Trigger the paging and slider function
    }, 7000); //Timer speed in milliseconds (7 seconds)
};

rotateSwitch(); //Run function on launch

/*Hover and Click Events:In case the user wants to view the slide for a longer period of time, we will allow the slider to stop when it is hovered.
Another thing to consider is we should reset the timer each time the paging is clicked.
This will prevent unexpected slide switches and allow for a smoother experience.*/

//On Hover
$(".image_reel a").hover(function() {
    clearInterval(play); //Stop the rotation
}, function() {
    rotateSwitch(); //Resume rotation timer
});

//On Click
$(".paging a").click(function() {
    $active = $(this); //Activate the clicked paging
    //Reset Timer
    clearInterval(play); //Stop the rotation
    rotate(); //Trigger rotation immediately
    rotateSwitch(); // Resume rotation timer
    return false; //Prevent browser jump to link anchor
});
});

/************ End Slide Show Script ***********/