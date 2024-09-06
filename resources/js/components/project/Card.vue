<script>
export default {
  props: {
    project: {type: Object,
        default: () => ({id: null, title: null, body: null, thumbnail: null})
    }
  }
}
</script>
<template>
    <div class="d-flex row justify-content-center shadow rounded-4 border-0 mb-5">
      <div class="d-flex">
        <div class="p-5 d-flex flex-column justify-content-around">
          <h2>{{ project.title }}</h2>
          <p>{{ project.body }}</p>
        </div>

        <img class="card-img" src="@/assets/php.svg" alt="php">
      </div>
    </div>
</template>
<style scoped>

.card-img {
    height: 400px;
    width: 300px;
}
</style>
