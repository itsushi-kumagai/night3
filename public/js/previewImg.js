const input = document.querySelector('input[type="file"]')
const previewImage = document.getElementById("image-preview__image")

input.addEventListener('change', function(e){
    const file = this.files[0];
    if(file) {
        const reader = new FileReader();
        
        reader.addEventListener("load", function(){
            previewImage.setAttribute("src", this.result);
        });

        previewImage.style.display = "block";

        reader.readAsDataURL(file);
    } else {
        previewImage.setAttribute("src", "");
    }

});

const edit = document.querySelector('input[type="file"]')
var preview = document.getElementById("preview");

edit.addEventListener('change', function(e){
    const file = this.files[0];
    if(file) {
        const reader = new FileReader();
        
        reader.addEventListener("load", function(){
            preview.setAttribute("src", this.result);
        });

        preview.style.display = "block";

        reader.readAsDataURL(file);
    } else {
        preview.setAttribute("src", "");
    }

});