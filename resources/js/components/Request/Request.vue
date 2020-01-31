<template>
  <div>
    <h1 class="page-header" id="tittle">Request</h1>
    <div class="col-md-12">
      <table class="table table-striped">
        <thead>
          <tr align="center">
            <th>#</th>
            <th>Nombre original</th>
            <th>Nuevo nombre</th>
            <th>Observación</th>
            <th>Pagina</th>
            <th>Nick</th>
            <th>Sede</th>
            <th>Estado</th>
            <th></th>
          </tr>
        </thead>
        <tbody>
          <tr
            v-for="(solicit, index) in arrayRequest"
            v-bind:class="solicit.type"
            align="center"
          >
            <td v-text="solicit.id"></td>
            <td v-text="solicit.nickname_orig">
            <td v-text="solicit.nickname_suggest"></td>
            <td v-text="solicit.observation"></td>
            <td v-text="solicit.page_name"></td>
            <td v-text="solicit.nickname"></td>
            <td v-text="solicit.sede"></td>
            <td v-text="solicit.description"></td>
            <td>
              <a
                href="#"
                class="btn btn-info btn-md"
                title="Editar"
                v-on:click.prevent="showEditForm(solicit)"
              >Editar</a>
            </td>
          </tr>
        </tbody>
      </table>
      <model-ediForm :info="info" @updated="hideEditForm"></model-ediForm>
    </div>
  </div>
</template>

<script>
import axios from "axios";
import toastr from "toastr";
import swal from "sweetalert";
import EditRequest from "./EditRequest";

export default {
  components: {
    "model-ediForm": EditRequest
  },
  data() {
    return {
      arrayRequest: [],
      options: [
        { text: "Registrada", value: 6 },
        { text: "En proceso", value: 7 },
        { text: "Actualizada", value: 8 },
        { text: "Solicitud de cambios", value: 9 },
        { text: "Finalizada", value: 10 },
        { text: "Rechazada", value: 11 }
      ],
      info: {
        id: "",
        nickname_orig: "",
        nickname_suggest: "",
        observation: "",
        page_id: "",
        sede_id_orig: "",
        sede_id_dest: "",
        nick_id: "",
        status_id: ""
      }
    };
  },
  created: function() {
    this.getRequestList();
  },
  methods: {
    getRequestList: function() {
      var _this = this;
      var urlDetail = "requestList";
      axios
        .get(urlDetail)
        .then(response => {
          _this.arrayRequest = response.data;
        })
        .catch(function(error) {
          toastr.error("Error al cargar los datos.");
        });
    },
    showEditForm(info) {
      console.log(info, "----info----");

      var _this = this;

      _this.info.id = info.id ? info.id : "";
      _this.info.nickname_orig = info.nickname_orig ? info.nickname_orig: "";
      _this.info.nickname_suggest = info.nickname_suggest ? info.nickname_suggest : "";
      _this.info.observation = info.observation ? info.observation : "";
      _this.info.page_id = info.page_id ? info.page_id : "";
      _this.info.sede_id_orig = info.sede_id_orig ? info.sede_id_orig : "";
      _this.info.sede_id_dest = info.sede_id_dest ? info.sede_id_dest : "";
      _this.info.nick_id = info.nick_id? info.nick_id: "";
      _this.info.status_id = info.status_id ? info.status_id : "";

      $("#modelEdit").modal("show");
    },
    hideEditForm: () => {
      $("#modelEdit").modal("hide");
    },
    close: function() {
      $("#modelEdit").modal("hide");
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

.s{
  background-color: rgba(255, 0, 0, 0.05) !important;
}
.u{
  background-color: rgba(105, 255, 0, 0.05) !important;
}
.m{
  background-color: rgba(0, 0, 0, 0.05);
}
.n{
  background-color: rgba(0, 0, 0, 0.05);
}
.g{
  background-color: rgba(0, 238, 255, 0.05) !important;
}
.r{
  background-color: rgba(22, 255, 0, 0.05) !important;
}

</style>
