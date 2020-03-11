<template>
  <div>
    <fieldset class="form-group">
      <div class="row">
        <legend class="col-form-label col-md-2 offset-md-2 col-sm-2 pt-0">Jenis Kelamin</legend>
        <div class="col-sm-10 col-md-6">
          <div class="form-check form-check-inline">
            <input
              class="form-check-input"
              type="radio"
              name="gender"
              id="genderRadio1"
              value="putera"
              v-model="genderRadio"
              v-on:change="radioChange"
              checked
            />
            <label class="form-check-label" for="genderRadio1">Putera</label>
          </div>
          <div class="form-check form-check-inline">
            <input
              class="form-check-input"
              type="radio"
              name="gender"
              id="genderRadio2"
              value="puteri"
              v-on:change="radioChange"
              v-model="genderRadio"
            />
            <label class="form-check-label" for="genderRadio2">Puteri</label>
          </div>
        </div>
      </div>
    </fieldset>

    <div id="gol_lomba" class="form-group row">
      <label for="golongan-lomba" class="col-md-4 col-form-label text-md-right">
        Pilih Golongan
        Lomba
      </label>
      <div class="col-md-6">
        <select
          v-model="selectgol"
          @change="golChange($event)"
          name="golongan-lomba"
          id="golonganlomba"
          class="custom-select"
        >
          <option value="pilih" selected>Pilih</option>
          <option
            v-for="gol in genderRadio == 'putera' ? golPutera:golPuteri"
            :key="gol.id"
            :value="gol.id"
          >{{gol.name}}</option>
        </select>
      </div>

      <div v-if="showGroup" class="container my-3 text-center">
        <h2>Regu</h2>
        <button class="btn btn-light" @click="newGroup(1)" type="button">Buat Baru</button>
        <button class="btn btn-secondary" @click="newGroup(2)" type="button">Gabung Regu</button>
      </div>
      <div v-if="showNewGroup == 1" class="container jumbotron my-md-4">
        <h4 class="display-4 text-center">Regu Baru</h4>
        <hr class="btn-outline-dark" />
        <div class="form-group">
          <label class="col-form-label" for="group-name">Nama Regu</label>
          <input type="text" class="form-control col-md-8" name="group-name" id="group-name" />
        </div>
        <div class="form-group">
          <label class="col-form-label" for="group-description">Deskripsi Regu</label>
          <textarea
            name="group-description"
            id="group-description"
            cols="20"
            rows="6"
            class="form-control"
          ></textarea>
        </div>
      </div>
      <div v-if="showNewGroup == 2" class="container jumbotron mx-md-4">
        <div class="form-group">
          <label class="col-form-label" for="Cari Regu">Cari Regu</label>
          <input type="text" class="form-control col-md-6" v-model="keywords" />
        </div>
        <div class="form-group">
             <select
          v-model="selectregu"
          name="join-group"
          id="gabungregu"
          class="custom-select"
        >
          <option value="pilih" selected>Pilih</option>
          <option
            v-for="lgroup in listgroup "
            :key="lgroup.id"
            :value="lgroup.id"
          >{{lgroup.name}}</option>
        </select>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  props: ["golPuteri", "golPutera", "searching"],

  data() {
    return {
      selectgol: "pilih",
      genderRadio: "putera",
      showGroup: false,
      showNewGroup: 0,
      keywords: null,
      listgroup: null,
      selectregu:"pilih"
    };
  },
  watch: {
    keywords(after, before) {
      this.fetch();
    }
  },
  methods: {
    fetch: function() {
      axios
        .get('/api/search', { params: { keywords: this.keywords,district:document.getElementById('district').value.toLowerCase() } })
        .then(response => (this.listgroup = response.data))
        .catch(error => {
          console.log(error);
        });
    },
    newGroup: function($condition) {
      this.showNewGroup = $condition;
    },
    radioChange: function() {
      this.selectgol = "pilih";
    },
    golChange: function(event) {
      let option = event.target.options;
      let selectedOptionText = option[option.selectedIndex].textContent;
      if (
        selectedOptionText ==
          "Cabang Fahm Al Qur'an Umur maksimal 18 tahun 11 bulan 29 hari" ||
        selectedOptionText ==
          "Cabang Syarh Al Qur'an Umur maksimal 18 tahun 11 bulan 29 hari"
      ) {
        this.showGroup = true;
      } else {
        this.showGroup = false;
      }
    }
  }
};
</script>
