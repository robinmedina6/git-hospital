<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8" />
        <title></title>
    </head>
    <body>
        <h1>registo</h1>
		<ul>
			<?php foreach($menu as $item): ?>
				<li><a href="<?= $item['url']?>"><?= $item['title']?></a></li>
			<?php endforeach;?>
		</ul>
        <?php echo validation_errors(); ?>
        <?php
        echo form_open('registro/create',array('method'=>'POST'));
		echo form_label('nombre de usuario');
		echo form_input('username');
		echo "<br>";
		
		echo form_label('Correo Electronico');
		echo form_input(array('type'=>'email','name'=>'email','requiared'));
		echo "<br>";
		
		echo form_label('Contraseña');
		echo form_input(array('type'=>'password','name'=>'password'));
		echo "<br>";
		echo form_label('confirmar Contraseña');
		echo form_input(array('type'=>'password','name'=>'password_confirm'));
		echo "<br>";
		
		echo form_submit('submit','enviar');
		
		echo form_close();
		echo "<br>";
		
		
		?>	
        <?= isset($msg) ? $msg : '' ?>        
    </body>
</html>