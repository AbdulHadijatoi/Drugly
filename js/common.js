var square = document.querySelectorAll('.square');

for (const elem of square) {
    elem.style.height = elem.clientWidth + "px";
    elem.style.width = elem.clientWidth + "px";
}