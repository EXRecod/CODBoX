var offset = 0, startX;
var elem = document.getElementById("box");
$('#box-scene')
.on('mousedown', function (e) {
    startX = e.pageX - offset;
})
.on('mouseup', function() {
    startX = null;
})
.on('mousemove', function (e) {
    if(startX) {
        offset = e.pageX - startX;
        elem.style['-webkit-transform'] = 'rotateY(' + offset + 'deg)';
    }
});