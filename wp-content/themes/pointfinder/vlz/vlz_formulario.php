<?php

	$servicios = array(
        "hospedaje"                  => '<p>Hospedaje<br><sup>Cuidado día y noche</sup></p>', 
        "guarderia"                  => '<p>Guardería<br><sup>Cuidado durante el día</sup></p>', 
        "paseos"                     => '<p>Paseos<br><sup></sup></p>',
        "adiestramiento"             => '<p>Entrenamiento<br><sup></sup></p>'
    );

	$lista_servicios = '<div class="vlz_checkbox_contenedor">';
		foreach($servicios as $key => $value){
			if( substr($key, 0, 14) == "adiestramiento"){ $xkey = "adiestramiento"; }else{ $xkey = $key; }
			$lista_servicios .= '
				<div id="servicio_'.$key.'" onclick="vlz_select(\'servicio_'.$key.'\')">
					<i class="icon-'.$xkey.'"></i>
					<input type="checkbox" name="servicios[]" value="'.$key.'">
					'.$value.'
				</div>';
		}
	$lista_servicios .= '</div>';

	$servicios_adicionales = array(
        'transportacion_sencilla' => array( 
            'label'=>'Transporte Sencillo',
            'icon' => 'transporte'
        ),
        'transportacion_redonda' => array( 
            'label'=>'Transporte Redondo',
            'icon' => 'transporte2'
        ),
        'bano' => array( 
            'label'=>'Baño y Secado',
            'icon' => 'bano'
        ),
        'corte' => array( 
            'label'=>'Corte de Pelo y Uñas',
            'icon' => 'peluqueria'
        ),
        'visita_al_veterinario' => array( 
            'label'=>'Visita al Veterinario',
            'icon' => 'veterinario'
        ),
        'limpieza_dental' => array( 
            'label'=>'Limpieza Dental',
            'icon' => 'limpieza'
        ),
        'acupuntura' => array( 
            'label'=>'Acupuntura',
            'icon' => 'acupuntura'
        )
    );

	$lista_servicios_adicionales = '<div class="vlz_checkbox_contenedor">';
		foreach($servicios_adicionales as $key => $value){
			$lista_servicios_adicionales .= '
				<div id="servicio_'.$key.'" onclick="vlz_select(\'servicio_'.$key.'\')">
                    <i class="icon-'.$value['icon'].'"></i>
					<input type="checkbox" name="servicios[]" value="'.$key.'">
					<p>'.$value['label'].'</p>
				</div>';
		}
	$lista_servicios_adicionales .= '</div>';

	$tamanos = array(
		'pequenos' => '<p>Pequeño<br><sup>0.0cm - 25.0cm</sup></p>', 
		'medianos' => '<p>Mediano<br><sup>25.0cm - 58.0cm</sup></p>', 
		'grandes'  => '<p>Grande<br><sup>58.0cm - 73.0cm</sup></p>', 
		'gigantes' => '<p>Gigante<br><sup>73.0cm - 200.0cm</sup></p>'
	);

	$tamanos_mascotas_form = '<div class="vlz_checkbox_contenedor">';
		foreach($tamanos as $key => $value){
			$tamanos_mascotas_form .= '
				<div id="tamanos_'.$key.'" onclick="vlz_select(\'tamanos_'.$key.'\')">
					<input type="checkbox" name="tamanos[]" value="'.$key.'">
					'.$value.'
				</div>';
		}
	$tamanos_mascotas_form .= '</div>';

	global $wpdb;
	$estados_array = $wpdb->get_results("SELECT * FROM states ORDER BY name ASC");

    $estados = "<option value=''>Seleccione una provincia</option>";
    foreach($estados_array as $estado) { 
    	if( $_POST['estados'] == $estado->id ){ 
			$sel = "selected"; 
		}else{ $sel = ""; }
        $estados .= utf8_encode("<option value='".$estado->id."' $sel>".$estado->name."</option>");
    } 

	$estados = utf8_decode($estados);

	$json = array();
    foreach ($estados_array as $estado) {
        
        $municipios = $wpdb->get_results("SELECT * FROM locations WHERE state_id = {$estado->id} ORDER BY name ASC");

        foreach ($municipios as $municipio) {
            $json[$estado->id][] = array(
                "id" => $municipio->id,
                "name" => $municipio->name
            );
        }

    }

    echo "<script> var temp = eval( '(".json_encode($json).")' ); var locaciones = jQuery.makeArray( temp ); </script>"; 


	if($_POST['municipios'] != ""){

		$municipios_array = $wpdb->get_results("SELECT * FROM locations WHERE state_id = {$_POST['estados']} ORDER BY name ASC");
	    $muni = "<option value=''>Seleccione un distrito</option>";
	    foreach($municipios_array as $municipio) { 
	    	if( $_POST['municipios'] == $municipio->id ){
				$sel = "selected"; 
			}else{ $sel = ""; }
	        $muni .= "<option value='".$municipio->id."' $sel>".$municipio->name."</option>";
	    } 

    }else{
    	$mun = "<option value='' selected>Seleccione un distrito primero</option>";
    }

	$selects_estados = "
		<div class='vlz_sub_seccion'>
			<SELECT class='vlz_input' id='estados' name='estados' style='border: solid 1px #CCC;'>
				{$estados}
			</SELECT>
		</div>
		<div class='vlz_sub_seccion'>
			<SELECT class='vlz_input' id='municipios' name='municipios' style='border: solid 1px #CCC;'>
				{$muni}
			</SELECT>
		</div>
	";

	$valoraciones_rangos_1 .= "<option value='' ".selected(0, $_POST['rangos'][4], false).">Min</option>";
	$valoraciones_rangos_2 .= "<option value='' ".selected(0, $_POST['rangos'][5], false).">Max</option>";
	for ($i=1; $i < 6; $i++) { 
		$valoraciones_rangos_1 .= "<option value='$i' ".selected($i, $_POST['rangos'][4], false).">$i</option>";
		$valoraciones_rangos_2 .= "<option value='$i' ".selected($i, $_POST['rangos'][5], false).">$i</option>";
	}

	echo "
	<div id='filtros'></div>
	<form action='".get_home_url()."/busqueda' method='POST' class='vlz_form' id='vlz_form_buscar' style='margin-top: 20px;'>

		<input type='submit' value='Aplicar Filtros' class='vlz_boton'>
		
		<div class='vlz_sub_seccion'>
			<div class='vlz_sub_seccion_titulo'>Ordenar por:</div>
			<div class='vlz_sub_seccion_interno'>

				<div class='vlz_contenedor'>
					<select id='orderby' name='orderby' class='vlz_input'>
					    <option value=''>Seleccione una opción</option>
					    <option value='rating_desc'>Valoración de mayor a menor</option>
					    <option value='rating_asc'>Valoración de menor a mayor</option>
					    <option value='distance_asc'>Distancia al cuidador de cerca a lejos</option>
					    <option value='distance_desc'>Distancia al cuidador de lejos a cerca</option>
					    <option value='price_asc'>Precio del Servicio de menor a mayor</option>
					    <option value='price_desc'>Precio del Servicio de mayor a menor</option>
					    <option value='experience_asc'>Experiencia de menos a más años</option>
					    <option value='experience_desc'>Experiencia de más a menos años</option>
					    <option value='name_asc'>Nombre del Cuidador de la A a la Z</option>
					    <option value='name_desc'>Nombre del Cuidador de la Z a la A</option>
				    </select>
				</div>

			</div>
		</div>

		<div class='vlz_sub_seccion'>
			<div class='vlz_sub_seccion_titulo'>Por Nombre</div>
			<div class='vlz_sub_seccion_interno'>

				<div class='vlz_contenedor'>
					<input type='text' name='n' value='".$_POST['n']."' class='vlz_input' placeholder='Buscar por Nombre'>
				</div>

			</div>
		</div>
		
		<div class='vlz_sub_seccion'>
			<div class='vlz_sub_seccion_titulo'>Por Ubicaci&oacute;n</div>
			<div class='vlz_sub_seccion_interno'>

				<div class='vlz_contenedor'>
					<SELECT id='tipo_busqueda' name='tipo_busqueda' class='vlz_input' onchange='vlz_tipo_ubicacion()'>
						<option value='mi-ubicacion'>Mi Ubicaci&oacute;n</option>
						<option value='otra-localidad'>Otra Localidad</option>
					</SELECT>	
				</div>

				<div class='vlz_contenedor' id='vlz_estados' style='border: 0;'>
					{$selects_estados}
				</div>

				<div id='vlz_inputs_coordenadas_x' style='display: none;'>

					<input type='text' id='otra_latitud' name='otra_latitud' value='".$_POST['otra_latitud']."' class='vlz_input vlz_medio' placeholder='Latitud'>
					<input type='text' id='otra_longitud' name='otra_longitud' value='".$_POST['otra_longitud']."' class='vlz_input vlz_medio' placeholder='Longitud'>
					<input type='text' id='otra_distancia' name='otra_distancia' value='".$_POST['otra_distancia']."' class='vlz_input' placeholder='Distancia KM'>
	
					<input type='text' id='latitud'   name='latitud'   value='".$_POST['latitud']."'   >
					<input type='text' id='longitud'  name='longitud'  value='".$_POST['longitud']."'  >
					<input type='text' id='distancia' name='distancia' value='".$_POST['distancia']."' >

				</div>

			</div>
		</div>
		
		<div class='vlz_sub_seccion'>
			<div class='vlz_sub_seccion_titulo'>Por Rangos</div>
			<div class='vlz_sub_seccion_interno'>

				<label>Rango Hospedaje</label>
				<div class='vlz_contenedor'>
					<input type='text' name='rangos[]' value='".$_POST['rangos'][0]."' class='vlz_input vlz_medio' placeholder='Min'>
					<input type='text' name='rangos[]' value='".$_POST['rangos'][1]."' class='vlz_input vlz_medio' placeholder='Max'>
				</div>

				<label>A&ntilde;os de Experiencia</label>
				<div class='vlz_contenedor'>
					<input type='text' name='rangos[]' value='".$_POST['rangos'][2]."' class='vlz_input vlz_medio' placeholder='Min'>
					<input type='text' name='rangos[]' value='".$_POST['rangos'][3]."' class='vlz_input vlz_medio' placeholder='Max'>
				</div>

				<label>Valoraci&oacute;n de Clientes</label>
				<div class='vlz_contenedor' style='border-right: 0;'>
					<select class='vlz_input vlz_medio' name='rangos[]' style='border: solid 1px #CCC;width: calc( 50% - 2px ); margin-right: 1px;'>".$valoraciones_rangos_1."</select>
					<select class='vlz_input vlz_medio' name='rangos[]' style='border: solid 1px #CCC;width: calc( 50% - 2px ); margin-left: 1px;'>".$valoraciones_rangos_2."</select>
				</div>
				
			</div>
		</div>

		<div class='vlz_sub_seccion'>
			<div class='vlz_sub_seccion_titulo'>Por Servicios</div>
			<div class='vlz_sub_seccion_interno'>

				{$lista_servicios}
				
			</div>
		</div>

		<div class='vlz_sub_seccion'>
			<div class='vlz_sub_seccion_titulo'>Por Servicios Adicionales</div>
			<div class='vlz_sub_seccion_interno'>

				{$lista_servicios_adicionales}
				
			</div>
		</div>

		<div class='vlz_sub_seccion'>
			<div class='vlz_sub_seccion_titulo'>Por Tama&ntilde;os</div>
			<div class='vlz_sub_seccion_interno'>

				{$tamanos_mascotas_form}
				
			</div>
		</div>

		<input type='submit' value='Aplicar Filtros' class='vlz_boton'>
	</form>";

?>