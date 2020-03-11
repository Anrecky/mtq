<template>
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="card">
          <div class="card-header">Pendaftaran</div>

          <div class="card-body">
            <form method="POST" autocomplete="off" v-bind:action="formAction">
              <div class="form-group row mb-0">
                <div class="col-md-6 offset-md-4">
                  <button type="submit" class="btn btn-primary">Daftar</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  props: ["formAction"],

  mounted() {
    console.log("Component mounted.");
  }
};
</script>
