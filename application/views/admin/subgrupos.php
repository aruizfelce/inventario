<main>
				<nav class="breadcrumb-nav col s12 truncate" style="margin-bottom:10px">
					<div class="nav-wrapper grey lighten-1">
						<div class="col s12">
							<a v-bind:href="'http://localhost/inventario/tablas/grupos/disciplina/'+ idDisc" class="breadcrumb">{{ disciplinaDesc }}</a>
							<a href="" class="breadcrumb">{{ grupoDesc }}</a>
							<a href="" class="breadcrumb">Subgrupos</a>
					
						</div>
					</div>
				</nav>
				<div class="row">
					<div class="col m2">
						<button data-target="modal2" class="btn modal-trigger">Agregar</button>
					</div>
					<div class="col m8">	
						<input type="text" v-model="textobuscar" placeholder="Buscar">
					</div>					
				</div>
				
				<table class="bordered">
					<tr>
						<th>ID</th>
						<th>Codigo</th>
						<th>Descripcion</th>
						<th></th>
						<th></th>
						<th></th>
					</tr>
					<tr v-for="(subgrupo,index) in buscar" v-show="(pag - 1) * NUM_RESULTS <= index  && pag * NUM_RESULTS > index">
						<td>{{ subgrupo.idSubgrupo }}</td>
						<td>{{ subgrupo.subgrupoCodigo }}</td>
						<td>{{ subgrupo.subgrupoDescripcion }}</td>
						<td>
							<button class="btn-floating red" @click="eliminar(subgrupo)">
								<i class="material-icons">delete</i> 
							</button>
						</td> 
						<td>
							<button class="btn-floating blue" @click="cargaModal(subgrupo)">
								<i class="material-icons">edit</i> 
							</button>
						<td>
						<td>
							<a class="btn-floating blue" v-bind:href="'http://localhost/inventario/tablas/productos/subgrupo/'+ subgrupo.idSubgrupo"><i class="material-icons">arrow_forward</i></a>
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
							<a href="#" aria-label="Next" v-show="pag * NUM_RESULTS / subgrupos.length < 1" @click.prevent="pag += 1">
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
			<h4>Editar Subgrupo</h4>
			<p>
				<input type="text" id="idSubgrupo" v-model="subgrupoModal.idSubgrupo">
				<input type="text" id="grupo" v-model="subgrupoModal.grupo">
				<div class="input-field">
					<input id="subgrupoCodigo" type="text" v-model="subgrupoModal.subgrupoCodigo" placeholder="subgrupoModal.subgrupoCodigo">
					<label for="subgrupoCodigo">Codigo</label>
				</div>
				<div class="input-field">
					<input id="subgrupoDescripcion" type="text" v-model="subgrupoModal.subgrupoDescripcion" placeholder="subgrupoModal.subgrupoDescripcion">
					<label for="subgrupoDescripcion">Descripcion</label>
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
				<h4>Agregar subgrupo</h4>
					<p>
						<div class="input-field">
							<input id="subgrupoCodigo" type="text" v-model="subgrupoCodigo">
							<label for="subgrupoCodigo">Codigo</label>
						</div>	
						<div class="input-field">
							<input id="subgrupoDescripcion" type="text" v-model="subgrupoDescripcion">
							<label for="subgrupoDescripcion">Descripcion</label>
						</div>
							  
			        </p>
			</div>
			<div class="modal-footer">
				<button class="btn" @click="insertar">Guardar</button>
				<a class="modal-close waves-effect waves-green btn-flat">Cerrar</a>
			</div>
		</div>
 </main>	
      <!--JavaScript at end of body for optimized loading-->
	 <script src="https://unpkg.com/vue/dist/vue.js"></script>
 	 <script src="https://cdn.jsdelivr.net/npm/vue@2/dist/vue.js"></script>
 	 <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
	 <script src="<?php echo base_url() ?>assets/js/subgrupos.js"></script>
	  