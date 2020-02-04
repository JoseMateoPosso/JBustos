<template>
  <div class="modal fade" id="modalComment">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" v-on:click="close">
            <span>&times;</span>
          </button>
          <div class="col-md-12 col-md-offset-0 col-xs-8 col-xs-offset-2 text-center">
            <h3>Editar Solicitud</h3>
          </div>
        </div>
        <div class="modal-body row">
          <div>
            <label for>this modal {{arrayRequestComment}}</label>
          </div>
        </div>
        <div class="modal-footer">
          <div class="col-md-8 offset-md-2 col-10 offset-1"></div>
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
  props: ["info"],
  data() {
    return {
      arrayRequestComment: []
    };
  },
  created: function() {
    var _this = this;
     _this.getComments();
  },
  methods: {
    getComments: function() {
      var _this = this;
      var urlDetail = "commentListbyc";
      axios
        .post(urlDetail, { request_id: 1 })
        .then(response => {
          _this.arrayRequestComment = response.data;
        })
        .catch(function(error) {
          console.log(error);
          toastr.error("No se pudo cargar la información");
        });
    },
    close: function() {
      $("#modalComment").modal("hide");
    }
  }
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
