<template>
	<div id="nicksLogic" class="col-md-12 col-xs-12 col-lg-12">
		<div class="row">
	        <div class="col-md-12 col-xs-12 col-lg-12">
	            <h1 class="page-header">Modelos</h1>
	            <div class="float-right">
	                <a href="#" class="btn btn-info btn-md" title="Nueva" v-on:click.prevent="showAddForm">Nueva Modelo</a>
                    <a href="#" class="btn btn-info btn-md" title="Subir Ventas" v-on:click.prevent="showUploadForm">Subir Ventas</a>
                    <a href="#" class="btn btn-info btn-md" title="Liquidar" v-on:click.prevent="showLiquidate">Liquidar</a>
                    <a href="#" class="btn btn-info btn-md" title="Liquidar" v-on:click.prevent="showLiquidate">Solicitudes</a>
	            </div>
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
                                <a href="#" class="btn btn-info btn-md" title="Editar" v-on:click.prevent="showEditForm(info)">
                                    Editar
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
                <model-addForm @saved="hideAddForm"></model-addForm>                       
                <model-ediForm :info="info" @updated="hideEditForm"></model-ediForm>
                <sale-uploadForm></sale-uploadForm>  
                <liquidate></liquidate>                   
			</div>
		</div>
	</div>
</template>
<script>
    import axios from 'axios';
    import toastr from 'toastr';
    import swal from 'sweetalert';
    import editModel from './EditModel';
    import addModel from './AddModel';
    import addSale from '../Sales/SalesUpload';

    export default { 
        components: {
            'model-ediForm': editModel,
            'model-addForm': addModel,            
            'sale-uploadForm': addSale,            
        },     
        data (){
            return{
                info: {
                    'id'                :'',
                    'identification'    :'',
                    'name'              :'',
                    'lastname'          :'',
                    'address'           :'',
                    'email'             :'',
                    'cellphone'         :'',
                    'admission_date'    :'',
                    'sede_id'           :'',
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

            showRequest:()=>{
                $('#modalRequest').modal('show');
            },
            
            hideAddForm: function(){
                this.getModels();
                $('#modelCreate').modal('hide');
            },
            showAddForm: function(info){
                $('#modelCreate').modal('show');
            },
            showUploadForm: function(){
                $('#salesUploadmodal').modal('show');
            },
            showLiquidate: function(){
                $('#LiquidateModal').modal('show');
            },
            hideEditForm: function(){
                this.getModels();
                $('#modelEdit').modal('hide');
            },
            showEditForm: function(info){
                var _this = this;
                
                _this.info.id               = info.id?info.id:'';
                _this.info.identification   = info.identification?info.identification:'';
                _this.info.name             = info.name?info.name:'';
                _this.info.lastname         = info.lastname?info.lastname:'';
                _this.info.address          = info.address?info.address:'';
                _this.info.email            = info.email?info.email:'';
                _this.info.cellphone        = info.cellphone?info.cellphone:'';
                _this.info.admission_date   = info.admission_date?info.admission_date:'';
                _this.info.sede_id          = info.sede_id?info.sede_id:'';

                $('#modelEdit').modal('show');
            },
            inactiveModels: function(details){
                var _this = this;
                var url = 'desactModelo/' + details.id;
                
            },
            activeModels: function(details){
                var _this = this;
                var url = 'actModelo/' + details.id;
                
            },
            deleteModels: function(details){
                var _this = this;
                var url = 'infoModels/' + details.id;
                
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