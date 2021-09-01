var square = document.querySelectorAll('.square');
var nav = document.getElementById('nav');
var mobile_nav = document.getElementById('mobile_nav');
var btn_mobile_menu = document.getElementById('btn_mobile_menu');
var mobileNavCheck = document.getElementById('mobileNavCheck');

for (const elem of square) {
    elem.style.height = elem.clientWidth + "px";
    elem.style.width = elem.clientWidth + "px";
}

btn_mobile_menu.addEventListener("click", function() {

    mobileNavCheck.click();
    if (mobileNavCheck.checked == true) {
        mobile_nav.style.height = '200px';
    } else {
        mobile_nav.style.height = '0px';
    }
});

mobile_nav.onload = function() {
    mobile_nav.innerHTML = nav.innerHTML;
};


// ---------------------------
// ---------------------------
var card2 = document.querySelectorAll('.card-2');
var card3 = document.getElementById('card3');
var card3b = document.getElementById('card3b');
var contactForm = document.getElementById('contactForm');
var contactDetails = document.getElementById('contactDetails');
var para = document.querySelectorAll('.para');
var heading1 = document.querySelector('.heading1');
var tableSection = document.getElementById('tableSection');
observer = new IntersectionObserver(function(entries) {
    // console.log('entry:', entry);
    // console.log('observer:', observer);
    for (let i = 0; i < entries.length; i++) {
        console.log(entries[i].intersectionRatio)
        if (entries[i].intersectionRatio > 0) { // This should be a value between 0 and 1
            // 0 means the element is starting to appear in the viewport.
            // 1 means the element is 100% in the viewport.
            console.log("in view")
            entries[i].target.classList.add('inview')
                // observer.unobserve(entries[i].target); // Use this line if you don't want anything to trigger when scrolling back up.
        } else {
            // console.log("out of view")
            entries[i].target.classList.remove('inview')
        }
    }
});

if (card2.length > 0) {
    for (let i = 0; i < card2.length; i++) {
        observer.observe(card2[i]);
    }
}

if (para.length > 0) {
    for (let i = 0; i < para.length; i++) {
        observer.observe(para[i]);
    }
}
observer.observe(tableSection);
observer.observe(card3);
observer.observe(card3b);
observer.observe(heading1);
observer.observe(contactForm);
observer.observe(contactDetails);