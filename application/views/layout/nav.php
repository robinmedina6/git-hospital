	<!-- BARRA DE NAVEGACION -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light stick-top" style="">
    	<span class="navbar-text navbar-brand">
        	Desarrollo sistema Hospital
        </span>
     <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle Navigation">
     <span class="navbar-toggler-icon"></span>
     </button>
     <div class="collapse navbar-collapse" id="navbarSupportedContent">
     	<ul class="navbar-nav mr-auto">
        </ul>
     	<ul class="navbar-nav">
        	<li class="nav-item">
            	<a class="nav-link disabled" href="#"><strong>Rango:<?= $this->session->rango;?></strong></a>            
            </li>
            <li class="nav-item divider">
            	<a class="nav-link disabled" href="#"><strong>Nombre Usuario:<?= $this->session->nombre_usuario;?></strong></a>            
            </li>
            <li class="nav-item" style="margin-left:2em;">
            	<a href="<?=base_url('index.php/login/logout')?>" class="btn btn-warning">Cerrar Session</a>            
            </li>
        </ul>    
     </div>
     </nav>
     