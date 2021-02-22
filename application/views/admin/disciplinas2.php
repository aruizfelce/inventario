
<main>
			<nav class="breadcrumb-nav col s12 truncate" style="margin-bottom:10px">
				<div class="nav-wrapper grey lighten-1">
					<div class="col s12">
						<a href="" class="breadcrumb">Disciplinas</a>
					</div>
				</div>
			</nav>
				
				<button data-target="modal2" class="btn modal-trigger">Agregar</button>
				
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
						<tr v-for="(disciplina,index) in disciplinas" v-show="(pag - 1) * NUM_RESULTS <= index  && pag * NUM_RESULTS > index">
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
				<h4>Editar Disciplina</h4>
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
				<a class="modal-close waves-effect waves-green btn-flat">Cerrar</a>
			</div>
		</div>  

		<div id="modal2" class="modal modal-fixed-footer">
			<div class="modal-content">
				<form @submit.prevent="insertar">
				<h4>Agregar disciplina</h4>
					<p>
						<div class="input-field">
							
							<input id="disciplinaCodigo" name="disciplinaCodigo" type="text" v-model="disciplinaCodigo" v-validate="'required'" :class="{ 'is-invalid': submitted && errors.has('disciplinaCodigo') }">
							<label for="disciplinaCodigo">Codigo</label>
							<div v-if="submitted && errors.has('disciplinaCodigo')" class="invalid-feedback">
								{{ errors.first("disciplinaCodigo") }}
							</div>
						</div>	
						<div class="input-field">
							<input id="disciplinaDescripcion" type="text" v-model="disciplinaDescripcion">
							<label for="disciplinaDescripcion">Descripcion</label>
						</div>
							  
			        </p>
			</div>
			<div class="modal-footer">
				<button class="btn" >Guardar</button>
				<a class="modal-close waves-effect waves-green btn-flat">Cerrar</a>
			</div>
		</div>
	
 </main>	
 
 <script src="https://unpkg.com/vue/dist/vue.js"></script>
 <script src="https://cdn.jsdelivr.net/npm/vue@2/dist/vue.js"></script>
 <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
 <script src="<?php echo base_url() ?>assets/js/disciplinas.js"></script>
