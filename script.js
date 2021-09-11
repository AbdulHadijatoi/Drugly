$('#modal1').hide();
var square = document.querySelectorAll('.square');
var nav = document.getElementById('nav');
var mobile_nav = document.getElementById('mobile_nav');
var btn_mobile_menu = document.getElementById('btn_mobile_menu');
var mobileNavCheck = document.getElementById('mobileNavCheck');

for (const elem of square) {
    elem.style.height = elem.clientWidth + "px";
    elem.style.width = elem.clientWidth + "px";
}

btn_mobile_menu.addEventListener("click", toogleNav);

function toogleNav(){
    mobileNavCheck.click();
    if (mobileNavCheck.checked == true) {
        mobile_nav.style.height = '160px';
    } else {
        mobile_nav.style.height = '0px';
    }
}

mobile_nav.onload = function() {
    mobile_nav.innerHTML = nav.innerHTML;
};


window.addEventListener('click', function(e){   
    if (mobile_nav.contains(e.target) || btn_mobile_menu.contains(e.target)){
      // Clicked in box
    } else{
        if(mobileNavCheck.checked){
            mobileNavCheck.click();
        }
      mobile_nav.style.height = '0px';
    }
  });

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
        // console.log(entries[i].intersectionRatio)
        if (entries[i].intersectionRatio > 0) { // This should be a value between 0 and 1
            // 0 means the element is starting to appear in the viewport.
            // 1 means the element is 100% in the viewport.
            // console.log("in view")
            entries[i].target.classList.add('inview')
                // observer.unobserve(entries[i].target); // Use this line if you don't want anything to trigger when scrolling back up.
        }
        // else {
        //     // console.log("out of view")
        //     entries[i].target.classList.remove('inview')
        // }
    }
});


$(function() {
    $(document).scroll(function() {
        var $nav = $("header");
        $nav.toggleClass('scrolled', $(this).scrollTop() > $nav.height());
    });
});

$(function() {
    // $('#modal2').hide();
    setTimeout(function() {
        $('#modal1').show();
    }, 30000);
    setTimeout(function() {
        $('#modal2').show();
    }, 1000);
    $('#btnModal1').click(function() {
        $('#modal1').hide();
    });
    $('#btnModal2').click(function() {
        $('#modal2').hide();
    });
});

