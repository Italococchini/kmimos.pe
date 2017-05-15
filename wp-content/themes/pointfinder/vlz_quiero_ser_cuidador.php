<?php 
	/*
		Template Name: vlz quiero ser cuidador
	*/
		get_header();


		//***************************************************
		// BEGIN Configuracion de mensajes de alertas en precios	
		//***************************************************
		$mensajes_alerta =	
			'<div class="alertas alertas-info">
				<small> 
					<strong>ATENCI&Oacute;N:</strong> Recuerda completar con ceros (0) los Miles. 
					<strong>Ejemplo:</strong> 1 Peso no es igual a 1000 Pesos
				</small> 
			</div>';
		//***************************************************
		// END Configuracion de mensajes de alertas en precios	
		//***************************************************

		$keyApi = 'AIzaSyD-xrN3-wUMmJ6u2pY_QEQtpMYquGc70F8';
        wp_enqueue_script( 'kmimos_gmap', 'https://maps.googleapis.com/maps/api/js?key='.$keyApi.'&callback=initMap');
	
		if(function_exists('PFGetHeaderBar')){PFGetHeaderBar();} ?>

		<div class="pf-blogpage-spacing pfb-top"></div>
		<section role="main" class="blog-full-width">
			<div class="pf-container">
				<div class="pf-row">
					<div class="col-lg-12">

						<article>

							<?php 
								include("vlz/form/vlz_styles.php"); 
								include("vlz/form/vlz_scripts.php"); 
							?>

							<h1 class="vlz_titulo jj_titulo">Sé parte de Kmimos</h1>
							<div class="vlz_sub_titulo">Para registrarte como cuidador de Kmimos, llena este formulario y nos pondremos en contacto contigo.</div>

							<form id="vlz_form_nuevo_cuidador" class="vlz_form" enctype="multipart/form-data" method="POST">

								<?php
									$tam = array(
										"pequenos" => "Peque&ntilde;os (0.0 cm - 25.0 cm)",
										"medianos" => "Medianos (25.0 cm - 58.0 cm)",
										"grandes"  => "Grandes (58.0 cm - 73.0 cm)",
										"gigantes" => "Gigantes (73.0 cm - 200.0 cm)",
									);
								?>

								<div class="vlz_parte">
									<div class="vlz_titulo_parte">Informaci&oacute;n General</div>

									<h2 class="vlz_titulo_interno">Datos Personales</h2>
									
									<div class="">

										<div class="vlz_cell50 jj_input_cell00">

											<div class="vlz_sub_seccion">
												<div class="vlz_cell50">
													<input data-title="Debes ingresar tu apellido<br>Este debe tener mínimo 3 caracteres."  type='text' id='nombres' name='nombres' class='vlz_input' placeholder='Nombres' required minlength="3">
												</div>
												
												<div class="vlz_cell50">
													<input data-title="Debes ingresar tu apellido<br>Este debe tener mínimo 3 caracteres." type='text' id='apellidos' name='apellidos' class='vlz_input' placeholder='Apellidos' required minlength="3" >
												</div>
											</div>
											<div class="vlz_sub_seccion">
												<div class="vlz_cell50">
													<input data-title="La Cedula de Ciudadania debe ser de entre 7 y 10 dígitos." type='number' id='ife' name='ife' class='vlz_input' min="0" placeholder='Cedula de Ciudadania' minlenght="7" maxlength="10" required pattern="[0-9]{10}" >
												</div>
												
												<div class="vlz_cell50">
													<input data-title="Debes ingresar tu número telefónico<br>Este debe tener entre 7 y 11 dígitos." type='number' id='telefono' maxlength="11" min="0" name='telefono' class='vlz_input' placeholder='Tel&eacute;fono' required pattern="[0-9]{11}">
												</div>
											</div>

											<div class="vlz_sub_seccion">
												<div class="vlz_cell100">
													<select id="referido" name="referido" class="vlz_input" data-title="Debes seleccionar una opción" required>
														<option value="">¿Cómo nos conoció?</option>
														<?php
															$referidos = get_referred_list_options();
															foreach ($referidos as $key => $value) {
																echo "<option value='{$key}'>{$value}</option>";
															}
														?>
	                                                </select>
												</div>
											</div>

											<div class="vlz_sub_seccion">
												<div class="vlz_cell100">
													<textarea data-title="Ingresa una descripción de al menos 50 caracteres incluyendo los espacios." class='vlz_input jj_desc' id='descripcion' name='descripcion' placeholder='Preséntate con la comunidad Kmimos' required minlength="50"></textarea>
												</div>
											</div>

										</div>
									
										<div class="vlz_cell50 jj_input_cell00">

											<div class="vlz_seccion">
												<div class="vlz_img_portada">
					                                <div class="vlz_img_portada_fondo" style="background-image: url(<?php echo get_template_directory_uri()."/images/noimg.png"; ?>);"></div>
					                                <div class="vlz_img_portada_normal" style="background-image: url(<?php echo get_template_directory_uri()."/images/noimg.png"; ?>);"></div>
					                                <div class="vlz_cambiar_portada">
					                                	Subir Foto
					                                	<input type="file" id="portada" name="portada" accept="image/*" />
													</div>
			                                	</div>
				                                <input type="text" id="vlz_img_perfil" name="vlz_img_perfil" class="vlz_input" style="    visibility: hidden; height: 0px !important; margin: 0px; padding: 0px;" value="" data-title="Debes cargar una foto. Fomatos aceptados: png, jpg, jpeg, gif" required />
											</div>

										</div>

									</div>

									<h2 class="vlz_titulo_interno">Datos de Acceso</h2>
									
									<div class="vlz_seccion">

										<div class="vlz_cell25">
											<!-- data-toggle="tooltip" data-placement="top" -->
											<input data-title="Ingresa un usuario<br>Este debe tener una longitud de al menos 3 caracteres."  title="El nombre de usuario que colocaste aquí es con el que vas a ingresar en tu perfil y tu nombre y apellido será utilizado en las reservas" type='text' id='username' name='username' class='vlz_input' placeholder='Nombre de Usuario' required minlength="3">
										</div>

										<div class="vlz_cell25">
											<input data-title="Ingresa tu E-mail<br>Ej: xxxx@xxx.xx" autocomplete="off" type='text' id='email' name='email' class='vlz_input' placeholder='E-mail' required pattern="^[\w._%-]+@[\w.-]+\.[a-zA-Z]{2,4}$" title="Ej. xxxx@xxxxx.xx">
										</div>
																				
										<div class="vlz_cell25">
											<input 
												type='password' 
												id='clave' 
												name='clave' 
												data-title="<strong>Las contraseñas son requeridas y deben ser iguales</strong>" 
												class='vlz_input' 
												 
												placeholder='Contraseña' 
												required 
												autocomplete="off"
											>
										</div>
										
										<div class="vlz_cell25">
											<input 
												type='password' 
												id='clave2' 
												name='clave2' 
												data-title="<strong>Las contraseñas son requeridas y deben ser iguales</strong>" 
												class='vlz_input' 
												 
												placeholder='Contraseña' 
												required 
												autocomplete="off"
											>
										</div>
										
									</div>

									<h2 class="vlz_titulo_interno">Datos de Ubicaci&oacute;n</h2>
									
									<div class="vlz_seccion" style="margin: 0 !important;">

										<div class="vlz_sub_seccion" style="margin: 0 !important;">

											<div class="vlz_contenedor_listados">
												<select id="estado" name="estado" class="vlz_input" data-title="Debe seleccionar un municipio" required>
													<option value="">Seleccione un municipio</option>
													<?php
														global $wpdb;

													    $estados = $wpdb->get_results("SELECT * FROM states WHERE country_id = 1 ORDER BY name ASC");
													    $str_estados = "";
													    foreach($estados as $estado) { 
													        $str_estados .= "<option value='".$estado->id."'>".$estado->name."</option>";
													    } 

													    echo $str_estados = utf8_decode($str_estados);
													?>
												</select>
											</div>

											<div class="vlz_contenedor_listados">
												<select id="municipio" name="municipio" class="vlz_input" data-title="Debe seleccionar una Localidad" required>
													<option value="">Seleccione una localidad</option>
												</select>
											</div>

											<div class="vlz_contenedor_dir">
												<input type='text' id='direccion' name='direccion' class='vlz_input' placeholder='Direcci&oacute;n' data-title="Debe agregar una Dirección">
											</div>

											<input type="hidden" class="geolocation" id="latitud" name="latitud" placeholder="Latitud" step="any" value="" />
											<input type="hidden" class="geolocation" id="longitud" name="longitud" placeholder="Longitud" step="any" value="" />


										</div>

										<script type="text/javascript">
											var edos = jQuery("#estado");
            								var mpos = jQuery("#municipio");

											edos.change(function(){
								                vlz_ver_municipios();
								            });

								            mpos.change(function(){
								                vlz_coordenadas();
								            });

								            function vlz_ver_municipios(){
								                var id =  jQuery("#estado").val();
								                var txt = jQuery("#estado option:selected").text();

								                jQuery.ajax( {
								                    method: "POST",
								                        data: { estado: id },
								                    url: "<?php echo get_template_directory_uri(); ?>/vlz/ajax_municipios_2.php",
								                    beforeSend: function( xhr ) {
								                        jQuery("#municipio").html("<option value=''>Cargando Localidades</option>");
								                    }
								                }).done(function(data){
								                    jQuery("#municipio").html("<option value=''>Seleccione una Localidad</option>"+data);
								                    vlz_coordenadas();
								                });
								            }

								            function vlz_coordenadas(){
								                var estado = jQuery("#estado option:selected").text();
								                var municipio_val = jQuery("#municipio option:selected").val();
								                var municipio = jQuery("#municipio option:selected").text();

								                var adress = "colombia+"+estado;
								                if( municipio_val != "" ){ 
								                    adress+="+"+municipio; 
								                }

								                jQuery.ajax({ 
								                    url: 'https://maps.googleapis.com/maps/api/geocode/json?address='+adress+'&key=AIzaSyD-xrN3-wUMmJ6u2pY_QEQtpMYquGc70F8'
								                }).done(function(data){
								                    var location = data.results[0].geometry.location;
								                    var dir = data.results[0].formatted_address;

								                    jQuery("#latitud").attr("value", location.lat);
								                    jQuery("#longitud").attr("value", location.lng);
								                    jQuery("#direccion").attr("value", dir);
								                });
								            } 
										</script>

									</div>

									<h2 class="vlz_titulo_interno">Datos como Cuidador</h2>

									<div class="vlz_seccion">

										<div class="vlz_cell25">
											<input type='number' id='num_mascotas_casa' min='0' name='num_mascotas_casa' class='vlz_input' placeholder='Num. de mascotas en casa' required>
										</div>
										
										<div class="vlz_cell25">
											<select class='vlz_input' id='num_mascotas_aceptadas' name='num_mascotas_aceptadas' required>
												<option value="">Num. de mascotas aceptadas</option>
												<?php
													$anio = date("Y");
													for ($i=1; $i <= 6; $i++) { 
														echo '<option value="'.$i.'">'.$i.'</option>';
													}
												?>
											</select>
										</div>
										
										<div class="vlz_cell25">
											<select class='vlz_input' id='cuidando_desde' name='cuidando_desde' required>
												<option value="">Cuidando desde</option>
												<?php
													$anio = date("Y");
													for ($i=$anio; $i > 1900; $i-=1) { 
														echo '<option value="'.$i.'">'.$i.'</option>';
													}
												?>
											</select>
										</div>
										
										<div class="vlz_cell25">
											<select class='vlz_input' id='emergencia' name='emergencia' required>
												<option value="">&#191;Transporte de Emergencia?</option>
												<option value="1">Si</option>
												<option value="0">No</option>
											</select>
										</div>
										
									</div>

									<h2 class="vlz_titulo_interno">&#191;Qu&eacute; Tama&ntilde;os tienen tus Mascotas?</h2>
																	
									<div class="vlz_seccion">

										<?php
											foreach ($tam as $key => $value) {
												echo '
													<div class="vlz_cell25">
														<div class="vlz_input vlz_no_check vlz_pin_check"><input type="hidden" id="tengo_'.$key.'" name="tengo_'.$key.'" value="0">'.$value.'</div>
													</div>
												';
											}
										?>
										
									</div>

									<div class="vlz_seccion">

										<div class="vlz_cell50 jj_input_cell00">

											<h2 class="vlz_titulo_interno">&#191;Qu&eacute; Edades Aceptas?</h2>

											<div class="vlz_cell50">
												<div class="vlz_input vlz_no_check vlz_pin_check"><input type="hidden" id="cachorros" name="cachorros" value="0">Cachorros</div>
											</div>
											
											<div class="vlz_cell50 ">
												<div class="vlz_input vlz_no_check vlz_pin_check"><input type="hidden" id="adultos" name="adultos" value="0">Adultos</div>
											</div>

										</div>

										<div class="vlz_cell50 jj_input_cell00">
											
											<h2 class="vlz_titulo_interno">&#191;Qu&eacute; Condiciones Aceptas?</h2>

											<div class="vlz_cell50 jj_input_cell00">
												<div class="vlz_input vlz_no_check vlz_pin_check"><input type="hidden" id="esterilizado" name="esterilizado" value="0">No Esterilizados</div>
											</div>

										</div>
																			
									</div>

									<h2 class="vlz_titulo_interno">&#191;Qu&eacute; Tama&ntilde;o de Mascotas Aceptas?</h2>
																	
									<div class="vlz_seccion">

										<?php
											foreach ($tam as $key => $value) {
												echo '
													<div class="vlz_cell25">
														<div class="vlz_input vlz_no_check vlz_pin_check"><input type="hidden" id="acepto_'.$key.'" name="acepto_'.$key.'" value="0">'.$value.'</div>
													</div>
												';
											}
										?>
										
									</div>

									<h2 class="vlz_titulo_interno">&#191;Qu&eacute; Comportamientos Aceptas?</h2>
																	
									<div class="vlz_seccion">

										<?php
								
											$Comportamientos = array(
												"sociables" 		=> "Sociables",
												"no_sociables" 		=> "No sociables",
												"agresivos_perros"  => "Agresivos con perros",
												"agresivos_humanos" => "Agresivos con humanos",
											);

											foreach ($Comportamientos as $key => $value) {
												echo '
													<div class="vlz_cell25">
														<div class="vlz_input vlz_no_check vlz_pin_check"><input type="hidden" id="comportamiento_'.$key.'" name="comportamiento_'.$key.'" value="0">'.$value.'</div>
													</div>
												';
											}
										?>
										
									</div>

									<h2 class="vlz_titulo_interno">Datos de t&uacute; Propiedad</h2>

									<div class="vlz_seccion">

										<div class="vlz_cell25">
											<select class='vlz_input' id="tipo_propiedad" name="tipo_propiedad" required>
												<option value="">Tipo de Propiedad</option>
												<option value="1">Casa</option>
												<option value="2">Departamento</option>
											</select>
										</div>
										
										<div class="vlz_cell25">
											<div class="vlz_input vlz_no_check vlz_pin_check"><input type="hidden" id="areas_verdes" name="areas_verdes" value="0">&#191;Tiene Areas Verdes?</div>
										</div>
										
										<div class="vlz_cell25">
											<div class="vlz_input vlz_no_check vlz_pin_check"><input type="hidden" id="tiene_patio" name="tiene_patio" value="0">&#191;Tiene Patio?</div>
										</div>
																			
									</div>

								</div>

								<div class="vlz_parte">
									<div class="vlz_titulo_parte">Informaci&oacute;n sobre los Servicios que Brindas</div>

									<h2 class="vlz_titulo_interno">Horario</h2>

									<div>

										<div class="vlz_cell25">
											<select class='vlz_input' id="entrada" name="entrada" required>
												<option value="">Hora de Entrada</option>
												<?php
													$dial = " a.m.";
													for ($i=7; $i < 20; $i++) {

														$t = $i;
														if( $t > 12 ){ 
															$t = $t-12; $dial = ' p.m.';
														}else{
															if($t == 12){
																$dial = ' m';
															}
														}
														if( $t < 10 ){ $x = "0"; }else{ $x = ''; }
														if( $i < 10 ){ $xi = "0"; }else{ $xi = ''; }

														echo '<option value="'.$xi.$i.':00:00" data-id="'.$i.'">'.$x.$t.':00 '.$dial.'</option>';
														if( $i != 19){
															echo '<option value="'.$xi.$i.':30:00" data-id="'.$i.'.5">'.$x.$t.':30 '.$dial.'</option>';
														}
													}
												?>
											</select>
										</div>

										<div class="vlz_cell25">
											<select class='vlz_input' id="salida" name="salida" required>
												<option value="">Hora de Salida</option>
												<?php
													$dial = " a.m.";
													for ($i=7; $i < 20; $i++) {

														$t = $i;
														if( $t > 12 ){ 
															$t = $t-12; $dial = ' p.m.';
														}else{
															if($t == 12){
																$dial = ' m';
															}
														}
														if( $t < 10 ){ $x = "0"; }else{ $x = ''; }
														if( $i < 10 ){ $xi = "0"; }else{ $xi = ''; }

														echo '<option value="'.$xi.$i.':00:00" data-id="'.$i.'">'.$x.$t.':00 '.$dial.'</option>';
														if( $i != 19){
															echo '<option value="'.$xi.$i.':30:00" data-id="'.$i.'.5">'.$x.$t.':30 '.$dial.'</option>';
														}
													}
												?>
											</select>
										</div>
								
									</div>
							
									<h2 class="vlz_titulo_interno">Precios de Hospedaje </h2>
			 
									<div id="jj_modal" class="vlz_modal">

										<div class="vlz_modal_interno">

											<div class='vlz_modal_fondo' onclick="jQuery('#jj_modal').css('display', 'none');"></div>

											<div class="vlz_modal_ventana jj_modal_ventana" style="margin-top: 12%!important;">

												<div class="vlz_modal_titulo">Precios Sugeridos</div>

												<div class="vlz_modal_contenido" style="height: auto;">
														<p align="justify">
															Kmimos no te obliga a fijar un precio, sin embargo quisiéramos sugerir que sigas la siguiente tabla, la cual está creada en base a las tendencias de mercado actuales
														</p>
														<br>
														<table style="border-radius: 2px">
															<tr>
																<td>Tallas pequeñas:</td>
																<td>(0 a 25 cm de alto) 20 a 30 soles</td>
															</tr>
															<tr>
																<td>Tallas medianas:</td>
																<td>(25 a 50 cm de alto) 25 a 35 soles</td>
															</tr>
															<tr>
																<td>Tallas grandes</td>
																<td>(50 a 80 cm de alto) 30 a 40 soles</td>
															</tr>
															<tr>
																<td>Tallas gigantes:</td>
																<td>(80cm en adelante de alto) 35 a 50 soles</td>
															</tr>
														</table>
														<br>
														<p align="justify">
															<strong>IMPORTANTE:</strong> recuerda que siempre podrás colocar el precio que a ti mejor se te acomode
														</p>
														
														<p align="justify">
															<strong>NOTA</strong>: en esta sección deberás colocar el precio que deseas percibir como ingreso. sobre dicho precio, el sistema le incrementará un 20% de manera automática. Cuando un cliente haga una búsqueda y se le despliegue los diferentes cuidadores disponibles para él, el precio que le mostrará la página será tu costo mas dicho 20%.
														</p>
												</div>
												<div class="vlz_modal_pie" style="border-radius: 0px 0px 5px 5px!important; height: 70px;">

													<input type='button' style="text-align: center;" class="vlz_boton_siguiente" value='Cerrar' onclick="jQuery('#jj_modal').css('display', 'none');" />

												</div>
											</div>
										</div>
									</div>
									<!-- /Modal "Precios de Hosedajes"-->

									<div class="vlz_seccion">
										<?php
											$txts = array(
												"pequenos" => "Kmimos no te obliga a fijar un precio, sin embargo quisiéramos sugerir que sigas la siguiente tabla, la cual está creada en base a las tendencias de mercado actuales es de 120 pesos por noche",
												"medianos" => "Kmimos no te obliga a fijar un precio, sin embargo quisiéramos sugerir que sigas la siguiente tabla, la cual está creada en base a las tendencias de mercado actuales es de 180 pesos por noche",
												"grandes"  => "Kmimos no te obliga a fijar un precio, sin embargo quisiéramos sugerir que sigas la siguiente tabla, la cual está creada en base a las tendencias de mercado actuales es de 220 pesos por noche",
												"gigantes" => "Kmimos no te obliga a fijar un precio, sin embargo quisiéramos sugerir que sigas la siguiente tabla, la cual está creada en base a las tendencias de mercado actuales es de 250 pesos por noche"
											);
											foreach ($tam as $key => $value) {
												echo '
													<div class="vlz_cell25">
														<input type="text" class="vlz_input" id="hospedaje_'.$key.'" name="hospedaje_'.$key.'" 
															data-minvalue data-charset="num"
															placeholder="'.$value.'" >
													</div>
												';
											}
										
										?>

										<div class='no_error' id='error_hospedaje' data-id="hospedaje_pequenos" style="margin: 3px 6px 0px;">Debe llenar al menos uno de los campos</div>

										<?php // La configuracion esta en la primera linea de este archivo
										echo $mensajes_alerta; 
										?>
									</div>

									<h2 class="vlz_titulo_interno" style="margin-top: 10px;">Servicios Adicionales</h2>

									<div class="vlz_seccion">

										<div class="vlz_contenedor_adicionales"></div>

										<div class="vlz_boton_agregar">Agregar Servicio Adicional</div>
																			
									</div>
									<?php // La configuracion esta en la primera linea de este archivo
									echo $mensajes_alerta;
									?> 

									<div>

										<div class="vlz_cell50 jj_cell50">
											<h2 class="vlz_titulo_interno">Transportaci&oacute;n Sencilla</h2>
											<?php
											    $rutas = array(
											        "corto" => "Cortas",
											        "medio" => "Medias",
											        "largo" => "Largas"
											    );

												foreach ($rutas as $key => $value) {
													echo '
														<div class="vlz_cell33">
															<input type="text" class="vlz_input" id="trans_sencillo_'.$key.'"
															data-minvalue data-charset="num"
															name="trans_sencillo_'.$key.'" placeholder="'.$value.'">
														</div>
													';
												}
											?>
										</div>

										<div class="vlz_cell50 jj_cell50">
											<h2 class="vlz_titulo_interno">Transportaci&oacute;n Redonda </h2>
											<?php
												foreach ($rutas as $key => $value) {
													echo '
														<div class="vlz_cell33 jj_input_cell00">
															<input type="text" class="vlz_input" 
																data-minvalue data-charset="num"
																id="trans_redonda_'.$key.'" 
																name="trans_redonda_'.$key.'" 
																placeholder="'.$value.'">
														</div>
													';
												}
											?>
										</div>

										<?php // La configuracion esta en la primera linea de este archivo
										echo $mensajes_alerta;
										?>
									</div>

									<h2 class="vlz_titulo_interno">Otros Servicios <!--<span>Ingrese el precio de cada servicio adicional que desee brindar</span>--></h2>

									<div class="vlz_seccion jj_input_cell00">

										<?php
										    $adicionales_extra = array(
										        "bano"                      => "Baño",
										        "corte"                     => "Corte de pelo y uñas",
										        "limpieza_dental"           => "Limpieza Dental",
										        "visita_al_veterinario"     => "Visita al Veterinario",
										        "acupuntura"                => "Acupuntura"
										    );

											foreach ($adicionales_extra as $key => $value) {
												echo '
													<div class="vlz_cell20 jj_input_cell00">
														<input type="text" class="vlz_input" id="adicional_'.$key.'"
														data-minvalue data-charset="num"
														 name="adicional_'.$key.'" placeholder="'.$value.'">
													</div>
												';
											}
										?>

									</div>

									<?php // La configuracion esta en la primera linea de este archivo
									echo $mensajes_alerta;
									?>

									<div class="vlz_contenedor_botones_footer">
										<div class="vlz_bloqueador"></div>
										<input type='button' id="vlz_boton_modal_terminos" class="vlz_boton_siguiente" value='Registrarme' onclick="vlz_validar()" />
									</div>

									<div class="vlz_modal" id="terminos_y_condiciones">

										<div class="vlz_modal_interno">

											<div id="vlz_modal_cerrar_registrar" class='vlz_modal_fondo' onclick="jQuery('.vlz_modal').css('display', 'none');"></div>

											<div class="vlz_modal_ventana">

												<div id="vlz_titulo_registro" class="vlz_modal_titulo"></div>

												<div id="vlz_cargando" class="vlz_modal_contenido" style="display: none; max-height: 350px;">

												</div>

												<div id="vlz_terminos" class="vlz_modal_contenido">
													<h4>Política De Privacidad</h4>
													<p>Kmimos. (en adelante denominado "Kmimos" o "kmimos.mx" o "kmimos.com.mx" o "kmimos.la") respeta su privacidad. Debido a que reunimos información importante de nuestros usuarios, visitantes, suscriptores y clientes (colectivamente "usted" o "su"), hemos establecido esta Política de privacidad como un medio para comunicar nuestra información de recopilación y difusión prácticas. Al acceder o utilizar kmimos.la (el "Sitio") o cualquiera de nuestras aplicaciones móviles o servicios (el Sitio, y este tipo de aplicaciones y servicios, colectivamente, "Servicios"), usted reconoce y acepta que esta Política de Privacidad y también de acuerdo a los Términos de Servicio. Podemos compartir información con o entre nuestros afiliados o de los sitios de nuestra propiedad o de control, pero tal intercambio de información es siempre regido bajo los términos de esta Política de Privacidad.</p>
													<p>Nuestros objetivos principales en la recopilación de información son para proporcionar y mejorar nuestros servicios, y para que los usuarios puedan disfrutar de los Servicios. Al crear una cuenta vamos a configurar un perfil Kmimos para usted. El perfil generalmente contendrá su nombre completo, ubicación y detalles del servicio de cuidado y puede incluir otro contenido o información que usted proporciona para los propósitos de tu perfil. Estos perfiles se pondrán a disposición del público en todo el sitio.</p>
													<h4>Visitante del Sitio / datos de usuario</h4>
													<p>a) Recopilamos información personal (como su nombre, dirección física, número de teléfono y dirección de correo electrónico) y otra información que proporcione en relación con la prestación o la mejora de los Servicios (incluyendo para procesar su inscripción o responder a una solicitud). Además, si usted proporciona información personal por una cierta razón, podemos usar la información personal en relación con la razón por la cual fue proporcionada. Cuando usted utilice los Servicios, también recopilamos información de pago que es necesario para cumplir con sus números de identificación de orden y de los contribuyentes (incluyendo en algunos casos, números de seguridad social en su caso) de las obligaciones derivadas del estado aplicable o leyes o regulaciones federales. Toda la información de identificación personal que se denominan colectivamente en lo sucesivo como "Información Personal". Si usted llena un formulario de contacto o envíenos un correo electrónico, usaremos esa información para responder a su solicitud.</p>
													<p>Su información personal no será distribuida o compartida con terceros a menos que sea (a) Decidir sobre cualesquiera de negocios a medida que nos han contratado para hacer (por ejemplo, si usted es un cuidador, vamos a compartir su información personal con los usuarios que reservan una servicio de cuidado con usted o de otra manera para proporcionar los servicios (por ejemplo, podemos compartir su información personal con nuestros proveedores de servicios, consultores, agentes y representantes, a fin de realizar ciertas funciones en nuestro nombre ), (b) para cumplir con las leyes estatales o federales aplicables o regulaciones, procesos legales u obligaciones y / o solicitudes de aplicación de la ley, proteger y defender los derechos o la propiedad del Kmimos, actuar en circunstancias urgentes para proteger la seguridad personal de los usuarios de los Servicios o el público, o para proteger contra la responsabilidad legal, (c) con el fin de llevar a cabo cualquier tipo de negocio, ya que, a nuestro exclusivo criterio subjetivo, considere razonable, o (d) en relación con una venta, fusión, reorganización, disolución o caso similar en el que la información personal es parte de los activos transferidos. Además, como se señaló anteriormente, cualquier información personal incluido en su perfil estará disponible al público y que puede compartir su información personal con nuestros afiliados.</p>
													<p>También podemos utilizar su información personal u otra información para comunicarnos con usted en el futuro para informarle sobre productos o servicios que creemos serán de interés para usted.</p>
													<p>Usted voluntariamente nos proporcione información personal, usted está consintiendo a nuestro uso de la misma de acuerdo con esta Política de Privacidad. Si usted proporciona información personal a nosotros, usted reconoce y acepta que dicha información personal puede ser transferida desde su ubicación actual a las oficinas y servidores de Kmimos y los terceros autorizados a que se refiere el presente documento se encuentra en los Estados Unidos Mexicanos.</p>
													<p>b) Reunimos y guardamos información personal de forma automática y en el agregado. Utilizamos la información que recopilamos para proporcionar y mantener los servicios que consideremos apropiadas en nuestra discreción. Al visitar o utilizar los servicios, podemos almacenar algunos o todos de los siguientes: la dirección IP desde la que se accede a los servicios, la fecha y la hora, la dirección IP del sitio web desde el que se conectó a los Servicios, el nombre del archivo o palabras que ha buscado en nuestro Sitio, artículos hace clic en una página y el navegador y sistema operativo utilizado. Esta información se utiliza para medir el número de visitantes a las drentes secciones de nuestro sitio e identificar el rendimiento del sistema.</p>
													<p>
													c) Utilizamos cookies persistentes para ganar las estadísticas totales sobre el uso del sitio para entender cómo las personas usan el sitio y cómo podemos hacerlo mejor. Usted puede tener el software en su computadora que le permitirá rechazar o desactivar las cookies de Internet, pero si lo hace, algunas de las características de los servicios no puede funcionar adecuadamente para usted. Para obtener instrucciones sobre cómo eliminar las cookies de su disco duro, vaya a las opciones del navegador.
													<br>
													Utilizamos los servicios de métricas web para rastrear la actividad en los Servicios. Utilizamos esta información para ayudarnos a desarrollar los Servicios, analizamos los patrones de uso, y para que los servicios más útiles. Esta información no se utiliza para asociar los términos de búsqueda o patrones de navegación del sitio con los usuarios individuales.
													</p>
													<h4>Niños</h4>
													<p>No permitimos a sabiendas cualquier visitante o usuarios menores de dieciocho (18) para utilizar o no el acceso a los Servicios. No deseamos para recoger cualquier información personal (o cualquier información en absoluto) de cualquier persona menor de 18 años de edad. Si eres menor de 18 años de edad, es posible que no utilices los Servicios.</p>
													<h4>Seguridad</h4>
													<p>Tenga en cuenta que los datos que se transporta a través de una red abierta, como Internet o el correo electrónico, puede ser accesible a cualquier persona. No podemos garantizar la confidencialidad de cualquier comunicación o material transmitido a través de este tipo de redes abiertas. Al revelar cualquier información personal a través de una red abierta, debe seguir siendo conscientes del hecho de que es potencialmente accesible a los demás, y por lo tanto, puede ser recogida y utilizada por otras personas sin su consentimiento. Sus datos pueden perderse durante la transmisión o pueden ser accedidos por terceros no autorizados. No aceptamos responsabilidad alguna por pérdidas directas o indirectas en cuanto a la seguridad de su información personal o datos durante su transferencia a través de Internet. Por favor, utilice otro medio de comunicación si usted piensa que esto es necesario o prudente por razones de seguridad.</p>
													<p>Por razones de seguridad de red y para asegurar que nuestros servicios se mantienen a disposición de todos los usuarios, que emplean programas de software comercial para controlar el tráfico de red y tratar de identificar intentos no autorizados de cargar o cambiar información o causar daños. Toda la información de pago se transmite a través de la tecnología Secure Socket Layer (SSL), encripta en nuestra pasarela de pago, y sólo accesible por las personas autorizadas con los derechos especiales de acceso a dichos sistemas que están obligados a mantener la información confidencial.</p>
													<h4>Enlaces externos Sitio</h4>
													<p>Kmimos puede enlazar a sitios web o servicios de terceros que pueden incluir o ofrecer productos o servicios de terceros. Cuando acceda a un sitio vinculado es posible que la divulgación de información privada. Es su responsabilidad mantener la información privada y confidencial. Estos sitios de terceros tienen políticas de privacidad separadas e independientes. Kmimos no controla ni garantiza la exactitud, relevancia, puntualidad o integridad de la información contenida en un sitio web de terceros o servicio y no tiene responsabilidad alguna por los contenidos y actividades de estos sitios web o servicios. Si hace clic en un enlace a un sitio web de terceros o servicio, se le deja los servicios y está sujeto a las políticas de privacidad y seguridad de los propietarios / patrocinadores del sitio web de terceros o servicio y no a esta Política de Privacidad. Kmimos no puede autorizar el uso de materiales con derechos de autor contenidos en los sitios web o servicios vinculados. Los usuarios deben solicitar la autorización del patrocinador del sitio web o servicio vinculado. Kmimos no es responsable de las transmisiones de los usuarios reciben de sitios web o servicios vinculados.</p>
													<h4>Prohibiciones</h4>
													<p>Kmimos no voluntariamente o intencionalmente enlazar a cualquier sitio web que exhibe el odio, prejuicio o discriminación. Kmimos se reserva el derecho a denegar o retirar cualquier enlace por cualquier razón. Nosotros buscamos proteger la integridad de nuestros servicios en todo momento y agradecemos cualquier comentario.</p>
													<h4>Exclusiones</h4>
													<p>Esta política de privacidad no se aplica a cualquier información personal recopilada por Kmimos que no sea información personal recopilada a través de los Servicios. Esta política de privacidad no se aplicará a cualquier información no solicitada que usted proporciona a Kmimos través de los Servicios a través de cualquier otro medio. Esto incluye, pero no se limita a, la información publicada en las áreas públicas de los servicios, tales como los comentarios, ideas para nuevos productos o servicios o modificaciones en los productos o servicios existentes y otras comunicaciones no solicitadas (colectivamente, "la información no solicitada") . Toda la información no solicitada se considerará como no confidencial y Kmimos será libre de reproducir, usar, revelar y distribuir la información no solicitada a otros sin limitación o atribución.</p>
													<h4>Cambios a nuestra Política de Privacidad</h4>
													<p>Podemos revisar esta Política de Privacidad de vez en cuando. Cuando hacemos cambios a esta Política de Privacidad, que se reflejan en esta página. Cualquier política de privacidad revisada se aplicará tanto a la información que ya tenemos sobre usted en el momento del cambio, y cualquier información generada o recibida después de que el cambio entre en vigencia. Le recomendamos encarecidamente que vuelva a leer periódicamente esta Política de Privacidad, para ver si ha habido algún cambio en nuestras políticas que pueden afectarle. El uso continuado de los Servicios después de cualquier cambio o revisión de esta Política de Privacidad deberá indicar su acuerdo con los términos de dicha Política de privacidad actualizada.</p>
													<p>Por lo consiguiente acepto la Política de Privacidad dispuesta en este documento.</p>
													<h3>
													Kmimos
													<br>
													Términos de Servicio
													<br>
													Última actualización: 08 de Abril del 2015
													</h3>
													<p>
													Kmimos, (en adelante denominado "Kmimos", "kmimos.mx", "kmimos.com.mx", "kmimos.la", "nosotros", "nos" o "nuestro") proporciona una plataforma en línea que conecta a los dueños de perros con amantes y/o dueños del perros que desean alojar perros en su hogar y / u ofrecer otros servicios relacionados con el perro a través de la página web kmimos.la (como plataforma en línea, junto con cualquier software, aplicaciones relacionadas o funcionalidad, y dicho sitio web, colectivamente, el "Sitio"). Al utilizar el Sitio, usted acepta cumplir y estar legalmente obligado por los términos y condiciones de estos Términos de Servicio ("Términos"), independientemente de si usted se convierte en un usuario registrado del sitio. Estas Condiciones regulan el acceso y uso del Sitio y todo el contenido (que se define más adelante), y constituyen un acuerdo legal vinculante entre usted y Kmimos. Si usted no está de acuerdo con estos términos, usted no tiene derecho a obtener información o de lo contrario continuar utilizando el Sitio y no debe utilizar el Sitio.
													</p>
													<p>El sitio está destinado únicamente a personas que tienen 18 años o más. Cualquier acceso o uso del Sitio por cualquier persona menor de 18 años está expresamente prohibido. Al acceder o utilizar el Sitio, usted representa y garantiza que usted tiene 18 años o más.</p>
													<p>El sitio incluye una plataforma en línea TRAVÉS QUE ACOGE (definido más adelante) PUEDEN CREAR EL LISTADO DE SERVICIOS DE CUIDADO PROPORCIONADO (definido más adelante) y clientes (definido más adelante) PUEDEN RESERVAR Y ENTENDER mas de los servicios que el CUIDADOR ofrezca. KMIMOS no es un asegurador ni ajustador de servicios de seguro veterinario, así mismo KMIMOS solo es el vínculo de comunicación para celebrar acuerdos entre el CUIDADOR y el CLIENTE. KMIMOS NO TIENE CONTROL SOBRE LA CONDUCTA DE LOS CLIENTES, CUIDADORES, PERROS, DUEÑOS DEL PERRO, O CUALESQUIERA OTROS USUARIOS DEL SITIO O SERVICIOS DE ESTADÍA-PROPORCIONADA Y KMIMOS RENUNCIA A TODA RESPONSABILIDAD AL RESPECTO. DISTINTOS APARTADOS DEL SITIO Y CONDICIONES AFECTAN CUIDADORES Y CLIENTES drente, así que por favor asegúrese de leer ATENTAMENTE ESTAS CONDICIONES.</p>
													<h4>Términos clave</h4>
													<p>"Contenido" significa el texto, gráficos, imágenes, música, software, audio, vídeo, información, documentos, recopilaciones, datos u otros materiales.</p>
													<p>"CUIDADOR" o “Cuidador" significa una persona que complete el proceso de registro de cuenta de Kmimos y crea un perfil a través del Sitio para brindar un servicio de cuidado de perros de clientes que reserven en el Sitio de Kmimos o kmimos.la</p>
													<p>"SERVICIOS DE CUIDADO PROPORCIONADO", los servicios relacionados con el perro proporcionados por los clientes.</p>
													<p>"SERVICIOS DE ESTADÍA-PROPORCIONADA", los servicios relacionados de estadía, estadía, reservación u hospedaje de mascotas a cargo de un cuidador registrado en Kmimos.</p>
													<p>" LISTADO DE SERVICIOS DE CUIDADO PROPORCIONADO", refiere a todos los servicios que un cuidador puede ofrecer a los amantes o dueños de perros para beneficio de su mascota en su estadía  fuera de ella, en donde Kmimos solo es intermediario de la comunicación pero no es responsable de estos servicios.</p>
													<p>"PROVEEDORES tercero", tercera parte representante de marcas, contratistas, distribuidores, comerciantes o patrocinadores de Kmimos.</p>
													<p>"CLIENTE"  significa una persona que esta interesa en dejar a su perro a cargo de un cuidador por el tiempo estipulado por la misma persona y que esta sujeto a los requerimientos y registros que Kmimos requiere para continuar con la reservación. Si alguno de los requerimientos no se ven completados Kmimos se reserva el derecho a negar la reservación. De igual manera, es cualquier persona que entre al Sitio y este interesada en el servicio pero no haga ninguna reservación.</p>
													<h4>I.  Acceso y Cumplimiento</h4>
													<p>Al acceder al Sitio, usted acepta que quedará vinculado por los términos de todas las leyes y regulaciones aplicables y que usted manifiesta y garantiza que tiene el derecho legal de hacerlo y está cumpliendo con todas las leyes y regulaciones aplicables en la jurisdicción donde usted reside. Usted acepta que podemos modificar este Acuerdo y las modificaciones entrarán en vigor inmediatamente después de su publicación. Usted acepta revisar estos Términos cada vez que utilice el Sitio para estar al tanto de las modificaciones. Acceso o uso del Sitio Continuación Se considerará una prueba concluyente de su aceptación del acuerdo modificado.</p>
													<h4>II. Cómo funciona el sitio</h4>
													<p>El sitio se puede utilizar para facilitar la cotización y reserva el servicio de un Cuidador. Los servicios de los Cuidadores se incluyen en el listado de cuidadores del sitio. Usted puede ver el listado de servicios como un visitante no registrado en el Sitio; Sin embargo, si desea reservar cualquiera de los Servicios de algún Cuidador deberá llenar los datos correspondientes en la parte reservación y acceder a compartir sus datos con el o los Representantes de reservación de Kmimos. De ser el caso para ser un Cuidador, primero debe registrarse para crear una cuenta y posteriormente pasar por el procesos que se a diseñado por Kmimos para certificar a los Cuidadores. Este proceso esta sujeto a cambios y actualización según la necesidad que Kmimos determine.</p>
													<p>Como se indicó anteriormente, Kmimos hace una plataforma o mercado disponible con la tecnología relacionada para los clientes y sus cuidadores a conocerse en línea y los arreglos para la reserva de un Cuidador. Kmimos no ofrece servicios relacionados con el perro. Las responsabilidades de Kmimos se limitan a: (i) facilitar la disponibilidad del Sitio y (ii) que sirve como agente limitado de cada cuidador con el propósito de aceptar pagos de los Clientes en nombre del Cuidador en el que el caso lo amerite.</p>
													<p>KMIMOS NO ES RESPONSABLE DE Y NIEGA TODA RESPONSABILIDAD RELACIONADA CON TODAS Y TODOS LOS CUIDADORES Y SERVICIOS DE CUIDADO PROPORCIONADO. POR CONSIGUIENTE, CUALQUIER RESERVA DE SERVICIOS DE CUIDADO-PROPORCIONADO SE HARÁN EN RIESGO PROPIO DE CADA CLIENTE.</p>
													<h4>III.  Registro</h4>
													<p>Con el fin de ser un cuidador o cliente, se le pide que se registre con Kmimos. Si decide registrarse como Cuidador, usted se compromete a proporcionar y mantener información veraz, precisa, actualizada y completa sobre usted según lo solicitado por el proceso de registro del Cuidador. Datos de registro y cierta otra información sobre usted se rigen por nuestra política de privacidad. Si alguno de sus datos de registro es inexacta, incompleta o no actualizada, podremos finalizar su cuenta inmediatamente. Podemos rechazar una solicitud de registro si determinamos a nuestra sola discreción, que el solicitante no es un huésped adecuado o Cuidador que pueda proporcionar el Servicio de cuidado a mascotas. No tenemos ninguna obligación de revelar la razón de nuestra decisión de rechazar una solicitud. Usted no puede registrarse en el servicio si es menor de 18 años de edad.</p>
													<h4>IV. Servicio de Cuidado o listado de servicios de cuidado proporcionado</h4>
													<p>Como cuidador de la mascota "Cuidadores", puede crear una descripción de los servicios. Con este fin, se le pedirá una serie de preguntas acerca de los servicios de cuidado proporcionado, incluyendo, pero no limitado a, el lugar y las mascotas (si procede), el tipo y la disponibilidad de los servicios de cuidado-disponibles, la fijación de precios y relacionados con las reglas y las condiciones financieras. El repertorio que va a poner a disposición del público a través del Sitio. Otros clientes podrán reservar sus servicios como CUIDADOR a través del sitio en base a la información proporcionada en su perfil. Usted entiende y acepta que una vez que se asigna el precio de este tipo de servicio de cuidado proporcionado no puede ser alterado. Kmimos se reserva el derecho, en cualquier momento y sin previo aviso, para quitar o deshabilitar el acceso a cualquier perfil por cualquier razón, a su sola discreción, considere objetable por cualquier motivo, en violación de estas Condiciones o de otra manera perjudicial para el sitio.</p>
													<p>Usted reconoce y acepta que, como cuidador, usted es responsable por cualquier y todos los objetos que publique. En consecuencia, usted representa y garantiza que cualquier anuncio que publique y de la prestación de cualquier servicio de estadía que proporcionen en un perfil que publique (i) no violar los acuerdos que ha firmado con ningún tercero y (ii) (a) ser en cumplimiento con todas las leyes aplicables, incluyendo, pero no limitado a, las leyes que rigen el tratamiento de los animales y cualquier permisos o licencias de los requisitos federales, estatales o locales, y (b) no entrar en conflicto con los derechos de terceros.</p>
													<p>Cada Cuidador ES EL ÚNICO RESPONSABLE DE OBTENER TODOS LOS PERMISOS, LICENCIAS Y OTROS permisos necesarios para ofrecer o facilitar los servicios del transporte de perros u otros servicios de Cuidador Y KMIMOS NO ASUME NINGUNA RESPONSABILIDAD POR FALTA DE UN CUIDADOR para obtener permisos TALES, LICENCIAS O PERMISOS O DE OTRA MANERA CUMPLIR CON cualquier ley, regla o reglamento.</p>
													<p>Además, usted como cuidador también reconoce y acepta que ni Kmimos ni propietario (s) de un perro de los clientes tienen ninguna responsabilidad de reembolsar o cubrir cualquier daño material que puede ser causada por un perro de los clientes de otro modo, y por la presente que no está de acuerdo buscar cualquier reembolso u otros daños de Kmimos o propietario (s) de un perro de clientes en el caso de cualquier daño a la propiedad.</p>
													<h4>V.  Proceso de Certificación y registro como Cuidador</h4>
													<p>Kmimos se limita a reservarse el derecho a definir, actualizar o modificar el proceso de certificación según sean las necesidades que Kmimos manifieste. De igual forma el cuidador deberá aprobar este proceso para que su perfil este dado de alta exitosamente. Por lo que Kmimos notificara y se pondrá en contacto con un plazo de 72 horas a partir de que el interesado a ser cuidador decida iniciar su tramite como registro y cuidador certificado.</p>
													<p>
													De igual manera, si Kmimos ve necesario la actualización de los cuidadores, Kmimos deberá notificar a los CUIDADORES de esta actualización para que procedan a llevar acabo el proceso correspondiente en un plazo de 14 días naturales. De lo contrario se bloqueara el registro del sistema bajo el concepto de "FALTA DE ACTUALIZACION" en el que se podrá volver a activar una vez llevada la re-certificación.
													</p>
													<h4>VI. No aprobación</h4>
													<p>Al utilizar el Sitio, usted acepta que cualquier recurso legal o responsabilidad que busque obtener por acciones u omisiones de otros clientes o terceros estarán limitados a una reclamación contra los clientes particulares u otras terceras partes que causaron que el daño (o cuyo perro le causó daño) y que se compromete a no intentar imponer responsabilidad, o recurrir a los recursos legales de Kmimos con respecto a tales acciones u omisiones. De acuerdo con ello, los animamos a comunicarse directamente con otros clientes en el sitio con respecto a cualquier solicitud de Cuidador.</p>
													<p>Kmimos sirve como el agente autorizado limitado de los cuidadores a fin de aceptar pagos de los Clientes en nombre de los Cuidadores y se encarga de transmitir dichos pagos al Cuidador. Usted reconoce y acepta que, como cuidador, usted es responsable de sus propios actos y omisiones.</p>
													<p>Usted entiende y acepta que Kmimos no actúa como asegurador o como agente de contratación de seguros para usted como anfitrión o cliente. Si un miembro compra cualquiera de sus SERVICIOS DE ESTADÍA O ESTADÍA, cualquier acuerdo entre el cuidador y usted, y Kmimos no es parte en el mismo, Kmimos no se hace responsable de los daños o perjuicios que este acuerdo genere. No obstante lo anterior, Kmimos sirve como el agente autorizado limitado de los Cuidadores, a fin de aceptar pagos de los Cuidadores en nombre del Servicio de Estadía y se encarga de transmitir dichos pagos al Cuidador. Usted reconoce y acepta que, como Cuidador, usted es responsable de sus propios actos y omisiones.</p>
													<p>Si usted, como cliente, haga una reserva de un servicio de cuidado proporcionado y no puede recoger a su perro dentro de los siete (7) días (o el período de tiempo establecido en las leyes de abandono de los animales o la crueldad de la jurisdicción aplicable, si es anterior) después del final fecha de su reserva, usted acepta que Kmimos puede (pero no tiene obligación), a su sola discreción, poner a su perro en hogares de adopción y notificar a las autoridades. Usted acepta que usted será responsable y reembolsará Kmimos todos los costos y gastos de dicha acción, y usted acepta que no podrá estar sujeta a las leyes vigentes que pueden regir su fracaso para recuperar a su perro, incluyendo todo el abandono de animales aplicable o la crueldad leyes.</p>
													<h4>VII.  Información sobre el sitio web</h4>
													<p>Aunque Kmimos intenta mantener la integridad y exactitud de la información en el Sitio, no hacemos ninguna garantía en cuanto a su exactitud, integridad o veracidad. El Sitio puede contener errores tipográficos, inexactitudes u otros errores u omisiones. Así mismo, las adiciones no autorizadas, supresiones o modificaciones podrían hacerse al Sitio por terceros sin nuestro conocimiento o consentimiento. Si usted cree que la información contenida en el sitio es incorrecto o no autorizado, por favor infórmenos comunicándose con nosotros a través de la información proporcionada en el enlace "Contáctenos".</p>
													VIII. Tu información, fotos y videos
													<p>"Su Información" se define como cualquier información y materiales, incluyendo, sin limitación, fotografías, videos, entrevistas o información que usted proporciona a Kmimos u otros usuarios en relación con su registro y el uso de los Servicios. Usted es el único responsable de su información, y que actúa simplemente como un conducto pasivo para la distribución y publicación en línea de su información. Únicamente para permitir Kmimos utilizar su información, por lo que no estamos violando ningún derecho que pueda tener en esa información, este medio nos concede una licencia no exclusiva, mundial, perpetua, irrevocable, libre de regalías, sublicenciable (a través de múltiples niveles) derecho a ejercer todos los derechos de autor, derechos de publicidad, y cualquier otro derecho que usted tiene en su información, en cualquier medio conocido o no conocido actualmente. Kmimos tendrá discreción completa en la forma en que elige mostrar o usar su información en relación con el Sitio, sujeto a las restricciones establecidas en nuestra Política de Privacidad.</p>
													<p>
													Como parte del Sitio, Kmimos ocasionalmente comparte actualizaciones de fotos de perros de clientes  siendo cuidados por Cuidadores, con los usuarios del sitio y el público. Usted acepta que Kmimos puede, a su discreción, publicar estas fotos en el sitio ya través de los medios sociales como Facebook, Twitter, Pinterest, y sitios similares. Los cuidadores de proporcionar actualizaciones de fotos periódicas a los clientes y Kmimos a través de mensaje de texto o correo electrónico o mensajes por algún otro medio.
													</p>
													<p>Usted declara y garantiza a Kmimos que su información (a) no será falsa, inexacta, incompleta o engañosa; (B) no será fraudulenta o involucrar a la venta de artículos falsificados o robados; (C) no infringe los derechos de autor, patentes, marcas, secretos comerciales de terceros o cualquier otro derecho o derechos de publicidad o privacidad de propiedad; (D) no violará ninguna ley, estatuto, ordenanza o reglamento (incluyendo sin limitación, las que rigen el control de las exportaciones, la protección del consumidor, la competencia desleal, antidiscriminación o la publicidad engañosa); (E) no será difamatorio, calumnioso, ilegal amenazar o acosar ilegalmente; (F) No será obsceno o contienen pornografía infantil o ser perjudicial para los menores; (G) no contiene ningún virus, caballos de Troya, gusanos, bombas de tiempo, u otras rutinas de programación informática que tengan por objeto perjudicar, interferir perjudicialmente, interceptar subrepticiamente o expropiar cualquier sistema, datos o información personal; y (h) no creará responsabilidad por Kmimos o causar Kmimos perder (en su totalidad o en parte) los servicios de sus socios o proveedores.</p>
													<h4>IX. Cuidador con Seguro veterinario</h4>
													<p>Sujeto a las limitaciones, en la medida permitida por la ley aplicable en su jurisdicción, Kmimos se reserva el derecho de modificar o cancelar la póliza de seguro, en cualquier momento, a su sola discreción y sin previo aviso. Si Kmimos termina la póliza de seguro de conformidad con lo anterior, Kmimos le proporcionará la notificación de dicha resolución y Kmimos continuará procesando reclamaciones en virtud de la póliza de seguro presentada antes de la fecha efectiva de terminación. Si Kmimos modifica la Póliza de Seguro, publicaremos las modificaciones en el Sitio o llegar una notificación de la modificación y Kmimos a seguir para procesar todas las solicitudes presentadas con anterioridad a la fecha de vigencia de la modificación. Al continuar accediendo o usar el sitio como cuidador después de haber publicado una modificación en el Sitio o le proporcionamos un aviso de modificación, usted está indicando que usted acepta que quedará vinculado por la póliza de seguro modificado. Si la póliza de seguro modificado no es aceptable para usted, su único recurso es dejar de utilizar el sitio como cuidador. Obligaciones de Kmimos bajo la póliza de seguro están supeditadas a la disponibilidad de fondos del seguro bajo la póliza de seguro.</p>
													<p>Además, sin limitar las otras limitaciones, exclusiones y condiciones de la póliza de seguro, usted reconoce y acepta que todos los derechos o beneficios relacionados con la póliza de seguro (o no devengados), y todos los reclamos hechos por usted en relación con la misma , terminará automáticamente si en cualquier instituto tiempo cualquier reclamación, demanda, procedimiento u otra acción contra Kmimos o cualquier Exonerados.</p>
													<p>Tenga en cuenta que, sin limitación, la póliza de seguro no cubre los problemas que puedan surgir con respecto a los perros con condiciones pre-existentes o de cualquiera de las siguientes condiciones:</p>
													<p>Si una mascota o ha tenido alguna afección, ya sea diagnosticado por su veterinario o no, antes de llegar con alguno de los servicios de Kmimos, se considera pre-existente. Esto puede incluir: infecciones respiratorias, del tracto urinario / infecciones de la vejiga, trastornos de la sangre, vómitos, diarrea y otros trastornos gastrointestinales.</p>
													<p>Si una mascota ha sido diagnosticado con una enfermedad de un área anatómica donde la causa subyacente fue indeterminado cualquier diagnóstico de la misma zona no estarían cubiertos. Por ejemplo, gastritis y colitis son ambos diagnósticos generales de la inflamación, pero no llegan a la causa del trastorno.</p>
													<p>Si su  perro ha tenido alguna de las siguientes condiciones antes de ir en un servicio de Kmimos nuestra cobertura del seguro no será de aplicación:</p>
													<p>Cualquier condición ortopédica incluyendo pero no limitado a rótulas luxantes, la displasia de cadera, displasia de codo, y el TOC, enfermedades ortopédicas o lesiones en el lado opuesto de una lesión previa, alergias, cáncer, diabetes, lipomas o tumores de la piel, el hipertiroidismo o hipotiroidismo, urinario o cristales de la vejiga o la obstrucción, otras condiciones crónicas.</p>
													<p>Condiciones específicas de la raza: Una condición genética es causada por un defecto en los genes subyacentes que se transmiten a un perrito o un gatito de sus padres. Estos defectos genéticos se ejecutan en las familias y algunas razas tienen muchos más de ellos que otras razas, por lo tanto, la condición específica de la raza plazo.</p>
													<p>El tratamiento para muchas condiciones específicas de la raza requiere una cirugía correctiva y algunos son también condiciones crónicas que requieren atención continua. Entre las enfermedades más comunes de razas específicas son: displasia de cadera y codo (común en los pastores alemanes, Golden Retriever, Labrador Retriever, el Gran Danés y otros perros de razas grandes / gigantes), luxación de la rótula (común en los caniches, Yorkshire Terriers, Pomeranians chihuahuas, , Boston Terriers, Cavalier King Charles y otros temas del disco juguete / perros de razas pequeñas), la enfermedad de disco interverterbral (IVDD) espinal (roto, hernia) (común en Dachshunds, Bassett Hounds, dogos franceses, Pomeranians, corgis, barros y otras razas acondroplásicas ), cáncer, alergias.</p>
													<p>Las condiciones crónicas: Las condiciones crónicas persisten o durar varios meses (a menudo durante años). Por lo general, no se pueden prevenir con vacunas o curarse con medicamentos, ni tampoco simplemente desaparecen. Condiciones comunes incluyen: alergias, el cáncer, la diabetes, la EII (enfermedad inflamatoria intestinal), enfermedad de Addison, enfermedad de Cushing, ojos secos (KCS), epilepsia, glaucoma, hipotiroidismo, problemas ortopédicos, como artritis, IVDD y desgarros del ligamento cruzado. El tratamiento no médico relacionado (formación profesional, etc.) no es elegible para la cobertura.</p>
													<p>Es la responsabilidad del cuidador y de clientes determinar si su perro tiene alguna de las condiciones anteriores, y Kmimos no tendrá ningún tipo de responsabilidad por cualquier problema que pueda surgir de las condiciones anteriores. Si se requiere cualquier tipo de atención médica que debe proporcionarse a los perros de los clientes y tal atención está cubierta por la póliza de seguro, el cliente o cuidador, en su caso, será responsable de pagar el deducible aplicable. Si usted cree que cualquier incidente está cubierto por la póliza de seguro, debe proporcionarnos una notificación por escrito del incidente y su creencia de que está cubierto por la póliza de seguro, junto con toda la documentación de los materiales disponibles para usted acredite lo anterior (por ejemplo, facturas y veterinaria (DVM) notas del examen veterinario inicial), dentro de los treinta (30) días después de la fecha de finalización de la correspondiente del servicio de cuidado.</p>
													<p>X. Para Situaciones de Emergencia Médica Involucrar perro de un Cliente:</p>
													<p>Los clientes deben asegurarse de que el cuidador se proporciona información de contacto para llegar al cliente en caso de una situación de emergencia médica se plantea la participación de un perro de clientes. Los clientes y los ejércitos reconocen y aceptan que, en la medida de surgir una situación en la que se requiere perro del cliente para recibir atención veterinaria de emergencia, mientras que en el cuidado o la custodia del cuidador, el cuidador hará los esfuerzos razonables para comunicarse con el cliente y le notifiquen de la situación. En el caso de que el cuidador notifica Kmimos de la situación, el cuidador debe contactar a Kmimos al 5534-550138 y Kmimos hará esfuerzos razonables durante el horario normal de Kmimos para contactar al Cliente para notificarles de la situación. Si el Cliente no se puede llegar después de un esfuerzo razonable, cliente autorice cuidador y Kmimos para autorizar la atención en su nombre / el fin de tratar con prontitud el perro de cliente. Clientes reconocen y aceptan que los costos de cualquier tratamiento para situaciones de emergencia médica es la única y exclusiva responsabilidad del socio y tarjeta de crédito de ese Cliente pueda ser facturado por cualquier cantidad a reembolsar gastos efectuados por el cuidador o Kmimos asistente al mismo. En ciertas circunstancias, clientes podrán solicitar el reembolso de estos gastos o una parte del mismo a través de la póliza de seguro. Información adicional sobre estos planes se puede encontrar en nuestra página de información del seguro. La determinación de lo que constituye una situación médica de emergencia en relación con la póliza de seguro es a discreción única y exclusiva de nuestros suscriptores. Para mayor claridad, Kmimos no está actuando como una compañía de seguros con respecto a la póliza de seguro.</p>
													<h4>XI. Cuidados generales de la mascota</h4>
													<p>El CUIDADOR se compromete a mantener a los perros de los clientes bajo un ambiente de una residencia, casa o habitación según sea el caso y no en una perrera o transportadora, o corral . Por lo que las mascota se mantendrá bajo el cuidado y revisión de el CUIDADOR todo el tiempo, si así mismo el cuidador sede los derechos a un tercer ajeno a Kmimos, el cuidador es responsable de estas acciones así como de los daños o perjuicios que tenga la mascota del cliente que es determinada como una propiedad activa.</p>
													<p>El CUIDADOR deberá mantener un continuo vinculo de comunicación con Kmimos al respecto del estado de la mascota, así como la captura de evidencia fotográfica o de video diaria del estado de la mascota, que a su vez se compartirá con Kmimos quien podrá hacer uso de este material para compartir al cliente o uso pasivo de la información. El envió por parte del CUIDADOR deberá de ser en un horario de 01:00hrs a 20:00 horas  tiempo de Ciudad de México del día en transito y será evidencia recopilada actual a ese periodo de tiempo que se estipula.</p>
													<p>El CUIDADOR se compromete a notificar cualquier enfermedad o condición poco saludable a Kmimos para proceder con el tratamiento adecuado que dicta el apartado de Póliza de Segura (definido posteriormente) Si por alguna circunstancia no aplica la Póliza de seguro según la estipulación anterior, se le notificara al cliente para proceder con las instrucciones que nos manifieste, sin embargo Kmimos y el cuidador no se hacen responsables de enfermedades previamente adquiridas  de igual .</p>
													<h4>XII.  Para Situaciones de pulgas Involucrar perro de un Cliente:</h4>
													<p>Es responsabilidad de cada cliente que es cuidado y tienen sus / sus mascotas al día en una forma de control de pulgas. Tanto los clientes como cuidadores reconocen y aceptan que, en la medida de surgir una situación en la que o bien introduce la mascota del Cliente o pulgas, el guardián de dicha mascota se hace responsable de todos los costos asociados con las pulgas y / o prevención de la pulga. Es responsabilidad de todos los Clientes de revelar cualquier conocimiento de los problemas de pulgas asociados a sus mascotas a todos los Cuidadores antes de efectuar cualquier servicio.</p>
													<h4>XIII. Términos financieros</h4>
													<p>Kmimos, a través de su red propia de cuidadores, se encarga de la prestación de los Servicios de estadía-proporcionada a los clientes, incluyendo, pero no limitado a transportación de perros, guardería para perros, corte de pelo de los perros y los servicios relacionados a la comodidad de las mascotas en las residencias privadas de los cuidadores. Como cuidador, puede crear un listado de servicio, y se le pedirá información detallada sobre el servicio y las mascotas (si procede) a que recibirán este servicio. Usted como cuidador puede establecer el precio y los términos de sus servicios dentro de los parámetros permitidos por el Sitio, sin embargo Kmimos se reserva el derecho de cancelar cualquier reserva que no cumpla con nuestros estándares de servicios o tarifas mínimas, según lo determinado en nuestra única discreción. En el caso de que Kmimos hace cancelar una reserva, por estas razones, el cliente recibirá un reembolso completo, incluyendo las tarifas de servicio. En cuanto a kmimos.com.mx , cobrara una tarifa de servicio del 20% para cubrir los costos de procesamiento de pagos y la administración del sitio sobre todas las operaciones y  transacciones generadas en la plataforma o servicio de atención para la contratación de servicios. Como cuidador, que contractualmente de acuerdo en que la primera y todas las futuras reservas con un cliente desde Kmimos se pueden reservar a través del Sitio o llamando al número de teléfono . El incumplimiento de esta política puede resultar en la suspensión dela cuenta en el  Sitio.</p>
													<p>Cada cuidador presente designa Kmimos como agente limitado del cuidador con el único fin de recoger los pagos realizados por los Clientes en nombre del cuidador. Cada cuidador esta de acuerdo en que el pago hecho por un Cliente a Kmimos se considerará como lo mismo que un pago hecho directamente en la el cuidador que esta dando los servicios de estadía u otros previamente contratados únicamente por la plataforma de www.kmimos.com.mx . Cada cuidador esta de acuerdo en que, Kmimos podrá, de conformidad con las condiciones de cancelación seleccionado por el cuidador y se refleja en el perfil relevante, (i) permitir que el cliente cancele la reserva y (ii) el reembolso al Cuidador de que parte de los honorarios especificados en las condiciones de cancelación aplicable. Al aceptar el nombramiento como agente autorizado limitado de la estadía, Kmimos asume ninguna responsabilidad por los actos u omisiones de la estadía.</p>
													<h4>XIV.  Cancelaciones y devoluciones</h4>
													<p>Como cliente, se le da la flexibilidad de elegir entre anuncios con drentes políticas de cancelación, a saber: (a) Flexible - reembolso del 100% con la cancelación de al menos 4 días antes de la fecha de entrega programada mascota, y 50% de reembolso en caso de cancelación después de esto; (B) Moderado - reembolso del 100% con la cancelación al menos 7 días antes de la fecha de entrega programada mascota, y 50% de reembolso si la cancelación se produce después de que; o (c) Estricta - Ningún reembolso después de la reserva, salvo en los casos determinados por Kmimos en circunstancias inusuales. Cancelación bajo una política flexible de cancelación o moderado debe hacerse antes de las 11:59, hora del Pacífico con el fin de calificar para haber ocurrido en un día particular. En el caso de que usted, como cliente de reserva, hay que cambiar las fechas de una reserva ya reservado a través Kmimos, estará sujeta a la política de cancelación seleccionado del cuidador por los días cancelados. Cada cliente acepta que quedará vinculado por la opción seleccionada por Cuidador y acordado como parte del proceso de reserva. Además, independientemente de la política de cancelación del cuidador o cuando se cancela una reserva, Kmimos puede cobrar una tasa de cancelación (determinado a nuestra discreción) que será presentado al Cliente durante el proceso de reserva.</p>
													<p>Después de una reserva por primera vez entre los clientes y cuidador, según su propio criterio, los arreglos para una reunión en directo para introducir perro para los clientes sobre el lugar y las mascotas. Si el resultado de esta reunión es la determinación de que una estancia de cuidado perro u otro servicio de Cuidador proporcionado no sería en el mejor interés de los animales de compañía, cualquiera de las partes puede cancelar la reserva y todo el dinero será reembolsado con la reserva cliente.</p>
													<h4>XV. El uso del sitio</h4>
													<p>Cualquier información personal que usted envíe al Sitio se rige por la política de privacidad. Esta política de privacidad abarca toda la información que usted pueda suministrar al Sitio, ya sea para fines de registrarse en el sitio como un Cuidador o cliente o para recibir información adicional, actualizaciones y promociones sobre o en relación con el Sitio. En consideración de tener permiso para utilizar el Sitio, usted acepta que las siguientes acciones constituyen una violación del contenido de las presentes Condiciones:</p>
													<p>
													La recopilación de información sobre el sitio o los usuarios del sitio sin el consentimiento por escrito de Kmimos;
													La modificación, el encuadre, lo que hace (o re-representación), lo que refleja, truncando, inyectar, filtrado o cambiar cualquier contenido o información contenida en el Sitio, sin el consentimiento por escrito de Kmimos;
													El uso de cualquier enlace profundo, página-raspa, robot, gatear, index, spider, haga clic en el spam, programas macro, agente de Internet, u otro dispositivo, programa, algoritmo o metodología que hace las mismas cosas, por usar automática, acceder, copiar, adquirir información, generar impresiones o clics, información de entrada, almacenar información, buscar, generar búsquedas, o monitorear el Sitio o cualquier parte o contenido de los mismos; El acceso o uso del sitio con fines comerciales o de competencia; Encubrir el origen de la información transmitida hacia, desde o/a través del Sitio; Hacerse pasar por otra persona o entidad; Distribuir virus u otros códigos informáticos dañinos; Permitir que cualquier otra persona o entidad a la que suplantar a acceder, usar o registrarse en el sitio; Utilizando el sitio para cualquier propósito en violación de, estatales, nacionales e internacionales, las leyes locales, incluyendo pero no limitado a, cualquier uso no autorizado de cualquier contenido o información contenida en el Sitio puede violar las leyes de derechos de autor, las marcas comerciales, las leyes de privacidad y publicidad, y / o los reglamentos y estatutos de comunicaciones; Utilizando el sitio de una manera que se pretende hacer daño, o que una persona razonable entendería probablemente resultaría en un daño, al usuario o a otras personas; Recibir una o críticas más negativas previstas para Kmimos los Clientes o no clientes; Actualizar un perfil público con información de contacto errónea o eliminar la información de contacto; El no poder responder a los mensajes / consultas de otros Clientes Kmimos o no responder a los mensajes / consultas de otros Clientes Kmimos dentro de una manera oportuna, que se determinará a la entera discreción de Kmimos; Comportarse o actuar de cualquier manera que crea una experiencia negativa para un cliente Kmimos, que se determinará a la sola discreción de Kmimos; Comportarse o actuar de cualquier manera que demuestra una falta de cortesía o profesionalidad con cualquier Kmimos cliente del personal que pueda causar alguna dificultad proporcionar el mejor servicio posible al cliente para un cliente Kmimos, que se determinará a la sola discreción de Kmimos; Sorteando las medidas aplicadas por nosotros destinada a prevenir violaciones de los Términos;
													</p>
													<p>Kmimos se reserva expresamente el derecho, a su sola discreción, de cancelar el acceso de un usuario a cualquiera de los servicios interactivos y / o a cualquiera o todas las demás áreas del sitio debido a cualquier acto que constituya una violación de los Términos. Además de violar las condiciones, ninguna de las acciones anteriores de su parte o en nombre de cualquier entidad está empleado o no actuar como un agente para el que constituye el acceso intencionado, sin autorización de un ordenador protegido, puede constituir una violación de la ley estatal y federal , y puede potencialmente sujetos a usted ya cualquier partes afiliadas a la responsabilidad civil y enjuiciamiento penal.</p>
													<p>Kmimos también se reserva expresamente el derecho, a su sola discreción, de cancelar el acceso de un usuario a cualquiera de los servicios interactivos y / o a cualquiera o todas las demás áreas del sitio debido a una o críticas más negativas proporcionan a Kmimos todos los clientes y no clientes. Estas revisiones son típicamente, pero no están obligados a ser, asociado a un servicio en Cuidador proporcionados por un Cuidador a través Kmimos.</p>
													<p>Usted reconoce que Kmimos no contenido pre-pantalla subido por los usuarios (incluyendo comentarios), pero que Kmimos y sus designados tendrán el derecho (pero no la obligación) a su entera discreción, de rechazar o eliminar cualquier contenido que está disponible a través del Sitio . Sin perjuicio de lo anterior, la empresa y sus designados tendrán el derecho de eliminar cualquier revisión u otro contenido que viole estos Términos o se entienda por Kmimos, a su sola discreción, a ser de otra manera objetable, incluyendo cualquier comentarios que violen cualquiera de las siguientes pautas :</p>
													<ol>
													<li>Comentarios no relacionados con la propia Reserva (por ejemplo, religioso, político o comentario social).</li>
													<li>Comentarios que no son representativos de la propia experiencia personal del Cliente.</li>
													<li>Opiniones en las que el contenido autorizare y promueve la actividad o la violencia ilegal o perjudicial.</li>
													<li>Opiniones en las que el contenido es profano, discriminatorio, o vulgar.</li>
													<li>Opiniones en las que el contenido infringe la privacidad de otra persona, como por ejemplo la publicación de nombre completo de la persona, número de teléfono, dirección, u otra información de identificación.</li>
													<li>Opiniones en las que el contenido se refiere a una investigación Kmimos.</li>
													<li>Opiniones en las que ha sido demostrada, el contenido que se utilizarán como extorsión.</li>
													</ol>
													<p>Con respecto a los exámenes, contenido u otro material que subas a través del Sitio o comparta con otros usuarios o destinatarios (colectivamente, "Contenido de Usuario"), usted representa y garantiza que posee todos los derechos, títulos e intereses sobre y para dicho Contenido de Usuario , incluyendo, sin limitación, todos los derechos de autor y derechos de publicidad contenidas en él. Al cargar cualquier  Contenido de Usuario usted otorga y otorgará Kmimos y sus empresas afiliadas una licencia mundial, libre de regalías, totalmente desembolsadas, intransferible, licencia perpetua, no exclusiva, irrevocable para copiar, mostrar, cargar, ejecutar, distribuir, almacenar, modificar y de otra manera utilizar su contenido de usuario en relación con la operación del Sitio o la promoción, la publicidad o la comercialización de los mismos, en cualquier forma, medio o tecnología conocida ahora o desarrollada más tarde.</p>
													<p>Es su obligación de cumplir con todas las leyes estatales, federales e internacionales aplicables. También es su obligación de cumplir con todas las leyes fiscales aplicables y regulaciones que se aplican a su actividad en el Sitio. Usted es responsable de mantener la confidencialidad de su información de cuenta y contraseña y de restringir el acceso a dicha información y al ordenador. Usted se compromete a aceptar la responsabilidad de todas las actividades que ocurran bajo su cuenta o contraseña.</p>
													<h3>XVI.  Contacto de Emergencia</h3>
													<p>Clientes reconocen y aceptan que Kmimos hará los esfuerzos razonables para comunicarse con el cliente en caso surge una situación que requiere o puede requerir el consentimiento del cliente. En caso Kmimos no puede alcanzar el cliente después de un esfuerzo razonable, proporcionado Contacto de Emergencia del Cliente (s) está autorizada a actuar en nombre del perro de invitados.</p>
													<h3>XVII. Los enlaces a sitios web de terceros</h3>
													<p>El Sitio puede contener enlaces o tiene referencias a sitios web controlados por terceros ajenos a Kmimos. Kmimos no se hace responsable y no aprueba ni acepta ninguna responsabilidad por el contenido o uso de estos sitios web de terceros. Kmimos provee estos vínculos solamente para su conveniencia, y la inclusión de estos vínculos no implica o no constituye una aprobación por Kmimos del sitio web vinculado y / o de los contenidos y materiales que se encuentran en el sitio web vinculado, salvo que expresamente se establezca lo contrario Kmimos. Es su responsabilidad tomar precauciones para asegurarse de que lo que seleccione para su uso esté libre de virus u otros elementos de carácter intrusivo.</p>
													<h3>XVIII.  Limitación de Responsabilidad y Divulgación</h3>
													<p>Al estar de acuerdo para servir como cuidador o proporcionar otros servicios de Cuidador que se haya transmitido a un cliente, usted asume expresamente el riesgo de cualquier daño, incluyendo daños a la propiedad o lesiones personales, que usted o cualquier otra persona presente en su residencia pueda sufrir. Es de la exclusiva responsabilidad de los ejércitos para tomar decisiones que son en el mejor interés de ellos y sus animales domésticos.</p>
													<p>Si está de acuerdo para servir como cuidador (incluyendo, sin limitación, si usted tiene hijos menores de 18 años en su casa), usted acepta y reconoce de la siguiente manera:</p>
													<p>Usted acepta que es usted y su niños / niño / pupilo está aceptando voluntariamente a abordar o manejar un perro que pertenece a otro dueño, en su casa o en algún otro lugar de lo contrario. Usted está asumiendo, en nombre de usted y / o su niños / niño / pupilo, todo el riesgo de lesiones personales, muerte o incapacidad para usted y / o su hijo / pupilo que pudiera derivarse o surgir del embarque o manejo de este perro, o cualquier daño, pérdida o daño a su razón o bienes personales que usted o sus hijos / niño / pupilo pueda incurrir. Usted entiende que los riesgos que vienen con el embarque o el manejo de un perro que no está acostumbrado a usted, a su niños / niño / pupilo, y su casa o en otro lugar y que no tiene riesgos inherentes; y Usted está de acuerdo en nombre de usted y / o su niños / niño / barrio y sus / sus representantes personales, sucesores, herederos y cesionarios para mantener Kmimos, sus afiliados, funcionarios, directores, agentes, empleados y clientes (colectivamente, el " Exonerados ") de cualquier y todos los reclamos o causas de acción que surja del embarque o la manipulación de este perro. Usted expresamente eximir y liberar Exonerados de cualquier y toda responsabilidad, reclamo, demanda o causa de acción que surja de cualquier daño, pérdida, lesiones o la muerte a usted y / o su niños / niño / pupilo, mientras el perro está internado en su casa o le proporciona de manera alguna Cuidador. Este comunicado es válido y efectivp si el daño, la pérdida o la muerte es el resultado de cualquier acto u omisión por parte de cualquiera de los Exonerados o por cualquier otra causa. Esta renuncia y la liberación de toda responsabilidad incluye, sin limitación, cualquier lesión, enfermedad o accidentes que se pueden producir como consecuencia de la subida a bordo perro en su casa o cualquier otro servicio de Cuidador-Siempre. Al continuar con la transacción o el uso del Sitio de otra manera, usted entiende que voluntariamente renuncia a su derecho de demandar a las partes antes mencionadas.</p>
													<p>Si usted es un cliente o un CUIDADOR, SE COMPROMETE A NO MANTENER KMIMOS O SUS AFILIADOS, OFICIALES, DIRECTORES, EMPLEADOS, AGENTES O PROVEEDORES SERÁN RESPONSABLES POR NINGÚN DAÑO, los juicios, reclamos, y / o controversias (colectivamente, "pasivos") que han surgido o puedan surgir, sean conocidos o desconocidos, EN RELACIÓN CON EL USO O LA IMPOSIBILIDAD DE USO DE LOS SERVICIOS O SITIO, INCLUYENDO SIN LIMITACIÓN CUALQUIER RESPONSABILIDAD SE PLANTEAN EN RELACIÓN CON (A) CUALQUIER instrucción, asesoramiento, ACT o servicio proporcionado por KMIMOS O SUS AFILIADOS, OFICIALES, DIRECTORES, EMPLEADOS, AGENTES O PROVEEDORES DE TERCEROS, (B) CUALQUIER DESTRUCCIÓN DE SU INFORMACIÓN, (C) CUALQUIER DISPUTA CON CUALQUIER OTRO USUARIO DEL SITIO, FALLA (D) CUIDADORES 'prestación de servicios o suministro de INCOMPLETA O SERVICIOS POBRES, (E) cualquier lesión o daño sufrido por usted o por cualquier tercero (incluyendo sin limitación SUS FAMILIARES, AMIGOS O OTRAS PARTES RELACIONADAS), (F) cualquier lesión o daño sufrido por cualquier perro u otros animales domésticos, (G ) NINGÚN DAÑO O DAÑO A LA PROPIEDAD reales o personales, o (h) cualquier otra conducta, acto u omisión de cualquier otra parte, incluyendo sin limitación ACECHO, ACOSO SEXUAL QUE ES O NO, actos de violencia física, o destrucción de bienes.</p>
													<p>BAJO NINGUNA CIRCUNSTANCIA KMIMOS O SUS AFILIADOS, OFICIALES, DIRECTORES, EMPLEADOS, AGENTES O PROVEEDORES SERÁN RESPONSABLES POR DAÑOS INCIDENTALES, DIRECTOS, INDIRECTOS, ESPECIALES O INDIRECTOS QUE RESULTEN DE SU USO O IMPOSIBILIDAD DE USAR ESTE SITIO O EL CUIDADOR-PROPORCIONADA SERVICIOS, INCLUYENDO SU CONFIANZA EN CUALQUIER INFORMACIÓN OBTENIDA DE ESTE SITIO QUE ocasione errores, omisiones, interrupciones, eliminación o corrupción DE ARCHIVOS, VIRUS, DEMORAS EN LA OPERACIÓN O TRANSMISIONES, O CUALQUIER FALLO DE FUNCIONAMIENTO. LA LIMITACIÓN DE RESPONSABILIDAD SE APLICARÁ EN CUALQUIER ACCIÓN, YA SEA EN CONTRATO, AGRAVIO O DE CUALQUIER OTRO TIPO, INCLUSO SI UN REPRESENTANTE AUTORIZADO DE KMIMOS HA SIDO ADVERTIDO O DEBERÍA TENER CONOCIMIENTO DE LA POSIBILIDAD DE TALES DAÑOS. POR EL USO DE ESTE SITIO, USTED RECONOCE QUE ESTE PÁRRAFO SE APLICARÁ A TODO EL CONTENIDO, PRODUCTOS Y SERVICIOS DISPONIBLES A TRAVÉS DE ESTE SITIO, SALVO QUE LA EXCLUSIÓN O LIMITACIÓN DE DAÑOS DIRECTOS O INDIRECTOS está prohibido por ley. CIERTAS JURISDICCIONES NO PERMITEN LA EXCLUSIÓN O LIMITACIÓN DE CIERTAS GARANTÍAS O LIMITACIÓN DE DAÑOS DIRECTOS O INDIRECTOS, POR LO QUE LAS LIMITACIONES ANTERIORES NO SE APLIQUEN EN SU CASO. SI, A PESAR DE LO ANTERIOR EXCLUSIONES, se determina que KMIMOS O SUS AFILIADOS, OFICIALES, DIRECTORES, EMPLEADOS, AGENTES O PROVEEDORES SERÁN RESPONSABLES POR DAÑOS, EN NINGÚN CASO LA RESPONSABILIDAD TOTAL, YA SEA POR CONTRATO, AGRAVIO, ESTRICTA RESPONSABILIDAD, O DE OTRA MANERA, SUPERARÁ LOS CIEN DÓLARES ($ 100.00), con exclusión de cualquier OBLIGACIONES A PAGAR LAS CANTIDADES DE CUIDADORES O REEMBOLSOS A LOS CLIENTES DE CONFORMIDAD CON ESTOS TÉRMINOS.</p>
													<p>Usted acepta que las limitaciones especificadas en esta sección sobrevivirán y aplicará incluso si no se encuentra ninguna solución limitada especificada en estas Condiciones de haber fracasado en su propósito esencial. Usted también reconoce y acepta expresamente que Kmimos ha fijado sus precios y entró en estas Condiciones en confianza sobre las limitaciones de responsabilidad en él detalladas, que asignan el riesgo entre usted y Kmimos y constituyen la base de la negociación entre las partes.</p>
													<h4>XIX.  EXCLUSIÓN DE GARANTÍAS</h4>
													<p>EL SITIO Y CONTENIDO OFRECIDO EN EL SITIO SE PROPORCIONAN "TAL CUAL", Y SON PARA USO COMO CONTRATADO EN ESTE DOCUMENTO. EXCEPTO POR LAS GARANTÍAS EXPRESAS ESTABLECIDAS EN LA PRESENTE, KMIMOS Y SUS AFILIADOS, OFICIALES, DIRECTORES, EMPLEADOS, AGENTES, ASÍ COMO SUS PROVEEDORES DE TERCEROS, POR ESTE MEDIO SE HACE EXPRESA O IMPLÍCITAS DECLARACIONES, GARANTIAS, GARANTÍAS Y CONDICIONES EN RELACIÓN CON EL SITIO, Los cuidadores, LOS SERVICIOS DE ESTADÍA-PROPORCIONADA, EL CONTENIDO Y LOS PRODUCTOS Y SERVICIOS asociado con el mismo INCLUYENDO PERO NO LIMITADO A CUALQUIER IMPLÍCITAS representaciones, garantías, garantías, Y CONDICIONES DE COMERCIALIZACIÓN, IDONEIDAD PARA UN PROPÓSITO PARTICULAR, TÍTULO Y NO INFRACCIÓN, Y CALIDAD DE BIENES Y SERVICIOS EXCEPTO EN LA MEDIDA EN QUE DICHA RENUNCIA NO FUERA LEGALMENTE VÁLIDA. KMIMOS Y SUS PROVEEDORES, NO SON DECLARACIONES, GARANTIAS NI GARANTIZA LA FIABILIDAD, DISPONIBILIDAD, ACTUALIDAD, CALIDAD, IDONEIDAD, VERACIDAD, EXACTITUD O INTEGRIDAD DEL SITIO O CONTENIDO RELACIONADO CON EL SITIO, O LOS RESULTADOS QUE OBTENGA ACCESO O USO EL SITIO Y / O LOS CONTENIDOS RELACIONADOS CON LA MISMA. SIN PERJUICIO DE LO ANTERIOR, KMIMOS Y SUS PROVEEDORES DE TERCEROS NO REPRESENTAN NI GARANTIZA QUE (A) EL FUNCIONAMIENTO O USO DEL SITIO SERÁ OPORTUNO, SEGURO, ININTERRUMPIDO O LIBRE DE ERRORES; (B) LA CALIDAD DE LOS SERVICIOS DE ESTADÍA-PROPORCIONADA, INFORMACIÓN U OTRO MATERIAL QUE USTED COMPRA, SEGURO O DE OTRA MANERA OBTENER A TRAVÉS DEL SITIO CUMPLIRÁ SUS REQUISITOS; O (C) CUALQUIER SOFTWARE ofrecidos a través del sitio esté disponible estén libres de virus u otros componentes dañinos. USTED RECONOCE QUE NI KMIMOS NI SUS PROVEEDORES DE TERCEROS controlar la transferencia de DATOS SOBRE COMUNICACIONES INSTALACIONES, INCLUYENDO LA INTERNET, Y QUE EL SITIO Y / O CONTENIDO RELACIONADO CON EL MISMO PUEDE ESTAR SUJETA A LIMITACIONES, RETRASOS Y OTROS PROBLEMAS INHERENTES AL USO DE DICHO COMUNICACIONES INSTALACIONES. KMIMOS NO ES RESPONSABLE DE LOS RETRASOS, FALLOS DE ENTREGA, O CUALQUIER OTRO DAÑO QUE RESULTE DE DICHOS PROBLEMAS, salvo que se expresa en otro sentido POR KMIMOS. KMIMOS EXPRESAMENTE RECHAZA CUALQUIER GARANTÍA EN RELACIÓN CON LA CALIDAD DE LOS SERVICIOS DE ESTADÍA-proporcionada y las personas o empresas MENCIONADOS EN EL SITIO. USAR LOS SERVICIOS DE ESTADÍA-PROPORCIONADA a su propio riesgo y asume todos los riesgos relacionados con el uso de dichos servicios CUIDADOR-PROPORCIONADA. Licencias y Certificados REQUISITOS (o la ausencia de) para algunos o todos los Servicios de CUIDADOR-proporcionada ofrecida por los cuidadores AMPLIAMENTE varían según el estado, condado, ciudad, municipio o municipio. KMIMOS HACE NINGUNA REPRESENTACIÓN O GARANTÍA DE QUE CUALQUIERA DE LOS CUIDADORES QUE OFRECEN SERVICIOS DE ESTADÍA-PROPORCIONADA A TRAVÉS DEL SITIO ha respetado cualquier ESTADO VIGENTE, CONDADO O LEY MUNICIPAL, estatuto, ordenanza o reglamentos. A PESAR DE LA CITA DE KMIMOS como agente LIMITADO DE LOS CUIDADORES PARA EL PROPÓSITO DE LA ACEPTACIÓN DE PAGOS DE LOS CLIENTES EN NOMBRE DE LOS CUIDADORES, KMIMOS RENUNCIA EXPRESAMENTE A TODA RESPONSABILIDAD POR CUALQUIER ACTO U OMISIÓN DE CUALQUIER CUIDADOR, CLIENTE O TERCEROS.</p>
													<h4>XX. Indemnización</h4>
													<p>Usted defenderá indemnizar y mantener indemne a Kmimos y sus afiliadas, directores, funcionarios, empleados, agentes y proveedores terceros (colectivamente, las "Partes indemnizadas") contra cualquier y todo reclamo, costos, daños, pérdidas, responsabilidades y gastos (incluyendo los honorarios y gastos de abogados) incurridos por las Partes indemnizadas en relación con una reclamación de un tercero relacionada con usted o su uso del Sitio o los Servicios de Cuidador-provisto. Las Partes indemnizadas se reservan el derecho, a su propio costo, de asumir la defensa exclusiva y control de cualquier asunto sujeto a su indemnización. Usted no tendrá, en todo caso, resolver cualquier reclamación o asunto sin el consentimiento por escrito de las partes indemnizadas pertinentes. Kmimos y sus afiliadas, directores, funcionarios, empleados, agentes y proveedores terceros no tendrá ninguna obligación de indemnización o cualquier otra responsabilidad por cualquier reclamación de infracción derivada de (a) el uso del Sitio y / o el contenido asociado con el Sitio que no sea de conformidad con estas Condiciones; (B) la combinación del Sitio y / o contenido asociado con el Sitio Web con otros productos, servicios o materiales; o (c) cualquier tercero productos, servicios o materiales.</p>
													<h4>XXI.  Terminación y Cancelación de la cuenta</h4>
													<p>Kmimos puede, a su entera discreción y sin responsabilidad hacia usted, con o sin causa, con o sin previo aviso y en cualquier momento: (a) poner fin a estos Términos y Condiciones o su acceso a nuestro sitio, y (b) desactivar o cancelar su Kmimos Cuenta o el registro o usos similares del Sitio. Derechos de propiedad de Kmimos, renuncia de garantías, indemnizaciones, limitaciones de responsabilidad y disposiciones varias sobrevivirán a la terminación. Kmimos puede dar aviso de terminación por correo postal o correo electrónico. Usted puede cancelar su cuenta Kmimos en cualquier momento mediante el envío de un correo electrónico a Sin embargo, usted es personalmente responsable de los pedidos, listados o transacciones pendientes que realice o de los cargos en que incurra antes de su terminación / cancelación. Tenga en cuenta que si su Cuenta Kmimos se cancela, no tenemos la obligación de borrar o volver a cualquier Contenido que usted haya publicado en el Sitio.</p>
													<h4>XXII. Derechos de Propiedad Intelectual</h4>
													<p>Todos los materiales proporcionados en el Sitio, incluyendo pero no limitado a los contenidos, información, documentos, productos, logotipos, gráficos, sonidos, imágenes, recopilaciones y otros materiales están protegidos por leyes internacionales de copyright y marcas registradas. El propietario de los derechos de autor y marcas, nombres, logotipos y marcas de servicio es Kmimos , sus filiales o sus respectivos autores, de terceros, los desarrolladores o proveedores ("Proveedores de terceros"). Excepto como se indica en este documento, ninguno de los materiales puede ser modificado, copiado, impreso, reproducido, distribuido, republicado, realizado, descargar, mostrar, publicar, transmitir y / o utilizado en cualquier forma o por cualquier medio, incluyendo, pero no limitado a, electrónico, mecánico, fotocopia, grabación, o cualquier otro medio, sin la previa autorización expresa por escrito de Kmimos y / o un proveedor de terceros. Además, no se puede "espejo" o "archivo" cualquier Contenido que aparece en o de otra manera accesible desde el Sitio en cualquier otro servidor sin la previa autorización expresa por escrito de Kmimos.</p>
													<h3>COBERTURA SEGURO VETERINARIO</h3>
													<p>
													Kmimos te ofrece un seguro veterinario sobre aquellos eventos que sufra tu(s) mascota(s), siempre y
													cuando se encuentre(n) bajo el cuidado de un cuidador Kmimos.  El nombre y apellido de  este cuidador
													Kmimos debe ser el mismo que se encuentra en el correo de confirmación que recibió el cliente al
													momento de completar la reserva de estadía a través de la página web www.kmimos.com.mx;
													www.kmimos.la ó www.kmimos.la.
													</p>
													<p>
													Para garantizar la cobertura por parte de Kmimos, el evento que ocurra con la mascota durante la
													permanencia en manos del cuidador Kmimos debe estar incluido en el LISTADO DE EVENTOS mostrado
													abajo. Todos aquellos padecimientos o enfermedades no listadas en el LISTADO DE EVENTOS no serán
													amparados por el seguro que ofrece Kmimos.
													</p>
													<br>
													<h4>LISTADO DE EVENTOS</h4>
													<ul>
													<li>Lesiones generadas por caídas</li>
													<li>Atropellamiento</li>
													<li>Envenenamiento accidental</li>
													<li>Ingesta de cuerpos extraños</li>
													<li>Lesiones por ataques de otros animales</li>
													<li>Traumatismos</li>
													</ul>
													<br>
													<p>
													La cobertura ampara el pago hasta por un monto de 5,000 pesos mexicanos  (CINCO MIL con 00/100),
													sobre aquellos eventos incluidos en el LISTADO DE EVENTOS, vía reembolso al cliente por parte de
													Kmimos.  Kmimos deberá recibir por parte del cliente una comprobación del pago realizado al
													veterinario, clínica u hospital veterinario.  Esta comprobación de pago será válida únicamente mediante
													Factura Fiscal emitida a nombre de:
													</p>
													<br>
													<p>RAZON SOCIAL: DESDIGITEC SAPI DE CV</p>
													<p>RFC: DES140825LX0</p>
													<br>
													<p>
													DIRECCION FISCAL: BOSQUES DE DURAZNOS 65, INTERIOR 211.  BOSQUES DE LAS LOMAS, MIGUEL
													HIDALGO, D.F. CP 11700
													</p>
													<br>
													<p>
													En caso de fallecimiento de la mascota mientras esté bajo el cuidado de un cuidador Kmimos, se brinda
													cobertura para gastos funerarios hasta por un monto de 10,000.00 pesos mexicanos (DIEZ MIL con
													00/100),  vía reembolso al cliente por parte de Kmimos.  Kmimos deberá recibir por parte del cliente una
													comprobación del pago realizado al veterinario, clínica u hospital veterinario.  Esta comprobación de
													pago será válida únicamente mediante Factura Fiscal (datos fiscales compartidos en los párrafos
													anteriores)
													</p>
													<p>
													Cualquier reembolso se realiza dentro de los 30 días continuos posteriores a 1) fecha del pago hecho por
													parte del cliente al veterinario, clínica u hospital veterinario y entregado, y b) Fecha de entrega del
													documento físico de la Factura Fiscal por parte del cliente a Kmimos.
													</p>
												</div>

												<div id="vlz_contenedor_botones" class="vlz_modal_pie" style="overflow: hidden;">

													<div id="check_term" class="vlz_input vlz_no_check vlz_pin_check" style="display: inline-block; width: auto; padding-right: 30px;"><input type="hidden" id="terminos" name="terminos" value="0">Acepto los t&eacute;rminos y condiciones</div>

													<!-- input id="boton_registrar_modal" type='submit' id="vlz_boton_registrar" class="vlz_boton_siguiente" value='Registrarme' / -->
													<input id="boton_registrar_modal" type='submit' class="vlz_boton_siguiente" value='Registrarme' />

												</div>
												
											</div>
										
										</div>

									</div>
								</div>

							</form>

							<script>

							//MODAL PRECIOS SUGERIDOS-----------------------------------------------------------------------------------------------
								var modalOpend= false;
								function modalPrecios(){
									jQuery(window).scroll(function() {
									    if (jQuery(document).scrollTop() > 1800) {
										    if (modalOpend != true) {
										    	jQuery('#jj_modal').fadeIn();
										       	modalOpend= true;
										    }  
									      
									    // } else {
									      jQuery('#jj_modal').fadeOut();
									      //console.log('Modal cierra')
									     }
									});
								}

								function ocultarModal(){
									jQuery('#jj_modal').fadeOut();
									jQuery('#jj_modal').css('display', 'none');
									modalOpend= true;
								}
							//MODAL PRECIOS SUGERIDOS END-----------------------------------------------------------------------------------------------

								var form = document.getElementById('vlz_form_nuevo_cuidador');
								form.addEventListener( 'invalid', function(event){
							        event.preventDefault();
							        jQuery("#error_"+event.target.id).removeClass("no_error");
							        jQuery("#error_"+event.target.id).addClass("error");
							        jQuery("#"+event.target.id).addClass("vlz_input_error");
								}, true);

								function especiales(id){
									switch(id){
										case "ife":
								      		var ife = jQuery( "#ife" ).val();

								      		if( ife.length >= 7 && ife.length <= 10 ){
								      			return true;
								      		}else{
								      			return false;
								      		}
										break;
										case "telefono":
								      		var telefono = jQuery( "#telefono" ).val();

								      		if( telefono.length >= 7 && telefono.length <= 11 ){
								      			return true;
								      		}else{
								      			return false;
								      		}
										break;
										case "clave":
								      		var clv1 = jQuery("#clave").attr("value");
								      		var clv2 = jQuery("#clave2").attr("value");

								      		return ( clv1 == clv2 );
										break;
										case "clave2":
								      		var clv1 = jQuery("#clave").attr("value");
								      		var clv2 = jQuery("#clave2").attr("value");

								      		return ( clv1 == clv2 );
										break;
										case "hospedaje":
								      		var z = 0;
											var t = [
												'pequenos',
												'medianos',
												'grandes',
												'gigantes'
											];

											jQuery.each(t, function( index, value ) {
												var temp = jQuery('#hospedaje_'+value).attr('value');
												if( temp == '' ){ temp = 0; }
												z += parseInt( temp );
						      					console.log("Z: "+z);	
											});

											if( z == 0 ){
												jQuery('#error_hospedaje').attr('class', 'error');
											}else{
												jQuery('#error_hospedaje').attr('class', 'no_error');
											}

											return ( z == 0 );
										break;
										default:
											return true;
										break;
									}
								}

								form.addEventListener( 'keyup', function(event){
							        if ( event.target.validity.valid && especiales(event.target.id) ) {
							        	if( jQuery("#error_"+event.target.id).hasClass( "error" ) ){
							        		jQuery("#error_"+event.target.id).removeClass("error");
								        	jQuery("#error_"+event.target.id).addClass("no_error");
								        	jQuery("#"+event.target.id).removeClass("vlz_input_error");
							        	}
								    } else {
							        	if( jQuery("#error_"+event.target.id).hasClass( "no_error" ) ){
							        		jQuery("#error_"+event.target.id).removeClass("no_error");
								        	jQuery("#error_"+event.target.id).addClass("error");
								        	jQuery("#"+event.target.id).addClass("vlz_input_error");
							        	} 
								    }
								}, true);

								form.addEventListener( 'change', function(event){
							        if ( event.target.validity.valid && especiales(event.target.id) ) {
							        	if( jQuery("#error_"+event.target.id).hasClass( "error" ) ){
							        		jQuery("#error_"+event.target.id).removeClass("error");
								        	jQuery("#error_"+event.target.id).addClass("no_error");
								        	jQuery("#"+event.target.id).removeClass("vlz_input_error");
							        	}
								    } else {
							        	if( jQuery("#error_"+event.target.id).hasClass( "no_error" ) ){
							        		jQuery("#error_"+event.target.id).removeClass("no_error");
								        	jQuery("#error_"+event.target.id).addClass("error");
								        	jQuery("#"+event.target.id).addClass("vlz_input_error");
							        	} 
								    }

								}, true);

								jQuery(".vlz_input").each(function( index ) {
								  	var error = jQuery("<div class='no_error' id='error_"+( jQuery( this ).attr('id') )+"' data-id='"+( jQuery( this ).attr('id') )+"'></div>");
								  	var txt = jQuery( this ).attr("data-title");
								  	if( txt == "" || txt == undefined ){ txt = "Completa este campo."; }
								  	error.html( txt );
								  	jQuery( this ).parent().append( error );
								});

						      	function vista_previa(evt) {
							      	var files = evt.target.files;
							      	for (var i = 0, f; f = files[i]; i++) {  
							           	if (!f.type.match("image.*")) {
							                continue;
							           	}
							           	var reader = new FileReader();
							           	reader.onload = (function(theFile) {
							               return function(e) {
			                        			jQuery(".vlz_img_portada_fondo").css("background-image", "url("+e.target.result+")");
			                        			jQuery(".vlz_img_portada_normal").css("background-image", "url("+e.target.result+")");
			                        			jQuery("#vlz_img_perfil").attr("value", e.target.result);
			                        			jQuery("#error_vlz_img_perfil").css("display", "none");
							               };
							           })(f);
							           reader.readAsDataURL(f);
							       	}
								}      
						      	document.getElementById("portada").addEventListener("change", vista_previa, false);

						      	jQuery(".vlz_pin_check").on("click", function(){
						      		if( jQuery("input", this).attr("value") == "0" ){
						      			jQuery("input", this).attr("value", "1");
						      			jQuery(this).removeClass("vlz_no_check");
						      			jQuery(this).addClass("vlz_check");
						      		}else{
						      			jQuery("input", this).attr("value", "0");
						      			jQuery(this).removeClass("vlz_check");
						      			jQuery(this).addClass("vlz_no_check");
						      		}
						      	});

						      	jQuery(".vlz_boton_agregar").on("click", function(){

						      		jQuery(".vlz_boton_quitar").off("click");

						      		var servicios = jQuery('<select class="vlz_input" id="servicio[]" name="servicio[]"><option value="8">Guarder&iacute;a (Cuidado durante el d&iacute;a)</option><option value="9">Adiestramiento de obediencia b&aacute;sico</option><option value="10">Adiestramiento de obediencia intermedio</option><option value="11">Adiestramiento de obediencia avanzado</option><option value="12">Paseos</option></select>');
						      		var contCampos = jQuery("<div>", {"class": "vlz_cell66 jj_input_cell00"});

						      		<?php
										$tam = array(
											"pequenos" => "Peque&ntilde;os",
											"medianos" => "Medianos",
											"grandes"  => "Grandes",
											"gigantes" => "Gigantes",
										);
										$txts = array(
											"pequenos" => "",
											"medianos" => "",
											"grandes"  => "",
											"gigantes" => ""
										);
						      			foreach ($tam as $key => $value) {
											echo "var ".$key." = jQuery(\"<div class='vlz_cell25'><input type='text' id='adicional_".$key."' name='adicional_".$key."[]' class='vlz_input' placeholder='".$value."'title='".$txts[$key]."' data-minvalue data-charset='num'><div class='no_error' id='error_adicional_".$key."'></div></div>\");";
											echo "jQuery(contCampos).append( ".$key." );";
										}
						      		?>
						      		
						      		var contBoton = jQuery("<div>", {"class": "vlz_cell25"});
						      			jQuery(contBoton).append( jQuery("<div>", {"class": "vlz_boton_quitar"}) );

						      		var lista = jQuery("<div>", {"class": "vlz_cell75 jj_input_cell00"});
						      			jQuery(lista).append( servicios );

						      		var contLista = jQuery("<div>", {"class": "vlz_cell33 jj_input_cell00"});
						      		jQuery(contLista).append( contBoton );
						      		jQuery(contLista).append( lista );

						      		var newItem = jQuery("<div>", {"class": "vlz_sub_seccion"});
						      		jQuery(newItem).append( contLista );
						      		jQuery(newItem).append( contCampos );

						      		jQuery( ".vlz_contenedor_adicionales" ).append( newItem );

						      		jQuery(".vlz_boton_quitar").on("click", function(){
						      			jQuery(this).parent().parent().parent().remove();
						      		});

						      	});

						      	function mail_ext_temp(){
						      		jQuery(".vlz_modal_contenido").css("display", "none");
						      		jQuery("#vlz_cargando").css("display", "block");

						      		jQuery("#vlz_cargando").html("<h2>Enviando Informaci&oacute;n al correo...</h2>");

						      		jQuery.ajax({
									    url: '<?php echo get_template_directory_uri()."/vlz/form/vlz_mail.php"; ?>',
									    type: "post",
									    data: {
											usuario: 	jQuery("#username").attr("value")	,
											clave:   	jQuery("#clave").attr("value")		,
											email: 	 	jQuery("#email").attr("value")		,
											nombres: 	jQuery("#nombres").attr("value")	,
											apellidos:  jQuery("#apellidos").attr("value")
										},
									    success: function (r) {
								      		jQuery("#vlz_titulo_registro").html("Registro Completado!");
										  	jQuery("#vlz_cargando").html(r);
								      		jQuery("#vlz_modal_cerrar_registrar").attr("onclick", "GoToHomePage()");
								      		jQuery("#check_term").hide();
								      		jQuery("#boton_registrar_modal").hide();
								      		jQuery("#vlz_contenedor_botones").css("display", "block");
								      		jQuery("#vlz_contenedor_botones").append('<div class="vlz_modal_pie" style="border-radius: 0px 0px 5px 5px!important; height: 70px;"><input type="button" style="text-align: center;" class="vlz_boton_siguiente" onclick="GoToHomePage()" value="Cerrar" /></div>')
									    }
									});
						      	}
						      	function GoToHomePage(){
							    	location = '<?php echo get_home_url()."/perfil-usuario/?ua=profile"; ?>';   
							  	}

						      	jQuery("#vlz_form_nuevo_cuidador").submit(function(e){

						      		jQuery("#vlz_modal_cerrar_registrar").attr("onclick", "");

						      		if( form.checkValidity() ){
							            var terminos = jQuery("#terminos").attr("value");
							      		if( terminos == 1){

							      			var portada = jQuery("#vlz_img_perfil").attr("value");
							      			if( portada != "" ){

								      			var a = "<?php echo get_template_directory_uri()."/vlz/form/vlz_procesar.php"; ?>";

									      		jQuery("#vlz_contenedor_botones").css("display", "none");
									      		jQuery(".vlz_modal_contenido").css("display", "none");
									      		jQuery("#vlz_cargando").css("display", "block");
									      		jQuery("#vlz_cargando").css("height", "auto");
									      		jQuery("#vlz_cargando").css("text-align", "center");
									      		jQuery("#vlz_cargando").html("<h2>Registrando, por favor espere...</h2>");
									      		jQuery("#vlz_titulo_registro").html("Registrando, por favor espere...");
								             	
									      		jQuery.post( a, jQuery("#vlz_form_nuevo_cuidador").serialize(), function( data ) {

									      			// console.log(data);

										      		data = eval(data);

										      		if( data.error == "SI" ){

										      			jQuery('html, body').animate({ scrollTop: jQuery("#email").offset().top-75 }, 2000);

										      			alert(data.msg);

										      			jQuery("#terminos_y_condiciones").css("display", "none");

										      			jQuery("#vlz_contenedor_botones").css("display", "block");
											      		jQuery(".vlz_modal_contenido").css("display", "block");
											      		jQuery("#terminos").css("display", "block");
											      		jQuery("#vlz_cargando").css("height", "auto");
											      		jQuery("#vlz_cargando").css("text-align", "justify");

											      		jQuery("#vlz_titulo_registro").html('Términos y Condiciones');
									      				jQuery("#boton_registrar_modal").css("display", "inline-block");

										      		}else{
										      			mail_ext_temp();
										      		}

												});
									      	}else{
									      		jQuery('.vlz_modal').css('display', 'none');
									      	}

							      		}else{
								      		alert("Debe aceptar los términos y condiciones.");
						      				vlz_modal('terminos', 'Términos y Condiciones');
							      		}

						      		}

						      		e.preventDefault();
						      	});


						      	function initMap() {
							       	
						      	}

						      	jQuery("#vlz_obtener_direccion").on("click", function(e){
						      		e.preventDefault();

						      		var lat = jQuery("#latitud").attr("value");
						      		var lon = jQuery("#longitud").attr("value");

						      		var url = "https://maps.googleapis.com/maps/api/geocode/json?latlng="+lat+","+lon+"&key=AIzaSyD-xrN3-wUMmJ6u2pY_QEQtpMYquGc70F8";
						      		
						      		jQuery("#vlz_bloqueador_dir").css("display", "block");
						      		jQuery("#vlz_obtener_direccion").html("Cargando...");
						      		jQuery("#vlz_obtener_direccion").css("background-color", "#cecece");
						      		jQuery("#vlz_obtener_direccion").css("border", "solid 1px #a7a7a7");

						      		jQuery.post( url, function( data ) {
						      			var adress = "";
						      			if( data.results.length > 1){
						      				data.results[1].address_components.forEach(function(item, index){
							      				if(index == 0){
							      					adress += item.long_name;
							      				}else{
							      					adress += ", "+item.long_name;
							      				}
							      			});
						      			}else{
						      				if( data.results.length == 0 ){
						      					adress = "No se pudo obtener una dirección valida";
						      				}else{
						      					adress = data.results[0].address_components[0].long_name;
						      				}
						      			}
									  	jQuery("#direccion").attr("value", adress);

									  	jQuery("#vlz_bloqueador_dir").css("display", "none");
						      			jQuery("#vlz_obtener_direccion").html("Obtener Direcci&oacute;n");
							      		jQuery("#vlz_obtener_direccion").css("background-color", "rgb(254, 254, 120)");
							      		jQuery("#vlz_obtener_direccion").css("border", "solid 1px #2ca683");
									});
						      	});

						      	function clvs_iguales(e){
						      		var clv1 = jQuery("#clave").attr("value");
						      		var clv2 = jQuery("#clave2").attr("value");

						      		if( clv1 == clv2 ){

						      			jQuery("#error_clave").removeClass("error");
							        	jQuery("#error_clave").addClass("no_error");
							        	jQuery("#clave").removeClass("vlz_input_error");

						      			jQuery("#error_clave2").removeClass("error");
							        	jQuery("#error_clave2").addClass("no_error");
							        	jQuery("#clave2").removeClass("vlz_input_error");

						      		}else{
						        		jQuery("#error_clave").removeClass("no_error");
							        	jQuery("#error_clave").addClass("error");
							        	jQuery("#clave").addClass("vlz_input_error");

						        		jQuery("#error_clave2").removeClass("no_error");
							        	jQuery("#error_clave2").addClass("error");
							        	jQuery("#clave2").addClass("vlz_input_error");
						      		}
						      	}

						      	jQuery( "#clave" ).keyup(clvs_iguales);
						      	jQuery( "#clave2" ).keyup(clvs_iguales);

						      	function vlz_validar(){
						      		var error = 0;

						      		if( !form.checkValidity() ){
						      			error++;						      			
						      		}

						      		if( !especiales("clave") ){
						      			error++;						      			
						      		}

						      		if( especiales("hospedaje") ){
						      			error++;						      			
						      		}

						      		if( error > 0 ){
						      			var primer_error = ""; var z = true;
						      			jQuery( ".error" ).each(function() {
										  	if( jQuery( this ).css( "display" ) == "block" ){
										  		if( z ){
										  			primer_error = "#"+jQuery( this ).attr("data-id");
										  			z = false;
										  		}
										  	}
										});

										console.log("primer_error: "+primer_error);

						      			jQuery('html, body').animate({ scrollTop: jQuery(primer_error).offset().top-75 }, 2000);
						      		}else{
						      			vlz_modal('terminos', 'Términos y Condiciones');
						      		}

						      	}

						      	function vlz_modal(tipo, titulo, contenido){

						      		switch(tipo){

						      			case "terminos":

						      				jQuery("#vlz_titulo_registro").html(titulo);
						      				jQuery("#terminos_y_condiciones").css("display", "table");
						      				jQuery("#boton_registrar_modal").css("display", "inline-block");

						      			break;

						      		}

						      	}
					      	</script> 

						</article>
						
					</div>
					
				</div>
			</div>
		</section>
		<div class="pf-blogpage-spacing pfb-bottom"></div> <?php 

	get_footer(); 
?>