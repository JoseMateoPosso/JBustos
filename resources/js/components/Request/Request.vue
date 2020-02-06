<template>
  <div>
    <!--<h1 class="page-header" id="tittle">Request {{data_info}}</h1>!-->
   <h1 class="page-header" id="tittle">Request </h1>
    <div class="col-md-12">
      <table class="table table-striped">
        <thead>
          <tr align="center">
            <th>#</th>
            <th>Nombre original</th>
            <th>Nuevo nombre</th>
            <th>Observación</th>
            <th>Pagina</th>
            <th>Sede original</th>
            <th>Sede destino</th>
            <th>Nick</th>
            <th>Estado</th>
            <th></th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="(solicit, index) in arrayRequest" v-bind:class="solicit.type" align="center">
            <td v-text="solicit.id"></td>
            <td v-text="solicit.nickname_orig"></td>
            <td v-text="solicit.nickname_suggest"></td>
            <td v-text="solicit.observation"></td>
            <td v-text="solicit.page_name"></td>
            <td>
              <select v-if="solicit.sede_id_orig" class="sede_orig" disabled>
                <option
                  v-for="(sede, index) in arraySedes"
                  :selected="sede.id === solicit.sede_id_orig"
                >{{sede.name}}</option>
              </select>
            </td>
            <td>
              <select v-if="solicit.sede_id_dest" class="sede_orig" disabled>
                <option
                  v-for="(sede, index) in arraySedes"
                  :selected="sede.id === solicit.sede_id_dest"
                >{{sede.name}}</option>
              </select>
            </td>
            <td v-text="solicit.nickname"></td>

            <td v-text="solicit.description"></td>
            <td>
              <a
                href="#"
                class="btn btn-info btn-md"
                title="Editar"
                v-on:click.prevent="showEditForm(solicit)"
              >Editar</a>
            </td>
            <td>
              <a class="btn btn-info btn-md" 
              v-on:click.prevent="showComment(solicit)"
              href="">Comentario</a>
            </td>
          </tr>
        </tbody>
      </table>
      <model-ediForm :info="info" @updated="hideEditForm"></model-ediForm>
      <model-comment :data_info="data_info" @updated="hideCommentModal"></model-comment>
    </div>
  </div>
</template>

<script>
import axios from "axios";
import toastr from "toastr";
import swal from "sweetalert";
import EditRequest from "./EditRequest";
import Comment from "./Comment"

export default {
  components: {
    "model-ediForm": EditRequest,
    "model-comment": Comment
  },
  data() {
    return {
      arrayRequest: [],
      arrayRequestComment: [],
      arraySedes: [],
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
      },
      data_info: []
    };
  },
  created: function() {
    this.getRequestList();
    this.getSedes();
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
    showEditForm(info) {
      //console.log(info, "----info----");

      var _this = this;

      _this.info.id = info.id ? info.id : "";
      _this.info.nickname_orig = info.nickname_orig ? info.nickname_orig : "";
      _this.info.nickname_suggest = info.nickname_suggest
        ? info.nickname_suggest
        : "";
      _this.info.observation = info.observation ? info.observation : "";
      _this.info.page_id = info.page_id ? info.page_id : "";
      _this.info.sede_id_orig = info.sede_id_orig ? info.sede_id_orig : "";
      _this.info.sede_id_dest = info.sede_id_dest ? info.sede_id_dest : "";
      _this.info.nick_id = info.nick_id ? info.nick_id : "";
      _this.info.status_id = info.status_id ? info.status_id : "";

      $("#modalEdit").modal("show");
    },
    showComment(data) {

      //var _this = this;
      //_this.info.id = info.id ? info.id : "";

      var _this = this;
      console.log(data,'data')
      var urlDetail = "commentListbyc";
      axios
        .post(urlDetail, { request_id: data.id })
        .then(response => {
          _this.data_info = response.data;
        })
        .catch(function(error) {
          console.log(error);
          toastr.error("No se pudo cargar la información");
        });

        //console.log(_this.arrayRequestComment,'arrayRequestComment');

      $("#modalComment").modal("show");

    },
    hideEditForm: () => {
      $("#modalEdit").modal("hide");
    },
    hideCommentModal: () => {
      $("#modalComment").modal("hide");
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

.s {
  background-color: rgba(255, 0, 0, 0.05) !important;
}
.u {
  background-color: rgba(105, 255, 0, 0.05) !important;
}
.m {
  background-color: rgba(0, 0, 0, 0.05);
}
.n {
  background-color: rgba(0, 0, 0, 0.05);
}
.g {
  background-color: rgba(0, 238, 255, 0.05) !important;
}
.r {
  background-color: rgba(22, 255, 0, 0.05) !important;
}

select.sede_orig {
  background-color: transparent;
  border: none;
  color: black;
}
</style>
