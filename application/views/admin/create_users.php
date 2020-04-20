<form action="<?=base_url('index.php/users/store')?>" method="POST">
	<h3>Datos de la Cuenta</h3>
    <hr>
    <div class="form-group">
    	<div class="form-row">
        	<div class="col-7">
            	<label for="">Nombre Usuario</label>
                <input type="text" name="user" class="form-control" placeholder="Inserte el nombre" value="<?=set_value('user')?>">
                <p class="text-danger"><?= form_error('user')?></p>
            </div>
            <div class="col">
            	<label for="">Correo</label>
                <input type="text" name="correo" class="form-control" placeholder="correo" value="<?=set_value('correo')?>"> 
                <div class="text-danger"><?= form_error('correo')?></div>
                
            </div>
            <div class="col">
            	<label for="">Rango Usuario</label>
                <select name="range" class="custom-select">
                	<option selected value="">Seleccione el Rango</option>
                    <option  <?= set_value('range') == "admin" ? 'admin' : '' ;?> value="admin">Administrador</option>
                    <option  <?= set_value('range') == "admin" ? 'user' : '' ;?> value="user">Usuario</option>
                </select>
                <div class="text-danger"><?= form_error('range')?></div>
            </div>
       	</div>
        <br>
        <h3>Informacion del Usuario</h3>
        <hr>
        <div class="form-row">
            <div class="col-7">
                <label for="">Nombre(s)</label>
                <input name="name" class="form-control" type="text" placeholder="Inserte nombre" value="<?=set_value('name')?>">
                <div class="text-danger"><?= form_error('name')?></div>
            </div>
            <div class="col">
                <label for="">Apellido(s)</label>
                <input name="lastname" class="form-control" type="text" placeholder="Inserte Apellido" value="<?=set_value('lastname')?>">
                <div class="text-danger"><?= form_error('lastname')?></div>
            </div>
            <div class="col">
                <label for="">Area</label>
                <select name="area" class="custom-select">
                	<option selected value="">Seleccione Area</option>
                    <option <?= set_value('area') == "admin" ? 'selected' : '' ;?> value="admin">Medicina General</option>
                    <option <?= set_value('area') == "user" ? 'selected' : '' ;?>  value="user">Genetica</option>
                    <option <?= set_value('area') == "user" ? 'selected' : '' ;?> value="user">Clinica del Higado</option>
                </select>
                <div class="text-danger"><?= form_error('area')?></div>
            </div>
		</div>            
   </div>
   <div class="form-group">
   		<div class="form-row">
        	<div class="col-7">
            	<label for="">Especialidad</label>
                <input name="especialidad" type="text" class="form-control" placeholder="especialidad" value="<?=set_value('especialidad')?>" />
                <div  class="text-danger"><?= form_error('especialidad')?></div>
            </div>
            <div class="col-5">
            	<label for="">Cedula</label>
                <input name="cedula" type="text" class="form-control" placeholder="xxx"  value="<?=set_value('cedula')?>"/>
                <div class="text-danger"><?= form_error('cedula')?></div>
            </div>
        </div>
   
   </div>
   <div class="form-group">
   		<input type="submit" class="btn btn-primary" value="Dar de Alta Usuario" />
        
   </div>
</form>
