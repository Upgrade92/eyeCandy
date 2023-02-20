import './bootstrap';


function reloadFrame(){
    document.getElementById('videoModal').src = document.getElementById('videoModal').src;
}

function bsd(status) {
	var body = document.querySelector("body");

	var scrollTop = window.pageYOffset || document.documentElement.scrollTop;
	var scrollLeft = window.pageXOffset || document.documentElement.scrollLeft;

	window.onscroll = function () {};

	if (status === true) {
		// Check window scroll exists else use traditional method
		if (window.onscroll !== null) {
			// if any scroll is attempted, set this to the previous value
			window.onscroll = function () {
				window.scrollTo(scrollLeft, scrollTop);
			};
		}
	} else {
		//body.classList.remove("fixed", "overflow-y-scroll");
		window.onscroll = function () {};
	}
}

function test(){
    console.log("hello");
}