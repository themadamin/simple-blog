<script>
import Login from '@/components/Login.vue'
import Registration from '@/components/Registration.vue'

export default {
  components: {
    Login,
    Registration
  },
  data(){
    return {
      isLogin: true
    }
  },
  methods: {
    toggleLogin() {
      this.isLogin = !this.isLogin;
    }
  }
}
</script>
<template>
  <div>
    <Login v-if="isLogin" @toggleRegister="toggleLogin"></Login>
    <Registration v-if="!isLogin" @toggleLogin="toggleLogin"></Registration>
  </div>
</template>
