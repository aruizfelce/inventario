
<main>
			<nav class="breadcrumb-nav col s12 truncate" style="margin-bottom:10px">
				<div class="nav-wrapper grey lighten-1">
					<div class="col s12">
						<a href="" class="breadcrumb">Disciplinas</a>
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
					<thead>
						<tr>
							<th>ID</th>
							<th>Codigo</th>
							<th>Descripcion</th>
							<th></th>
							<th></th>
							<th></th>
						</tr>
					</thead>
					<tbody>
						<tr v-for="(disciplina,index) in buscar" v-show="(pag - 1) * NUM_RESULTS <= index  && pag * NUM_RESULTS > index">
							<td>{{ disciplina.idDisciplina }}</td>
							<td>{{ disciplina.disciplinaCodigo }}</td>
							<td>{{ disciplina.disciplinaDescripcion }}</td>
							<td>
								<button class="btn-floating red" @click="eliminar(disciplina)">
									<i class="material-icons">delete</i> 
								</button>
							</td> 
							<td>
								<button class="btn-floating blue" @click="cargaModal(disciplina)">
									<i class="material-icons">edit</i> 
								</button>
							<td>
							<td>
								<a class="btn-floating blue" v-bind:href="'http://localhost/inventario/tablas/grupos/disciplina/'+ disciplina.idDisciplina"><i class="material-icons">arrow_forward</i></a>
							<td>
						</tr>
					</tbody>	
				</table>
				<div  style="margin-top:10px">
					<ul class="pagination text-center">
						<li class="waves-effect blue">
							<a href="#" aria-label="Previous" v-show="pag != 1" @click.prevent="pag -= 1">
								<span aria-hidden="true" class="white-text">Anterior</span>
							</a>
						</li>
						<li class="waves-effect blue text-white">
							<a href="#" aria-label="Next" v-show="pag * NUM_RESULTS / disciplinas.length < 1" @click.prevent="pag += 1">
								<span aria-hidden="true" class="white-text">Siguiente</span>
							</a>
						</li>
					</ul>
				</div>			

		<!-- Modal Structure -->
		<div id="modal1" class="modal modal-fixed-footer">
			<div class="modal-content">
					<div>
    					<h6 class="center-align">Editar Disciplina</h6>
  					</div>
				<p>
					<input type="hidden" id="idDisciplina" v-model="disciplinaModal.idDisciplina">
					<div class="input-field">
						<input id="disciplinaCodigo" type="text" v-model="disciplinaModal.disciplinaCodigo" placeholder="disciplinaModal.disciplinaCodigo">
						<label for="disciplinaCodigo">Codigo</label>
					</div>
					<div class="input-field">
						<input id="disciplinaDescripcion" type="text" v-model="disciplinaModal.disciplinaDescripcion" placeholder="disciplinaModal.disciplinaDescripcion">
						<label for="disciplinaDescripcion">Descripcion</label>
					</div>
				</p>
			</div>
			<div class="modal-footer">
				<button class="btn" @click="actualizar">Actualizar</button>
				<button class="btn" @click="cerrarModal">Cerrar</button>
				<!-- <a class="modal-close waves-effect waves-green btn-flat">Cerrar</a> -->
			</div>
		</div>  

		<div id="modal2" class="modal modal-fixed-footer">
			<div class="modal-content">
					<div>
    					<h6 class="center-align">Agregar Disciplina</h6>
  					</div>
					<p>
						<div class="input-field">
							<input id="disciplinaCodigo" type="text" v-model="disciplinaCodigo">
							<label for="disciplinaCodigo">Codigo</label>
							<span v-if="buscarCodigo >= 0" class="helper-text red-text"  data-success="">El codigo ya existe</span>
						</div>	
						<div class="input-field">
							<input id="disciplinaDescripcion" type="text" v-model="disciplinaDescripcion">
							<label for="disciplinaDescripcion">Descripcion</label>
						</div>
							  
			        </p>
			</div>
			<div class="modal-footer">
				<button class="btn" @click="insertar" v-show="disciplinaCodigo && disciplinaDescripcion && buscarCodigo == -1">Guardar</button>
				<button class="btn" @click="cerrarModal">Cerrar</button>
				<!-- <a class="modal-close waves-effect waves-green btn-flat">Cerrar</a> -->
			</div>
		</div>
	
 </main>	
 
 <script src="https://unpkg.com/vue/dist/vue.js"></script>
 <script src="https://cdn.jsdelivr.net/npm/vue@2/dist/vue.js"></script>
 <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
 <script src="<?php echo base_url() ?>assets/js/disciplinas.js"></script>
