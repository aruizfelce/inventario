<main>

	      		<nav class="breadcrumb-nav col s12 truncate" style="margin-bottom:10px">
					<div class="nav-wrapper grey lighten-1">
						<div class="col s12">
							<a v-bind:href="'http://localhost/inventario/tablas/grupos/disciplina/'+ idDisc" class="breadcrumb">{{ disciplinaDesc }}</a>
							<a v-bind:href="'http://localhost/inventario/tablas/subgrupos/grupo/'+ idGrup" class="breadcrumb">{{ grupoDesc }}</a>
							<a href="" class="breadcrumb">{{ subgrupoDesc }}</a>
							<a href="" class="breadcrumb">Productos</a>
						</div>
					</div>
				</nav>
 				
				<div class="row">
					<div class="col m2">
						<button data-target="modal2" class="btn modal-trigger">Agregar</button>
					</div>
					<div class="col m8">	
						<input id="productoBuscar" type="text" v-model="textobuscar" placeholder="Buscar">
					</div>					
				</div>
				<table class="bordered responsive">
					<tr>
						<th>ID</th>
						<th>Codigo</th>
						<th>Descripcion</th>
						<th>Ubicacion</th>
						<th>Precio</th>
						<th></th>
						<th></th>
						
					</tr>
					<tr v-for="(producto,index) in buscar" v-show="(pag - 1) * NUM_RESULTS <= index  && pag * NUM_RESULTS > index">
						<td>{{ producto.idProducto }}</td>
						<td>{{ producto.productoCodigo }}</td>
						<td>{{ producto.productoDescripcion }}</td>
						<td>{{ producto.ubicacion }}</td>
						<td>{{ producto.precio }}</td>
						<td>
							<button class="btn-floating red" @click="eliminar(producto)">
								<i class="material-icons">delete</i> 
							</button>
						</td> 
						<td>
							<button class="btn-floating blue" @click="cargaModal(producto)">
								<i class="material-icons">edit</i> 
							</button>
						<td>
						
					</tr>
				</table>
				<div style="margin-top:10px">
					<ul class="pagination text-center">
						<li class="waves-effect blue">
							<a href="#" aria-label="Previous" v-show="pag != 1" @click.prevent="pag -= 1">
								<span aria-hidden="true" class="white-text">Anterior</span>
							</a>
						</li>
						<li class="waves-effect blue text-white">
							<a href="#" aria-label="Next" v-show="pag * NUM_RESULTS / productos.length < 1" @click.prevent="pag += 1">
								<span aria-hidden="true" class="white-text">Siguiente</span>
							</a>
						</li>
					</ul>
				</div>			
			</div>
		  </div>	

		    
		<!-- Modal Structure -->
		<div id="modal1" class="modal modal-fixed-footer">
			<div class="modal-content">
			<h4>Editar Producto</h4>
			<p>
				<input type="hidden" id="idProducto" v-model="productoModal.idProducto">
				<input type="hidden" id="subgrupo" v-model="productoModal.subgrupo">
				<div class="input-field">
					<input id="productoCodigo" type="text" v-model="productoModal.productoCodigo" placeholder="productoModal.productoCodigo">
					<label for="productoCodigo">Codigo</label>
				</div>
				<div class="input-field">
					<input id="productoDescripcion" type="text" v-model="productoModal.productoDescripcion" placeholder="productoModal.productoDescripcion">
					<label for="productoDescripcion">Descripcion</label>
				</div>
				<div class="input-field">
					<input id="ubicacion" type="text" v-model="productoModal.ubicacion" placeholder="productoModal.ubicacion">
					<label for="ubicacion">Ubicacion</label>
				</div>
				<div class="input-field">
					<input id="precio" type="text" v-model="productoModal.precio" placeholder="productoModal.precio">
					<label for="precio">Precio</label>
				</div>
				<div class="input-field">
					<input id="precioMayor" type="text" v-model="productoModal.precioMayor" placeholder="productoModal.precioMayor">
					<label for="precioMayor">Precio al Mayor</label>
				</div>
				<div class="input-field">
					<input id="fechaPrecio" type="text" v-model="productoModal.fechaPrecio" placeholder="productoModal.fechaPrecio">
					<label for="fechaPrecio">Fecha del Precio</label>
				</div>
				<div class="input-field">
					<input id="productoFoto" type="text" v-model="productoModal.productoFoto" placeholder="productoModal.productoFoto">
					<label for="productoFoto">Foto</label>
				</div>
				<div class="input-field">
					<input id="unidad" type="text" v-model="productoModal.unidad" placeholder="productoModal.unidad">
					<label for="unidad">Unidad</label>
				</div>
				<div class="input-field">
					<input id="piezas" type="text" v-model="productoModal.piezas" placeholder="productoModal.piezas">
					<label for="piezas">Piezas</label>
				</div>
				<div class="input-field">
					<input id="unidadPieza" type="text" v-model="productoModal.unidadPieza" placeholder="productoModal.unidadPieza">
					<label for="unidadPieza">Unidad Piezas</label>
				</div>
				
			</p>
			</div>
			<div class="modal-footer">
				<button class="btn" @click="actualizar">Actualizar</button>
			<a class="modal-close waves-effect waves-green btn-flat">Cerrar</a>
			</div>
		</div>  

		<div id="modal2" class="modal modal-fixed-footer">
			<div class="modal-content">
					<div>
    					<h6 class="center-align">Agregar Producto</h6>
  					</div>
					<form>
						<div class="input-field">
							<input id="productoCodigo" type="text" v-model="productoCodigo" v-bind:placeholder="productoCodigo" disabled>
							<label for="productoCodigo">Codigo</label>
						</div>	
							
						<div class="input-field">
							<input id="productoDescripcion" type="text" v-model="productoDescripcion" class="validate" required>
							<label for="productoDescripcion">Descripcion</label>
						</div>
							
							
						<div class="input-field">
							<input id="ubicacion" type="text" v-model="ubicacion">
							<label for="ubicacion">Ubicacion</label>
						</div>
						
						
						<div class="row">
							<div class="col m4">
								<div class="input-field">
									<input id="precio" type="number" v-model="precio">
									<label for="precio">Precio</label>
								</div>
							</div>	
							<div class="col m4">
								<div class="input-field">
									<input id="precioMayor" type="number" v-model="precioMayor">
									<label for="precioMayor">Precio al Mayor</label>
								</div>
							</div>
							<div class="col m4">
								<div class="input-field">
									<input id="fechaPrecio" type="date" v-model="fechaPrecio">
									<label for="fechaPrecio">Fecha del Precio</label>
								</div>
							</div>
							
						</div>	
						<div class="row">
							<div class="col m6">
								<div class="file-field input-field">
									<div class="btn">
										<span>Foto</span>
										<input type="file" type="file" id="file" ref="file" accept="image/*" v-on:change="onChangeFileUpload()">
									</div>
									<div class="file-path-wrapper">
										<input class="file-path validate" id="productoFoto" type="text" v-model="productoFoto">
									</div>
								</div> 
							</div>
							<div class="col m6 center-align">
								<img v-if="urlImagen" :src="urlImagen" width="100">
							</div>
						</div>
			
							
						<div class="row">
							<div class="col m4">
								<div class="input-field">
									<input id="unidad" type="text" v-model="unidad">
									<label for="unidad">Unidad</label>
								</div>
							</div>
							<div class="col m4">
								<div class="input-field">
									<input id="piezas" type="text" v-model="piezas">
									<label for="piezas">Piezas</label>
								</div>
							</div>		
							<div class="col m4">
								<div class="input-field">
									<input id="unidadPieza" type="text" v-model="unidadPieza">
									<label for="unidadPieza">Unidades Pieza</label>
								</div>
							</div>
						</div>		
					
			</div>
			<div class="modal-footer">
				<button class="btn" type="submit" @click="insertar">Guardar</button>
				<a class="modal-close waves-effect waves-green btn-flat">Cerrar</a>
			</div>
		</form>	
		</div>
 </main>	
      <!--JavaScript at end of body for optimized loading-->
	 
	 <script src="https://unpkg.com/vue/dist/vue.js"></script>
 	 <script src="https://cdn.jsdelivr.net/npm/vue@2/dist/vue.js"></script>
 	 <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
	 <script src="<?php echo base_url() ?>assets/js/productos.js"></script>
	  