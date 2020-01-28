<template>
    <div class="modal fade" id="BancoEdit">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" v-on:click.prevent='close'>
                        <span>&times;</span>
                    </button>
                    <div class="col-md-12 col-md-offset-0 col-xs-8 col-xs-offset-2 text-center">
                        <h3>Editar Banco</h3>
                    </div>
                </div>
                <div class="modal-body row">
                    <div class="col-md-12">
                        <form>
                            <div class="col-10 offset-1 col-md-10 offset-md-1">
                                <label for="name">Descripción</label>
                                <input type="text" name="description" class="form-control" v-model="info.description" required>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="modal-footer">
                    <div class="col-md-8 offset-md-2 col-10 offset-1">
                        <input type="submit" v-on:click.prevent="editEps"  class="btn btn-primary" value="Guardar">
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
                arrayCategories: [],
            }
        }, created: function(){
            var _this = this;
        },
        methods: {
            editEps: function(){
            	var _this = this;
                var urlDetail = 'basicinfo/' + _this.info.id;

                axios.put(urlDetail,_this.info).then(response => {
                    toastr.success('Banco actualizado satisfactoriamente');
                    _this.$emit('updated');
                }).catch(function(error){
                    console.log(error);
                    toastr.error('No se pudo cargar la información');
                });
            },
            close: function(){
                $('#BancoEdit').modal('hide');
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
