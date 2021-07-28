var loadFile_avt = function(event) {
    var image = document.getElementById('block');
    image.src = URL.createObjectURL(event.target.files[0]);
};