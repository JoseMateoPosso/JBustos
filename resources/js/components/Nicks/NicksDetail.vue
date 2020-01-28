<template>
	<div class="modal fade" id="nickList">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <button type="button" class="close" data-dismiss="modal">
                    <span>&times;</span>
                </button>
                <div class="modal-header">

                    <h3 class="page-header">Nicks</h3>
                    <div class="btn-group float-right">
                        <a href="#" class="btn btn-success btn-md" title="Crear" v-on:click.prevent="showCreateForm">
                           Nuevo Nick
                        </a>
                    </div>
                </div>
                <div class="modal-body row">
                    <div class="col-md-12 col-xs-12 col-lg-12">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>P&aacute;gina</th>
                                    <th>NickName</th>
                                    <th>Clave</th>
                                    <th colspan="3">
                                        &nbsp;
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="(details,index) in arrayNicks">
                                    <td v-text="details.pagina.name"></td>
                                    <td v-text="details.nickname"></td>
                                    <td v-text="details.password"></td>
                                    <td>
                                        <a v-if="showLogin(details)" href="#" class="btn btn-default btn-md" title="Ingreso" v-on:click.prevent="goLogin(details)">
                                            Ingreso
                                        </a>
                                    </td>
                                    <td>
                                        <a href="#" class="btn btn-warning btn-md" title="Editar" v-on:click.prevent="showEditForm(details)">
                                            Editar
                                        </a>
                                       <!--  <a href="#" class="btn btn-danger btn-md" title="Inactivar" v-on:click.prevent="inactiveNick(details)">
                                            <span class="glyphicon glyphicon-remove"></span>
                                        </a> -->
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="submit" class="btn btn-primary" value="Ok" @click.prevent="closeNickList">
                </div>
            </div>
        </div>
        <nick-ediForm :info='info' v-on:updated="hideEditForm"></nick-ediForm>
        <nick-creForm :cmbModelId='modelId' v-on:saved="hideCreateForm"></nick-creForm>
    </div>
</template>
<script>
    import axios from 'axios';
    import toastr from 'toastr';
    import editNick from './EditNick';
    import addNick from './AddNick';

    export default {
        props: ['modelId'],
        watch: {
            modelId: function(newVal, oldVal) { // watch it
                this.getNicks();
            }
        },
        components: {
            'nick-ediForm': editNick,
            'nick-creForm': addNick
        },
        data (){
            return{
                arrayNicks: [],
                info: {
                    'id'            : '',
                    'nickname'      : '',
                    'password'      : '',
                    'url'           : '',
                    'page_id'       : '',
                    'model_id'      : '',
                },
            }
        },
        methods: {
            getNicks: function(){
            	var _this = this;
                if(_this.modelId != ''){
                    var urlDetail = 'nick/' + _this.modelId;
                    axios.get(urlDetail).then(response => {
                        _this.arrayNicks = response.data;
                    }).catch(function(error){
                        console.log(error);
                        toastr.error('No se pudo cargar la información');
                    });
                }else{
                    _this.arrayNicks = [];
                }
            },
            showEditForm: function(info){
                var _this = this;
                _this.info.id       = info.id;
                _this.info.nickname = info.nickname;
                _this.info.password = info.password;
                _this.info.url      = info.url;
                _this.info.page_id  = info.pagina.id;
                _this.info.model_id = info.ownable_id;

                $('#nickEdit').modal('show');
            },
            hideEditForm: function(){
                $('#nickEdit').modal('hide');
                this.getNicks();
            },
            inactiveNick: function(info){
                var _this = this;

            },
            showCreateForm: function(){
                $('#nickCreate').modal('show');
            },
            hideCreateForm: function(){
                $('#nickCreate').modal('hide');
                this.getNicks();
            },
            closeNickList: function(){
                $('#nickList').modal('hide');
            },
            showLogin: function(info){
                var visible = false;

                if(info.url != '' && info.url != null){
                    visible = true;
                }else if(info.pagina.url != '' && info.pagina.url != null){
                    visible = true;
                }

                return visible;
            },
            goLogin: function(details){
                var url = '';

                if(details.url != '' && details.url != null){
                    url = details.url;
                }else if(details.pagina.url != '' && details.pagina.url != null){
                    url = details.pagina.url;
                }

                window.open(url,'_blank');
            },
        }
    };
</script>
<style>

</style>
