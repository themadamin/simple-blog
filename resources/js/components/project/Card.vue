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
      <div class="d-flex">
        <div class="p-5 d-flex flex-column justify-content-around">
          <h2>{{ this.title }}</h2>
          <p>{{ this.body }}</p>
            <div class="d-flex gap-2">
                <RouterLink :to="{name: 'projects.edit'}">
                    <img src="@/assets/pen.svg" alt="edit">
                </RouterLink>
                <a href="#"><img src="@/assets/trash.svg" alt="delete" height="25px"></a>
            </div>
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
