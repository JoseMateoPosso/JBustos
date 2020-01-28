<template>
    <div class="modal fade" id="RuleEdit">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" v-on:click.prevent='close'>
                        <span>&times;</span>
                    </button>
                    <div class="col-md-12 col-md-offset-0 col-xs-8 col-xs-offset-2 text-center">
                        <h3>Editar Regla</h3>
                    </div>
                </div>
                <div class="modal-body row">
                    <div class="col-md-12">
                        <form>
                            <div class="col-10 offset-1 col-md-10 offset-md-1">
                                <label for="init_date">Fecha Inicio</label>
                                <input type="date" name="init_date" class="form-control" v-model="info.init_date" required>
                            </div>
                            <div class="col-10 offset-1 col-md-10 offset-md-1">
                                <label for="page" >Modelo</label>
                                <select name="idType" class="form-control" v-model="info.model_id">
                                        <option value="">--Seleccione una opción--</option>
                                        <option v-for="(modelo, index) in arrayModels" :value="modelo.id" v-text="modelo.name"></option>
                                </select>
                            </div>
                            <div class="col-10 offset-1 col-md-10 offset-md-1">
                                <label for="page" >Página</label>
                                <select name="idType" class="form-control" v-model="info.page_id" required>
                                        <option value="">--Seleccione una opción--</option>
                                        <option v-for="(pagina, index) in arrayPages" :value="pagina.id" v-text="pagina.name"></option>
                                </select>
                            </div>
                            <div class="col-10 offset-1 col-md-10 offset-md-1">
                                <label for="sede_id">Sede</label>
                                <select name="sede_id" class="form-control" v-model="info.sede_id">
                                    <option value="">--Seleccione una opción--</option>
                                    <option v-for="(sede, index) in arraySedes" :value="sede.id" v-text="sede.name"></option>
                                </select>
                            </div>
                            <div class="col-10 offset-1 col-md-10 offset-md-1">
                                <label for="minimun">Venta Minima</label>
                                <input type="number" name="minimun" class="form-control" v-model="info.minimun" required>
                            </div>
                            <div class="col-10 offset-1 col-md-10 offset-md-1">
                                <label for="maximum">Venta Maxima</label>
                                <input type="number" name="maximum" class="form-control" v-model="info.maximum">
                            </div>
                            <div class="col-10 offset-1 col-md-10 offset-md-1">
                                <label for="trm">TRM</label>
                                <input type="number" name="trm" class="form-control" v-model="info.trm" required>
                            </div>
                            <div class="col-10 offset-1 col-md-10 offset-md-1">
                                <label for="percentage">Porcentaje</label>
                                <input type="number" name="percentage" class="form-control" v-model="info.percentage">
                            </div>                            
                        </form>
                    </div>
                </div>
                <div class="modal-footer">
                    <div class="col-md-8 offset-md-2 col-10 offset-1">
                        <input type="submit" v-on:click.prevent="editRule"  class="btn btn-primary" value="Guardar">
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
                arrayPages: [],
                arrayModels: [],
                arraySedes: []
            }
        }, created: function(){
            var _this = this;
            _this.getPages();
            _this.getSedes();
            _this.getModels();
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
            getModels: function(){
                var _this = this;
                var urlDetail = 'model';

                axios.get(urlDetail).then(response => {                
                    _this.arrayModels = response.data;                
                }).catch(function(error){
                    console.log(error);
                    toastr.error('No se pudo cargar la información');
                });
            },
            editRule: function(){
            	var _this = this;
                var urlDetail = 'facturationrule/' + _this.info.id;

                if(_this.info.init_date == ''){
                    toastr.error('La fecha de inicio es obligatoria');
                    return;
                }
                
                axios.put(urlDetail,_this.info).then(response => {                
                    toastr.success('Regla actualizada satisfactoriamente');
                    _this.$emit('updated');
                }).catch(function(error){
                    console.log(error);
                    toastr.error('No se pudo cargar la información');
                });
            },
            close: function(){
                $('#RuleEdit').modal('hide');
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