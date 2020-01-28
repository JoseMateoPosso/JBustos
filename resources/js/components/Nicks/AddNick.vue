<template>
    <div class="modal fade" id="nickCreate">
        <div class="modal-dialog">
            <div class="modal-content">
	            <div class="modal-header">
                    <button type="button" class="close" v-on:click.prevent='close'>
                        <span>&times;</span>
                    </button>
                    <h3>Crear Nick</h3>
                </div>
                <div class="modal-body row">
                    <div class="col-md-12 col-xs-12 col-lg-12">
	        			<form>
        					<!-- <input type="hi]dden" name="_token" v-model="newToken" value="{{ csrf_token() }}"> -->
        					<div class="col-10 offset-1 col-md-10 offset-md-1">
        						<label for="page" >Modelo *</label>
        						<select name="idType" class="form-control" v-model="cmbModelId" disabled>
        								<option value="">--Seleccione una opción--</option>
        	                        	<option v-for="(modelo, index) in arrayModelos" :value="modelo.id" v-text="modelo.name"></option>
        						</select>
        					</div>
        					<div class="col-10 offset-1 col-md-10 offset-md-1">
        						<label for="page" >Página *</label>
        						<select name="idType" class="form-control" v-model="info.page_id" required>
        								<option value="">--Seleccione una opción--</option>
        	                        	<option v-for="(pagina, index) in arrayPaginas" :value="pagina.id" v-text="pagina.name"></option>
        						</select>
        					</div>
        					<div class="col-10 offset-1 col-md-10 offset-md-1">
        						<label for="idType">Nickname *</label>
        						<input type="text" name="nickname" class="form-control" v-model="info.nickname" required>						
        					</div>
        					<div class="col-10 offset-1 col-md-10 offset-md-1">
        						<label for="password">Password *</label>
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
                    <input type="submit" v-on:click.prevent="addNick"  class="btn btn-primary" value="Guardar">
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
        props: ['cmbModelId'],
        data (){
            return{
                info: {
                	'id'		: '',
                	'nickname'	: '',
                	'password'	: '',
                	'url'		: '',
                	'page_id'	: '',
                    'model_id'  : '',
                },
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
            addNick: function(){
            	var _this = this;
                var urlDetail = 'nick';
                _this.info.model_id = _this.cmbModelId;
                axios.post(urlDetail,_this.info).then(response => {                
                    _this.info ={
	                	'id'		: '',
	                	'nickname'	: '',
	                	'password'	: '',
	                	'url'		: '',
	                	'page_id'	: '',
                        'model_id'  : '',               	
                	};
                	toastr.success('Nick creado satisfactoriamente');
                    _this.$emit('saved');
                }).catch(function(error){
                    console.log(error);
                    toastr.error('No se pudo cargar la información');
                });
            },
            close: function(){
                $('#nickCreate').modal('hide');
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