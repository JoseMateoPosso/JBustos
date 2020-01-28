<template>
	<div id="nicksLogic" class="col-md-12 col-xs-12 col-lg-12">
		<div class="row">
	        <div class="col-md-12 col-xs-12 col-lg-12">
	            <h1 class="page-header">Páginas</h1>
	            <div class="float-right">
	                <a href="#" class="btn btn-info btn-md" title="Nueva" v-on:click.prevent="showAddForm">Nueva Página</a>
	            </div>
	        </div>
	        <div class="col-md-12 col-xs-12 col-lg-12">
				<table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Nombre Página</th>
                            <th>URL</th>
                            <th>URL Login</th>
                            <th>Cátegoria</th>
                            <th colspan="1">
                                &nbsp;
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="(info,index) in arrayPages">
                            <td v-text="info.name"></td>
                            <td v-text="info.url"></td>
                            <td v-text="info.url_login"></td>
                            <td v-text="info.categoria.description" v-if="info.categoria"></td>
                            <td v-else></td>
                            <td>
                                <a href="#" class="btn btn-info btn-md" title="Editar" v-on:click.prevent="showEditForm(info)">Editar
                                    <!-- <span class="glyphicon glyphicon-edit"></span> -->
                                </a>
                                <!-- <a v-if="info.status_id == 13" href="#" class="btn btn-warning btn-md" title="Inactivar Modelo" v-on:click.prevent="inactiveModels(info)">
                                    <span class="glyphicon glyphicon-minus"></span>
                                </a>
                                <a v-else href="#" class="btn btn-success btn-md" title="Activar" v-on:click.prevent="activeModels(info)">
                                    <span class="glyphicon glyphicon-check"></span>
                                </a>
                                <a href="#" class="btn btn-danger btn-md" title="Eliminar Modelo" v-on:click.prevent="deleteModels(info)">
                                    <span class="glyphicon glyphicon-trash"></span>
                                </a> -->
                            </td>
                            <!-- <td v-for="(infoDate,indexDate) in arrayFechas"><a href="#" class="btn btn-success btn-sm" title="venta" v-text="arrayVentas[index][infoDate].ventas" v-on:click.prevent="getInfoVenta(index, infoDate)" style="width: 60px"></a></td>
                            <td v-text="info.total"></td> -->
                        </tr>                                 
                    </tbody>
                </table>
                <page-addForm @saved="hideAddForm"></page-addForm>                       
                <page-ediForm :info="info" @updated="hideEditForm"></page-ediForm>                       
			</div>
		</div>
	</div>
</template>
<script>
    import axios from 'axios';
    import toastr from 'toastr';
    import swal from 'sweetalert';
    import editPage from './EditPage';
    import addPage from './AddPage';

    export default { 
        components: {
            'page-ediForm': editPage,
            'page-addForm': addPage,            
        },     
        data (){
            return{
                info: {
                    'id'              :'',
                    'name'            :'',
                    'url'             :'',
                    'url_login'       :'',
                    'column_value'    :'',
                    'column_nick'     :'',
                    'category_id'     :'',
                    'status_id'       :'',
                },
                arrayPages: [],
            }
        },
        created: function(){
            var _this = this;
           	_this.getPages();
        },
        methods: {
            getPages: function(){
            	var _this = this;
                var urlDetail = 'page';
                axios.get(urlDetail).then(response => {                
                    _this.arrayPages = response.data;                
                }).catch(function(error){
                    console.log(error);
                    toastr.error('No se pudo cargar la información');
                });    
            },
            hideAddForm: function(){
                this.getPages();
                $('#PageCreate').modal('hide');
            },
            showAddForm: function(info){
                $('#PageCreate').modal('show');
            },
            hideEditForm: function(){
                this.getPages();
                $('#PageEdit').modal('hide');
            },
            showEditForm: function(info){
                var _this = this;
                
                _this.info.id               = info.id?info.id:'';
                _this.info.name             = info.name?info.name:'';
                _this.info.url              = info.url?info.url:'';
                _this.info.url_login        = info.url_login?info.url_login:'';
                _this.info.column_value     = info.column_value?info.column_value:'';
                _this.info.column_nick      = info.column_nick?info.column_nick:'';
                _this.info.category_id      = info.category_id?info.category_id:'';
                _this.info.status_id        = info.status_id?info.status_id:2;
                
                $('#PageEdit').modal('show');
            },
            inactiveModels: function(details){
                var _this = this;
                
            },
            activeModels: function(details){
                var _this = this;
                
            },
            deleteModels: function(details){
                var _this = this;
                
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