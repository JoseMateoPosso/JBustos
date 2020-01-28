<template>
    <div class="modal fade" id="PageEdit">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" v-on:click.prevent='close'>
                        <span>&times;</span>
                    </button>
                    <div class="col-md-12 col-md-offset-0 col-xs-8 col-xs-offset-2 text-center">
                        <h3>Editar Página</h3>
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
                                <label for="url">URL</label>
                                <input type="text" name="url" class="form-control" v-model="info.url" required>
                            </div>
                            <div class="col-10 offset-1 col-md-10 offset-md-1">
                                <label for="url_login">URL de ingreso</label>
                                <input type="text" name="url_login" class="form-control" v-model="info.url_login">
                            </div>
                            <div class="col-10 offset-1 col-md-10 offset-md-1">
                                <label for="column_nick">Columna Nick</label>
                                <input type="text" name="column_nick" class="form-control" v-model="info.column_nick">
                            </div>
                            <div class="col-10 offset-1 col-md-10 offset-md-1">
                                <label for="column_value">Columna Valor</label>
                                <input type="text" name="column_value" class="form-control" v-model="info.column_value">
                            </div>
                            <div class="col-10 offset-1 col-md-10 offset-md-1">
                                <label for="category_id">Categoría</label>
                                <select name="category_id" class="form-control" v-model="info.category_id" required>
                                    <option value="">--Seleccione una opción--</option>
                                    <option v-for="(category, index) in arrayCategories" :value="category.id" v-text="category.description"></option>
                                </select>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="modal-footer">
                    <div class="col-md-8 offset-md-2 col-10 offset-1">
                        <input type="submit" v-on:click.prevent="editPage"  class="btn btn-primary" value="Guardar">
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
            _this.getCategories();
        },
        methods: {
            getCategories: function(){
                var _this = this;
                var urlDetail = 'categorybytype';

                axios.post(urlDetail, {'category':'p'}).then(response => {          
                    _this.arrayCategories = response.data;
                }).catch(function(error){
                    console.log(error);
                    toastr.error('No se pudo cargar la información');
                });
            },
            editPage: function(){
            	var _this = this;
                var urlDetail = 'page/' + _this.info.id;

                if(_this.info.category_id == ''){
                    toastr.error('La categoria es obligatoria');
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
                $('#PageEdit').modal('hide');
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
