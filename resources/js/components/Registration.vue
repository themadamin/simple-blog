<script>
export default {
  data(){
    return {
      name: '',
      password: '',
      email: ''
    };
  },
  methods: {
    login(){
      console.log("Logging in with email: " + this.email + " and password " + this.password)
    },
    toggleLogin(){

    }
  }
}
</script>
  <template>
    <section class="vh-100 w-100 gradient-custom">
      <div class="container py-5 h-100">
        <div class="row justify-content-center align-items-center h-100">
          <div class="col-12 w-50 col-xl-7">
            <div class="card shadow-2-strong card-registration" style="border-radius: 15px;">
              <div class="card-body p-4 p-md-5">
                <h3 class="mb-2 pb-2 pb-md-0 mb-md-5">Registration Form</h3>
                <form class="d-flex flex-column">

                  <div class="row">
                    <div class="mb-2">

                      <div data-mdb-input-init class="form-outline">
                        <input type="text" id="name" class="form-control form-control-lg" />
                        <label class="form-label" for="name">Last Name</label>
                      </div>

                    </div>
                  </div>

                  <div class="row">
                    <div class="mb-2 pb-2">

                      <div data-mdb-input-init class="form-outline">
                        <input type="email" id="email" class="form-control form-control-lg" />
                        <label class="form-label" for="email">Email</label>
                      </div>

                    </div>
                  </div>

                  <div class="row">
                    <div class="mb-2 pb-2">

                      <div data-mdb-input-init class="form-outline">
                        <input type="password" id="password" class="form-control form-control-lg" />
                        <label class="form-label" for="password">Password</label>
                      </div>

                    </div>
                  </div>

                  <div class="row">
                    <div class="mb-2 pb-2">

                      <div data-mdb-input-init class="form-outline">
                        <input type="password" id="passwordConfirmation" class="form-control form-control-lg" />
                        <label class="form-label" for="passwordConfirmation">Confirm password</label>
                      </div>

                    </div>
                  </div>

                  <div class="mt-4 pt-2">
                    <input data-mdb-ripple-init class="btn btn-primary btn-lg" type="submit" value="Submit" />
                  </div>

                </form>

                <div class="mt-2 d-flex align-items-center">
                  <span>Already have account ?</span>
                  <button class="btn text-primary" @click="$emit('toggleLogin')">Login</button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </template>
<style scoped>
.gradient-custom {
  /* fallback for old browsers */
  background: #f093fb;

  /* Chrome 10-25, Safari 5.1-6 */
  background: -webkit-linear-gradient(to bottom right, rgba(240, 147, 251, 1), rgba(245, 87, 108, 1));

  /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
  background: linear-gradient(to bottom right, rgba(240, 147, 251, 1), rgba(245, 87, 108, 1))
}

</style>