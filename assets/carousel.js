// Force the review variable to be an integer
// Retrieve the product index from the cookie
let rev = parseInt(getCookie('productIndex')) || 0;
carousel(rev);

function previousReview() {
	rev = rev - 1;
	carousel(rev);
}

function nextReview() {
	rev = rev + 1;
	carousel(rev);
}

function carousel(review) {
	let reviews = document.getElementsByClassName("review__items");

	if (review >= reviews.length) {
		review = 0;
		rev = 0;
	}
	if (review < 0) {
		review = reviews.length - 1;
		rev = reviews.length - 1;
	}
    
    review = parseInt(review);

	for (let i = 0; i < reviews.length; i++) {
		reviews[i].style.display = "none";
	}
	reviews[review].style.display = "block";
}

// source: https://www.w3schools.com/js/js_cookies.asp 
function getCookie(cname) {
    let name = cname + "=";
    let decodedCookie = decodeURIComponent(document.cookie);
    let ca = decodedCookie.split(';');
    for(let i = 0; i <ca.length; i++) {
        let c = ca[i];
        while (c.charAt(0) == ' ') {
        c = c.substring(1);
        }
        if (c.indexOf(name) == 0) {
        return c.substring(name.length, c.length);
        }
    }
    return 0;
}