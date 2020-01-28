<template>
    <div class="modal fade" id="modelCreate">
        <div class="modal-dialog">
            <div class="modal-content">
	            <div class="modal-header">
                    <button type="button" class="close" v-on:click.prevent='close'>
                        <span>&times;</span>
                    </button>
                    <div class="col-md-12 col-md-offset-0 col-xs-8 col-xs-offset-2 text-center">
                        <h3>Crear Modelo</h3>
                    </div>
                </div>
                <div class="modal-body row">
                    <div class="col-md-12">
	        			<form>
        					<div class="col-10 offset-1 col-md-10 offset-md-1">
                                <label for="name">Nombres</label>
                                <input type="text" name="name" class="form-control" v-model="info.name" required>
                            </div>
                            <div class="col-10 offset-1 col-md-10 offset-md-1">
                                <label for="lastname">Apellidos</label>
                                <input type="text" name="lastname" class="form-control" v-model="info.lastname" required>
                            </div>
                            <div class="col-10 offset-1 col-md-10 offset-md-1">
                                <label for="identification">Identificación</label>
                                <input type="text" name="identification" class="form-control" v-model="info.identification" required>
                            </div>
                            <div class="col-10 offset-1 col-md-10 offset-md-1">
                                <label for="email">Correo</label>
                                <input type="text" name="email" class="form-control" v-model="info.email" required>
                            </div>
                            <div class="col-10 offset-1 col-md-10 offset-md-1">
                                <label for="cellphone">Celular</label>
                                <input type="text" name="cellphone" class="form-control" v-model="info.cellphone">
                            </div>
                            <div class="col-10 offset-1 col-md-10 offset-md-1">
        						<label for="admission_date">Fecha ingreso</label>
        						<input type="date" name="admission_date" class="form-control" v-model="info.admission_date" required>
        					</div>
                            <div class="col-10 offset-1 col-md-10 offset-md-1">
                                <label for="sede_id">Sede</label>
                               
                                <select>
                                    <option value="1">Centro</option>
                                </select>
                            </div>
        				</form>
                    </div>
                </div>
                <div class="modal-footer">
                    <div class="col-md-8 offset-md-2 col-10 offset-1">
                        <input type="submit" v-on:click.prevent="addModel"  class="btn btn-primary" value="Guardar">
                    </div>
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
       data (){
            return{
                info: {
                    'identification'    :'',
                    'name'              :'',
                    'lastname'          :'',
                    'address'           :'',
                    'email'             :'',
                    'cellphone'         :'',
                    'admission_date'    :'',
                    'sede_id'           :'',
                },
                arraySedes: [],
                isParent: false,
            }
        },
        created: function(){
            this.getSedes();
        },
        methods: {
            getSedes: function(){
                var _this = this;
                var urlDetail = 'sede';
                axios.get(urlDetail).then(response => {
                    _this.arraySedes = response.data;
                }).catch(function(error){
                    console.log(error);
                    toastr.error('No se pudo cargar la información');
                });

            },
            addModel: function(){
            	var _this = this;
                var urlDetail = 'model';

                // if(_this.info.sede_id == ''){
                //     toastr.error('La sede es obligatoria');
                //     return;
                // }

                axios.post(urlDetail,_this.info).then(response => {
                    _this.info = {
                        'identification'    :'',
                        'name'              :'',
                        'lastname'          :'',
                        'address'           :'',
                        'email'             :'',
                        'cellphone'         :'',
                        'admission_date'    :'',
                        'sede_id'           : '',
                    };

                	toastr.success('Modelo creada satisfactoriamente');
                    _this.$emit('saved');
                }).catch(function(error){
                    console.log(error);
                    toastr.error('No se pudo cargar la información');
                });
            },
            close: function(){
                $('#modelCreate').modal('hide');
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
