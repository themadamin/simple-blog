<script>
</script>

<template>
  <div class="container px-1 py-5 d-flex justify-content-between">
    <div class="d-flex flex-column justify-content-center ">
      <div class="p-3">
        <span class="badge bg-gradient-primary-to-secondary text-uppercase">
          Design &middot; Development &middot; Marketing
        </span>
      </div>
      <div class="p-3 fs-3 fw-light text-muted">I can help your business to</div>
      <h1 class="p-3 fw-bolder title-size"><span class="text-gradient d-inline"> Get online and grow fast </span></h1>
      <div class="p-3">
        <a href="" class="btn btn-primary btn-lg px-5 py-3 fs-6 fw-bolder me-sm-3">Resume</a>
        <a href="" class="btn btn-outline-dark btn-lg px-5 py-3 fs-6 fw-bolder">Profile</a>
      </div>
    </div>

    <div class="col-xxl-7">
      <div class="d-flex justify-content-center mt-5 mt-xxl-0">
        <div class="profile bg-gradient-primary-to-secondary d-flex justify-content-center align-items-end">
            <img class="profile-img" src="@/assets/profile.png">
          </div>
      </div>
    </div>
  </div>
</template>

<style scoped>

.bg-gradient-primary-to-secondary {
  background: #1e30f3;
  background: linear-gradient(135deg, #1e30f3 0%, #e21e80 100%);
}

.text-gradient {
  background: -webkit-linear-gradient(315deg, #1e30f3 0%, #e21e80 100%);
  -webkit-background-clip: text;
  -webkit-text-fill-color: transparent;
}

.title-size {
  font-size: 3.5em;
}

.profile {
  height: 35vw;
  width: 40vw;
  border-radius: 5vw;
  margin: 30px;
}
.profile .profile-img {
  height: 40vw;
}

</style>
