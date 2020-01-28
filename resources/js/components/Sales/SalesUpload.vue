<template>
    <div class="modal fade" id="salesUploadmodal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" v-on:click.prevent='close'>
                        <span>&times;</span>
                    </button>
                    <h3>Subir Ventas</h3>
                </div>
                <div class="modal-body row">
                    <div class="col-md-12 col-xs-12 col-lg-12">
                        <form>
                            <!-- <input type="hi]dden" name="_token" v-model="newToken" value="{{ csrf_token() }}"> -->
                            <div class="col-10 offset-1 col-md-10 offset-md-1">
                                <label for="page" >Página *</label>
                                <select name="idType" class="form-control" v-model="page_id" required>
                                        <option value="">--Seleccione una opción--</option>
                                        <option v-for="(pagina, index) in arrayPaginas" :value="pagina.id" v-text="pagina.name"></option>
                                </select>
                            </div>
                            <div class="col-10 offset-1 col-md-10 offset-md-1">
                                <label for="page" >Archivo</label>
                                <input type="file" name="filefield" id="upload-file" class="form-control"/>                        
                            </div>
                        </form>
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="submit" v-on:click.prevent="uploadFile"  class="btn btn-primary" value="Guardar">
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
                page_id: '',
                arrayPaginas: [],
            }
        },
        created: function(){
            this.getPages();;
        },
        methods: {
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
            uploadFile: function(){
                var _this = this;
                var url = 'uploadsale';
                var config = {
                    headers: { 'content-type': false }
                };

                var fileInfo = $('#upload-file')[0].files[0];

                var formulario_ajax = new FormData();
                formulario_ajax.append('page_id',_this.page_id);
                formulario_ajax.append('excel',fileInfo );

                axios.post(url,formulario_ajax, config).then(response => {
                    toastr.success('carga realizada con éxito');
                }).catch(error => {
                    _this.percentUpdate = 0;
                    $('#updateModelButton').prop('disabled', false);
                    this.errors = error.response.data;
                });
            },
            close: function(){
                $('#salesUploadmodal').modal('hide');
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