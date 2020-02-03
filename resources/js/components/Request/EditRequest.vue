<template>
  <div class="modal fade" id="modalEdit">
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
          <div class="col-md-12">
            <form>
              <div class="col-10 offset-1 col-md-10 offset-md-1">
                <label for="nickname_orig">Nombre original</label>
                <input
                  type="text"
                  name="nickname_orig"
                  class="form-control"
                  v-model="info.nickname_orig"
                  disabled
                />
              </div>
              <div class="col-10 offset-1 col-md-10 offset-md-1">
                <label for="nickname_suggest">Nuevo nombre</label>
                <input
                  type="text"
                  name="nickname_suggest"
                  class="form-control"
                  v-model="info.nickname_suggest"
                  required
                />
              </div>
              <div class="col-10 offset-1 col-md-10 offset-md-1">
                <label for="observation">observation</label>
                <input
                  type="text"
                  name="observation"
                  class="form-control"
                  v-model="info.observation"
                  disabled
                />
              </div>
              <div class="col-10 offset-1 col-md-10 offset-md-1">
                <label for="page_id">Pagina</label>
                <select name="sede_id_orig" class="form-control">
                  <option
                    v-for="(page, index) in arrayPages"
                    :selected="page.id === info.page_id"
                    v-text="page.name"
                  ></option>
                </select>
              </div>

              <div v-if="info.sede_id_orig" class="col-10 offset-1 col-md-10 offset-md-1">
                <label for="sede_id_orig">Sede original</label>
                <select name="sede_id_orig" v-model="info.sede_id_orig" class="form-control">
                  <option
                    v-for="(sede, index) in arraySedes"
                    :value="sede.id"
                  >{{ sede.name }}</option>
                </select>
              </div>
              <div v-if="info.sede_id_dest" class="col-10 offset-1 col-md-10 offset-md-1">
                <label for="sede_id_dest">Sede destino {{info.sede_id_dest}}</label>
                <select name="sede_id_dest" v-model="info.sede_id_dest" class="form-control">
                  <option
                    v-for="(sede, index) in arraySedes"
                    :value="sede.id">
                   {{sede.name}} 
                    </option>
                </select>
              </div>
              <div class="col-10 offset-1 col-md-10 offset-md-1">
                <label for="info.status_id">Estado {{info.status_id}}</label>
                <select name="status_id" v-model="info.status_id" class="form-control">
                  <option
                    v-for="option in options"
                    :value="option.value"
                  >{{ option.text }}</option>
                </select>
              </div>
            </form>
          </div>
        </div>
        <div class="modal-footer">
          <div class="col-md-8 offset-md-2 col-10 offset-1">
            <input
              type="submit"
              v-on:click.prevent="editRequest"
              class="btn btn-primary"
              value="Guardar"
            />
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
  props: ["info"],
  data() {
    return {
      arraySedes: [],
      arrayPages: Array,
      isParent: false,
      options: [
        { text: "Registrada", value: 6 },
        { text: "En proceso", value: 7 },
        { text: "Actualizada", value: 8 },
        { text: "Solicitud de cambios", value: 9 },
        { text: "Finalizada", value: 10 },
        { text: "Rechazada", value: 11 }
      ]
    };
  },
  created: function() {
    this.getSedes();
    this.getPages();
  },
  methods: {
    getSedes: function() {
      var _this = this;
      var urlDetail = "sede";
      axios
        .get(urlDetail)
        .then(response => {
          _this.arraySedes = response.data;
        })
        .catch(function(error) {
          console.log(error);
          toastr.error("No se pudo cargar la información");
        });
    },
    getPages: function() {
      var _this = this;
      var urlDetail = "page";
      axios
        .get(urlDetail)
        .then(response => {
          _this.arrayPages = response.data;
        })
        .catch(function(error) {
          console.log(error);
          toastr.error("No se pudo cargar la información");
        });
    },
    editRequest: function() {
      var _this = this;
      var urlDetail = "requestList/" + _this.info.id;

      console.log(urlDetail, "urlDetail",_this.info);

      /* if (_this.info.sede_id == "") {
        toastr.error("La sede es obligatoria");
        return;
      }
      */

      axios
        .put(urlDetail, _this.info)
        .then(response => {
          toastr.success("Solicitud actualizado satisfactoriamente");
          _this.$emit("updated");
        })
        .catch(function(error) {
          console.log(error);
          toastr.error("No se pudo cargar la información");
        });
    },
    close: function() {
      $("#modalEdit").modal("hide");
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
