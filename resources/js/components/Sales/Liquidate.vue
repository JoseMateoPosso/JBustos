<template>
	<div class="modal fade" id="LiquidateModal">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <button type="button" class="close" v-on:click.prevent='close'>
                    <span>&times;</span>
                </button>
                <div class="modal-header">
                    <h3 class="page-header">Ventas</h3>
                    <div class="btn-group float-right">
                        <a href="#" class="btn btn-success btn-md" title="Crear" v-on:click.prevent="Liquidar">
                           Liquidar
                        </a>   
                    </div>
                </div>
                <div class="modal-body row">
                	<!-- <div class="col-md-12 col-xs-12 col-lg-12">
	                    <form>
	                    	<div class="col-6 col-md-6">
								<label for="finicial" >Fecha Inicial</label>
								<input type="date" name="finicial" v-model="info.finicial">
							</div>
							<div class="col-6 col-md-6">
								<label for="ffinal" >Fecha Final</label>
								<input type="date" name="ffinal" v-model="info.ffinal">
							</div>
							<div class="col-6 col-md-6">
								<label for="trm" >TRM</label>
								<input type="text" name="trm" v-model="info.trm">
							</div>
							<div class="col-6 col-md-6">
	                            <label for="sede_id">Sede</label>
	                            <select name="sede_id" class="form-control" v-model="info.sede_id">
	                                <option value="">--Seleccione una opción--</option>
	                                <option v-for="(sede, index) in arraySedes" :value="sede.id" v-text="sede.name"></option>
	                            </select>
	                        </div>       					
						</form>
                	</div> -->
                    <div class="col-md-12 col-xs-12 col-lg-12">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Nick</th>
                                    <th>Dolares</th>
                                    <th>Porcentaje</th>
                                    <th>TRM</th>
                                    
                                </tr>
                            </thead>
                            <tbody>
                             	<tr v-for="(details,index) in arraySales">
                                    <td v-text="details.nickinfo.nickname"></td>
                                    <td v-text="details.dollars"></td>
                                    <td v-text="details.percentage_paid"></td>
                                    <td v-text="details.trm"></td>
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
    </div>
</template>
<script>
    import axios from 'axios';
    import toastr from 'toastr';    
    
    export default {
        data (){
            return{
                arraySales: [],
                arraySedes: [],
                info: {
                    'finicial'      : '',
                    'ffinal'      	: '',
                    'sede_id'      	: '',
                    'trm'      		: '',
                },                
            }
        },
        created: function(){
            this.getSedes();
            this.getSales();
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
            getSales: function(){
            	var _this = this;
                var urlDetail = 'sales';
                axios.get(urlDetail).then(response => {                
                    _this.arraySales = response.data;                
                }).catch(function(error){
                    console.log(error);
                    toastr.error('No se pudo cargar la información');
                });
            },
            Liquidar: function(){
            	var _this = this;
                var urlDetail = 'liquidar';
                axios.post(urlDetail, _this.info).then(response => {                
                    toastr.success('Liquidación realizada satisfactoriamente');
                }).catch(function(error){
                    console.log(error);
                    toastr.error('No se pudo cargar la información');
                });
            },
            close: function(){
                $('#LiquidateModal').modal('hide');
            },
        }
    };
</script>
<style>
    
</style>