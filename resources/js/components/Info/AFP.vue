<template>
	<div id="nicksLogic" class="col-md-12 col-xs-12 col-lg-12">
		<div class="row">
	        <div class="col-md-12 col-xs-12 col-lg-12">
	            <h1 class="page-header">Fondo de pensiones</h1>
	            <div class="float-right">
	                <a href="#" class="btn btn-info btn-md" title="Nueva" v-on:click.prevent="showAddForm">Nueva Fondo</a>
	            </div>
	        </div>
	        <div class="col-md-12 col-xs-12 col-lg-12">
				<table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Descripción</th>
                            <th colspan="2">
                                &nbsp;
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="(info,index) in arrayInfo">
                            <td v-text="info.description"></td>
                            <td>
                                <a href="#" class="btn btn-info btn-md" title="Editar" v-on:click.prevent="showEditForm(info)">Editar
                                    <!-- <span class="glyphicon glyphicon-edit"></span> -->
                                </a>
                            </td>
                            <!-- <td v-for="(infoDate,indexDate) in arrayFechas"><a href="#" class="btn btn-success btn-sm" title="venta" v-text="arrayVentas[index][infoDate].ventas" v-on:click.prevent="getInfoVenta(index, infoDate)" style="width: 60px"></a></td>
                            <td v-text="info.total"></td> -->
                        </tr>
                    </tbody>
                </table>
                <info-addForm @saved="hideAddForm"></info-addForm>
                <info-ediForm :info="info" @updated="hideEditForm"></info-ediForm>
			</div>
		</div>
	</div>
</template>
<script>
    import axios from 'axios';
    import toastr from 'toastr';
    import swal from 'sweetalert';
    import editInfo from './EditAfp';
    import addInfo from './AddAfp';

    export default {
        components: {
            'info-ediForm': editInfo,
            'info-addForm': addInfo,
        },
        data (){
            return{
                info: {
                    'id'              :'',
                    'description'     :'',
                },
                arrayInfo: [],
            }
        },
        created: function(){
            var _this = this;
           	_this.getInfo();
        },
        methods: {
            getInfo: function(){
            	var _this = this;
                var urlDetail = 'basicinformationbyc';
                axios.post(urlDetail,{'category_id':25}).then(response => {
                    _this.arrayInfo = response.data;
                }).catch(function(error){
                    console.log(error);
                    toastr.error('No se pudo cargar la información');
                });
            },
            hideAddForm: function(){
                this.getInfo();
                $('#AfpCreate').modal('hide');
            },
            showAddForm: function(info){
                $('#AfpCreate').modal('show');
            },
            hideEditForm: function(){
                this.getInfo();
                $('#AfpEdit').modal('hide');
            },
            showEditForm: function(info){
                var _this = this;

                _this.info.id               = info.id?info.id:'';
                _this.info.description      = info.description?info.description:'';
                _this.info.category_id      = info.category_id?info.category_id:'';

                $('#AfpEdit').modal('show');
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
