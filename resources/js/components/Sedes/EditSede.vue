<template>
    <div class="modal fade" id="SedeEdit">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" v-on:click.prevent='close'>
                        <span>&times;</span>
                    </button>
                    <div class="col-md-12 col-md-offset-0 col-xs-8 col-xs-offset-2 text-center">
                        <h3>Editar Sede</h3>
                    </div>
                </div>
                <div class="modal-body row">
                    <div class="col-md-12">
                        <form>
                            <div class="col-10 offset-1 col-md-10 offset-md-1">
                                <label for="name">Nombre</label>
                                <input type="text" name="name" class="form-control" v-model="info.name" required>
                            </div>
                            <div class="col-10 offset-1 col-md-10 offset-md-1">
                                <label for="representative">Representante</label>
                                <input type="text" name="representative" class="form-control" v-model="info.representative" required>
                            </div>
                            <div class="col-10 offset-1 col-md-10 offset-md-1">
                                <label for="phone">Teléfono</label>
                                <input type="text" name="phone" class="form-control" v-model="info.phone">
                            </div>
                            <div class="col-10 offset-1 col-md-10 offset-md-1">
                                <label for="email">Correo electronico</label>
                                <input type="email" name="email" class="form-control" v-model="info.email"> 
                            </div>
                            <div class="col-10 offset-1 col-md-10 offset-md-1">
                                <label for="type">Porcentaje Pago</label>
                                <input type="number" name="type" class="form-control" v-model="info.type">
                            </div>
                            <div class="col-10 offset-1 col-md-10 offset-md-1">
                                <label for="address">Dirección</label>
                                <input type="text" name="address" class="form-control" v-model="info.address">
                            </div>
                        </form>
                    </div>
                </div>
                <div class="modal-footer">
                    <div class="col-md-8 offset-md-2 col-10 offset-1">
                        <input type="submit" v-on:click.prevent="editSede"  class="btn btn-primary" value="Guardar">
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
                
                isParent: false,
            }
        },
        methods: {
            editSede: function(){
            	var _this = this;
                var urlDetail = 'sede/' + _this.info.id;
                
                if(_this.isParent){
                    if(_this.info.sede_id == ''){
                        toastr.error('La sede es obligatoria');
                        return;
                    }
                }

                if(_this.idType == ''){
                    toastr.error('La identificación es obligatoria');
                    return;
                }

                if(_this.statecivil == ''){
                    toastr.error('El estado civil es obligatorio');
                    return;
                }

                if(_this.gruposanguineo == ''){
                    toastr.error('El grupo sanguíneo es obligatorio');
                    return;
                }

                if(_this.rh == ''){
                    toastr.error('El RH es obligatorio');
                    return;
                }

                if(_this.genre == ''){
                    toastr.error('El genero es obligatorio');
                    return;
                }

                if(_this.category_id == ''){
                    toastr.error('La categoria es obligatoria');
                    return;
                }

                if(_this.monitor_id == ''){
                    toastr.error('El monitor es obligatorio');
                    return;
                }

                axios.put(urlDetail,_this.info).then(response => {                
                    toastr.success('Página actualizada satisfactoriamente');
                    _this.$emit('updated');
                }).catch(function(error){
                    console.log(error);
                    toastr.error('No se pudo cargar la información');
                });
            },
            close: function(){
                $('#SedeEdit').modal('hide');
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