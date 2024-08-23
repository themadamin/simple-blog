<script>
export default {
  props: {
    title: String,
    body: Text,
    /*img:
      {
        type: String,
        default: "@/assets/php.svg"
      }*/
  }
}
</script>
<template>
    <div class="d-flex row justify-content-center shadow rounded-4 border-0 mb-5">
      <div class="d-flex align-items-center">
        <div class="p-5">
          <h2>{{ this.title }}</h2>
          <p>{{ this.body }}</p>
        </div>
        <img class="card-img" src="@/assets/php.svg" alt="php">
      </div>
    </div>
</template>
<style>

</style>