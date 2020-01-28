<template>
	<div id="nicksLogic" class="col-md-12 col-xs-12 col-lg-12">
		<div class="row">
	        <div class="col-md-12 col-xs-12 col-lg-12">
	            <h1 class="page-header">Sedes</h1>
	            <div class="float-right">
	                <a href="#" class="btn btn-info btn-md" title="Nueva" v-on:click.prevent="showAddForm">Nueva Sede</a>
	            </div>
	        </div>
	        <div class="col-md-12 col-xs-12 col-lg-12">
				<table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Nombre Sede</th>
                            <th>Porcentaje</th>
                            <th>Representante</th>
                            <th>Telefono</th>
                            <th>Email</th>
                            <th>Dirección</th>
                            <th colspan="1">
                                &nbsp;
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="(info,index) in arraySedes">
                            <td v-text="info.name"></td>
                            <td v-text="info.type+'%'" v-if="info.type"></td>
                            <td v-text="'No configurado'" v-else></td>
                            <td v-text="info.name"></td>
                            <td v-text="info.representative"></td>
                            <td v-text="info.phone"></td>
                            <td v-text="info.email"></td>
                            <td v-text="info.address"></td>
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
                <sede-addForm @saved="hideAddForm"></sede-addForm>                       
                <sede-ediForm :info="info" @updated="hideEditForm"></sede-ediForm>                       
			</div>
		</div>
	</div>
</template>
<script>
    import axios from 'axios';
    import toastr from 'toastr';
    import swal from 'sweetalert';
    import editSede from './EditSede';
    import addSede from './AddSede';

    export default { 
        components: {
            'sede-ediForm': editSede,
            'sede-addForm': addSede,            
        },     
        data (){
            return{
                info: {
                    'id'              :'',
                    'name'            :'',
                    'representative'  :'',
                    'phone'           :'',
                    'email'           :'',
                    'type'            :'',
                    'address'         :'',
                    'status_id'       :'',
                },
                arraySedes: [],
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
            hideAddForm: function(){
                this.getSedes();
                $('#SedeCreate').modal('hide');
            },
            showAddForm: function(info){
                $('#SedeCreate').modal('show');
            },
            hideEditForm: function(){
                this.getSedes();
                $('#SedeEdit').modal('hide');
            },
            showEditForm: function(info){
                var _this = this;
                
                _this.info.id               = info.id?info.id:'';
                _this.info.name             = info.name?info.name:'';
                _this.info.representative   = info.representative?info.representative:'';
                _this.info.phone            = info.phone?info.phone:'';
                _this.info.email            = info.email?info.email:'';
                _this.info.address          = info.address?info.address:'';
                _this.info.status_id        = info.status_id?info.status_id:2;
                _this.info.type             = info.type?info.type:'';
                
                $('#SedeEdit').modal('show');
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