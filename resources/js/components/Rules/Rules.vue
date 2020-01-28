<template>
	<div id="nicksLogic" class="col-md-12 col-xs-12 col-lg-12">
		<div class="row">
	        <div class="col-md-12 col-xs-12 col-lg-12">
	            <h1 class="page-header">Reglas</h1>
	            <div class="float-right">
	                <a href="#" class="btn btn-info btn-md" title="Nueva" v-on:click.prevent="showAddForm">Nueva Regla</a>
	            </div>
	        </div>
	        <div class="col-md-12 col-xs-12 col-lg-12">
				<table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Fecha Inicio</th>
                            <th>Sede</th>
                            <th>Página</th>
                            <th>Modelo</th>
                            <th>Minimo</th>
                            <th>Maximo</th>
                            <th>Porcentaje</th>
                            <th>Trm</th>
                            <th colspan="1">
                                &nbsp;
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="(info,index) in arrayRules">
                            <td v-text="info.init_date"></td>
                            <td v-if="info.sede" v-text="info.sede.name"></td>
                            <td v-else></td>
                            <td v-if="info.pagina" v-text="info.pagina.name"></td>
                            <td v-else></td>
                            <td v-if="info.infomodelo" v-text="info.infomodelo.identification"></td>
                            <td v-else></td>
                            <td v-text="info.minimun"></td>
                            <td v-text="info.maximum"></td>
                            <td v-text="info.trm"></td>
                            <td v-text="info.percentage"></td>
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
                <rule-addForm @saved="hideAddForm"></rule-addForm>                       
                <rule-ediForm :info="info" @updated="hideEditForm"></rule-ediForm>                       
			</div>
		</div>
	</div>
</template>
<script>
    import axios from 'axios';
    import toastr from 'toastr';
    import swal from 'sweetalert';
    import editRule from './EditRule';
    import addRule from './AddRule';

    export default { 
        components: {
            'rule-ediForm': editRule,
            'rule-addForm': addRule,            
        },     
        data (){
            return{
                info: {
                    'id'            :'',
                    'init_date'     :'',
                    'minimun'       :'',
                    'maximum'       :'',
                    'percentage'    :'',
                    'trm'           :'',
                    'page_id'       :'',
                    'model_id'      :'',
                    'sede_id'       :'',
                },
                arrayRules: [],
            }
        },
        created: function(){
            var _this = this;
           	_this.getRules();
        },
        methods: {
            getRules: function(){
            	var _this = this;
                var urlDetail = 'facturationrule';
                axios.get(urlDetail).then(response => {                
                    _this.arrayRules = response.data;                
                }).catch(function(error){
                    console.log(error);
                    toastr.error('No se pudo cargar la información');
                });    
            },
            hideAddForm: function(){
                this.getRules();
                $('#RuleCreate').modal('hide');
            },
            showAddForm: function(info){
                $('#RuleCreate').modal('show');
            },
            hideEditForm: function(){
                this.getRules();
                $('#RuleEdit').modal('hide');
            },
            showEditForm: function(info){
                var _this = this;
                
                _this.info.id           = info.id?info.id:'';
                _this.info.init_date    = info.init_date?info.init_date:'';
                _this.info.minimun      = info.minimun?info.minimun:'';
                _this.info.maximum      = info.maximum?info.maximum:'';
                _this.info.percentage   = info.percentage?info.percentage:'';
                _this.info.trm          = info.trm?info.trm:'';
                _this.info.page_id      = info.page_id?info.page_id:'';
                _this.info.model_id     = info.model_id?info.model_id:'';
                _this.info.sede_id      = info.sede_id?info.sede_id:'';
                
                $('#RuleEdit').modal('show');
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