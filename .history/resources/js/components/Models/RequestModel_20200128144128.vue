<template>
    <div class="modal fade" id="modalRequest">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" v-on:click.prevent='close'>
                        <span>&times;</span>
                    </button>
                    <div class="col-md-12 col-md-offset-0 col-xs-8 col-xs-offset-2 text-center">
                        <h3>Editar Modelo</h3>
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
                                <select name="sede_id" class="form-control" v-model="info.sede_id">
                                    <option value="">--Seleccione una opción--</option>
                                    <option v-for="(sede, index) in arraySedes" :value="sede.id" v-text="sede.name"></option>
                                </select>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="modal-footer">
                    <div class="col-md-8 offset-md-2 col-10 offset-1">
                        <input type="submit" v-on:click.prevent="editModel"  class="btn btn-primary" value="Guardar">
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
        props: ['info'],
        data (){
            return{
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
            editModel: function(){
            	var _this = this;
                var urlDetail = 'model/' + _this.info.id;

                if(_this.info.sede_id == ''){
                    toastr.error('La sede es obligatoria');
                    return;
                }

                axios.put(urlDetail,_this.info).then(response => {
                    toastr.success('Modelo actualizado satisfactoriamente');
                    _this.$emit('updated');
                }).catch(function(error){
                    console.log(error);
                    toastr.error('No se pudo cargar la información');
                });
            },
            close: function(){
                $('#modelEdit').modal('hide');
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
