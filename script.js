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