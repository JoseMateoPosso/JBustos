<template>
  <div class="modal fade" id="modalComment">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" v-on:click.prevent="close">
            <span>&times;</span>
          </button>
          <div class="col-md-12 col-md-offset-0 col-xs-8 col-xs-offset-2 text-center">
            <h3>Editar Solicitud</h3>
          </div>
        </div>
        <div class="modal-body row">
            <div>
                <label for="">this modal</label>
            </div>
        </div>
        <div class="modal-footer">
          <div class="col-md-8 offset-md-2 col-10 offset-1">

          </div>
        </div>
      </div>
    </div>
  </div>
</template>
<script>
import axios from "axios";
import toastr from "toastr";
import swal from "sweetalert";

export default {

};
</script>
<style>
#modelslogic {
  color: black;
}

#regVent {
  color: black;
}
</style>
