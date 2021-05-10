<?php 
    if(isset($_POST['btn'])){
        print_r($_FILES);
    }

?>


<form method="POST" action="" enctype="multipart/form-data">
<label >Ingresa un comentario</label>
<input type="text" name="Comentario">
<br/><br/>
<label >Ingresa imagen</label>
<input type="file" name="Imagen">
<br/>
<button type="submit" name="btn">Agregar </button>

</form>