<template>
  <div class="modal fade" id="modalRequest">
    <div class="modal-dialog modal-xl">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" v-on:click.prevent="close">
            <span>&times;</span>
          </button>
          <div class="col-md-12 col-md-offset-0 col-xs-8 col-xs-offset-2 text-center">
            <h3>Solicitudes</h3>
          </div>
        </div>
        <div class="modal-body row">
          <div class="col-md-12">
            <table class="table table-striped">
              <thead>
                <tr align="center">
                  <th>#</th>
                  <th>Observación</th>
                  <th>Nick</th>
                  <th>Sede</th>
                  <th>Estado</th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
                <tr v-for="(solicit, index) in arrayRequest" align="center">
                  <td v-text="solicit.status_id"></td>
                  <td v-text="solicit.observation"></td>
                  <td v-text="solicit.nickname"></td>
                  <td v-text="solicit.sede"></td>
                  <td>
                    <select>
                      <option
                        v-for="option in options"
                        :selected="option.value === solicit.status_id"
                      >{{ option.text }}</option>
                    </select>
                    <span></span>
                  </td>
                  <td>
                    <a
                      href="#"
                      class="btn btn-info btn-md"
                      title="Editar"
                      v-on:click.prevent="showEditForm(info)"
                    >Editar</a>
                  </td>
                </tr>
              </tbody>
            </table>
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
  props: ["arrayRequest"],
  data() {
    return {
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
  methods: {
    close: () => {
      $("#modalRequest").modal("hide");
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
