<template>
    <div class="modal fade" id="nickEdit">
        <div class="modal-dialog">
            <div class="modal-content">
	            <div class="modal-header">
                    <button type="button" class="close" v-on:click.prevent='close'>
                        <span>&times;</span>
                    </button>
                    <h3>Editar Nick</h3>
                </div>
                <div class="modal-body row">
                    <div class="col-md-12 col-xs-12 col-lg-12">
	        			<form>
        					<!-- <input type="hi]dden" name="_token" v-model="newToken" value="{{ csrf_token() }}"> -->
        					<div class="col-10 offset-1 col-md-10 offset-md-1">
        						<label for="page" >Modelo</label>
        						<select name="idType" class="form-control" v-model="info.model_id" disabled>
        								<option value="">--Seleccione una opción--</option>							
        	                        	<option v-for="(modelo, index) in arrayModelos" :value="modelo.id" v-text="modelo.name"></option>
        	                            
        						</select>						
        					</div>
        					<div class="col-10 offset-1 col-md-10 offset-md-1">
        						<label for="page" >Página</label>
        						<select name="idType" class="form-control" v-model="info.page_id" disabled>
        								<option value="">--Seleccione una opción--</option>							
        	                        	<option v-for="(pagina, index) in arrayPaginas" :value="pagina.id" v-text="pagina.name"></option>
        	                            
        						</select>						
        					</div>
        					<div class="col-10 offset-1 col-md-10 offset-md-1">
        						<label for="idType">Nickname</label>
        						<input type="text" name="nickname" class="form-control" v-model="info.nickname" required>						
        					</div>
        					<div class="col-10 offset-1 col-md-10 offset-md-1">
        						<label for="clave">Password</label>
        						<input type="text" name="name" class="form-control" v-model="info.password" required>						
        					</div>
                            <div class="col-10 offset-1 col-md-10 offset-md-1">
                                <label for="url">URL Logueo</label>
                                <input type="text" name="url" class="form-control" v-model="info.url">                        
                            </div>      					
        				</form>
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="submit" v-on:click.prevent="editNick"  class="btn btn-primary" value="Actualizar">
                </div>
			</div>
		</div>
	</div>
</template>
<script>
    import axios from 'axios';
    import toastr from 'toastr';
    import swal from 'sweetalert';

    export default {
        props: ['info'],
        data (){
            return{
                arrayPaginas: [],
                arrayModelos: [],

            }
        },
        created: function(){
           	this.getPages();
           	this.getModels();
        },
        methods: {
            getModels: function(){
                var _this = this;
                var urlDetail = 'model';
                axios.get(urlDetail).then(response => {                
                    _this.arrayModelos = response.data;                
                }).catch(function(error){
                    console.log(error);
                    toastr.error('No se pudo cargar la información');
                });
            },
            getPages: function(){
                var _this = this;
                var urlDetail = 'page';
                axios.get(urlDetail).then(response => {                
                    _this.arrayPaginas = response.data;                
                }).catch(function(error){
                    console.log(error);
                    toastr.error('No se pudo cargar la información');
                });    
            },
            editNick: function(){
            	var _this = this;
                var urlDetail = 'nick/' + _this.info.id;
                axios.put(urlDetail,_this.info).then(response => {                
                    toastr.success('Nick actualizado satisfactoriamente');
                    _this.$emit('updated');
                }).catch(function(error){
                    console.log(error);
                    toastr.error('No se pudo cargar la información');
                });
            },
            close: function(){
                $('#nickEdit').modal('hide');
            },
        }
    };
</script>
<style>
    #modelslogic{
        color: black;
    }

    #regVent{
        color: black;
    }
</style>