/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


function HandleBrowseClick()
            {
                var fileinput = document.getElementById("browse");
                fileinput.click();
            }
            function Handlechange()
            {
                var fileinput = document.getElementById("browse");
                var textinput = document.getElementById("filename");
                textinput.value = fileinput.value;
            }

   