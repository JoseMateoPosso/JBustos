<template>
    <div class="modal fade" id="modalRequest">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" v-on:click.prevent='close'>
                        <span>&times;</span>
                    </button>
                    <div class="col-md-12 col-md-offset-0 col-xs-8 col-xs-offset-2 text-center">
                        <h3>Solicitudes</h3>
                    </div>
                </div>
                <div class="modal-body row">
                    <div class="col-md-12">
                        <form>
                            
                        </form>
                    </div>
                </div>
                <div class="modal-footer">
                    <div class="col-md-8 offset-md-2 col-10 offset-1">
                        <input type="submit" v-on:click.prevent="editModel"  class="btn btn-primary" value="Guardar">
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
        methods:{
            close:() => {
                $('#modalRequest').modal('hide');
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
