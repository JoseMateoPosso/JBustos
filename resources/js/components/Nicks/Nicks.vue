<template>
	<div id="nicksLogic" class="col-md-12 col-xs-12 col-lg-12">
        <div class="row">
            <div class="col-md-12 col-xs-12 col-lg-12">
                <h1 class="page-header">Nicks</h1>
            </div>
            <div class="col-md-12 col-xs-12 col-lg-12">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Identificación</th>
                            <th>Nombre</th>
                            <th>Celular</th>
                            <th>Fecha Ingreso</th>
                            <th colspan="3">
                                &nbsp;
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="(info,index) in arrayModelos">
                            <td width="15%" v-text="info.identification"></td>
                            <td width="25%" v-text="info.name + ' ' + info.lastname"></td>
                            <td width="20%" v-text="info.cellphone"></td>
                            <td width="20%" v-text="info.admission_date"></td>
                            <td>
                                <a href="#" class="btn btn-info btn-md" title="Editar" v-on:click.prevent="viewDetail(info)">
                                    Ver Nicks
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
                <nick-list :modelId="modelIdSelected"></nick-list>
			</div>
		</div>
	</div>
</template>
<script>
    import axios from 'axios';
    import toastr from 'toastr';
    import swal from 'sweetalert';
    import NickList from './NicksDetail';

    export default {
        components: {
            'nick-list': NickList,            
        },        
        data (){
            return{
                info: {
                	'nickname'		: '',
                	'clave'			: '',
                	'url'	        : '',
                	'pagina_id'		: '',
                	'model_id'		: '',                	
                },
                arrayModelos: [],
                modelIdSelected: '',
            }
        },
        created: function(){
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
            viewDetail: function(info){
                var _this = this;
                _this.modelIdSelected = info.id;
                $('#nickList').modal('show');
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