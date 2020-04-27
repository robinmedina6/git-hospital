<h1 class="text-center">editando usuario</h1>
<div class="container-fluid">
    <h4>datos de la cuenta</h4>
    <form method="post" action="<?=base_url('index.php/users/update')?>" >
        <div class="card-body">
            <div class="form-row">
                <div class="form-group col-md-4">
                    <label>Nombre Usuario</label>
                    <input type="text" name="username" value="<?= set_value("username", isset($user['nombre_usuario']) ? $user['nombre_usuario'] : '' )?>" class="form-control" placeholder="" readonly>
                    <input type="hidden" value="<?= set_value("_id", isset($user['_id']) ? $user['nombre_usuario'] : '' )?>" name="_id" >
                    
                </div>
                <div class="form-group col-md-4">
                    <label>Email</label>
                    <input type="email" name="email" value="<?= set_value("email", isset($user['correo']) ? $user['correo'] : '' )?>" class="form-control" placeholder="" readonly>
                </div>
                <div class="form-group col-md-4">
                    <label>Status</label>
                    <input type="text" name="status" value="<?= set_value("status", isset($user['status']) ? $user['status'] : '' )?>" class="form-control" placeholder="" readonly>
                </div>
            </div>
        </div>
        <br>
        <h4>Informacion Personal</h4>
        <div class="card-body">
            <div class="form-row">
                    <div class="form-group col-md-4">
                        <label>Nombre</label>
                        <input type="text" value="<?= set_value("nombre", isset($user['nombre']) ? $user['nombre'] : '' )?>" name="nombre" class="form-control" placeholder="" >
                        <?=form_error('nombre','<p class="text-danger">','</p>')?>
                    </div>
                    <div class="form-group col-md-4">
                        <label>Apellido</label>
                        <input type="text" value="<?= set_value("apellido", isset($user['apellido']) ? $user['apellido'] : '' )?>" name="apellido" class="form-control" placeholder="" >
                        <?=form_error('apellido','<p class="text-danger">','</p>')?>
                    </div>
                    <div class="form-group col-md-4">
                        <label>cedula</label>
                        <input type="text" value="<?= set_value("cedula", isset($user['cedula']) ? $user['cedula'] : '' )?>" name="cedula" class="form-control" placeholder="" >
                        <?=form_error('cedula','<p class="text-danger">','</p>')?>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label>Especialidad</label>
                        <input type="text" value="<?= set_value("especialidad", isset($user['especialidad']) ? $user['especialidad'] : '' )?>" name="especialidad" class="form-control" placeholder="" >
                        <?=form_error('especialidad','<p class="text-danger">','</p>')?>
                    </div>
                    <div class="form-group col-md-6">
                        <label>Area</label>
                        <input type="text" value="<?= set_value("area", isset($user['area']) ? $user['area'] : '' )?>" name="area" class="form-control" placeholder="" >
                        <?=form_error('area','<p class="text-danger">','</p>')?>
                    </div>
                    
                </div>
            </div>
        </div>
        <br>
        <input type="submit" class="btn btn-primary btn-lg" value="actualizar">
    </form>
</div>