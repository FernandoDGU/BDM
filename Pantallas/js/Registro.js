/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


function HandleBrowseClick()
{
    var fileinput = document.getElementById("browse");
    fileinput.click();
    var form = document.getElementById("formRegistro");
    form.addEventListener('submit', function (event) {
        event.preventDefault();
        event.stopPropagation();
    }, false);
}
function Handlechange()
{
    var fileinput = document.getElementById("browse");
    //var textinput = document.getElementById("filename");
    // textinput.value = fileinput.value;

}

function previewFile() {
    const preview = document.querySelector('.imgFormulario');
    const file = document.querySelector('input[type=file]').files[0];
    const reader = new FileReader();

    reader.addEventListener("load", function () {
        // convert image file to base64 string
        preview.src = reader.result;
    }, false);

    if (file) {
        reader.readAsDataURL(file);
    }
}
