/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/*(function () {
 'use strict';
 window.addEventListener('load', function () {
 var forms = document.getElementsByClassName('needs-validation');
 var validation = Array.prototype.filter.call(forms, function (form) {
 form.addEventListener('submit', function (event) {
 if (form.checkValidity() === false) {
 event.preventDefault();
 event.stopPropagation();
 }
 form.classList.add('was-validated');
 }, false);
 });
 }, false);
 })();*/
function checarValidacion(form) {
    var isValidForm = form.checkValidity();
    if (isValidForm) {
        alert("Parece que todo salió bien!");
        form.submit();
    } else {
        alert("Faltan campos de validar");
        form.addEventListener('submit', function (event) {
            event.preventDefault();
            event.stopPropagation();
        }, false);
    }
    form.classList.add('was-validated');
}