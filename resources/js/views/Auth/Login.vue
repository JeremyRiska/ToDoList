<template>
  <div>
    <form action="#" @submit.prevent="handleLogin">
        <div class="form-row">
            <input type="email" v-model="userData.email">
        </div>
        <div class="form-row">
            <input type="password" v-model="userData.password">
        </div>
        <div class="form-row">
            <button type="submit">Sign In</button>
        </div>
    </form>
  </div>
</template>

<script>
import { mapActions } from 'vuex'
import AuthCofnig from './AuthConfig'
export default {
    name: 'login',
    data() {
        return {
            userData: AuthCofnig.userCredentials()
        }
    },
    methods: {
        ...mapActions( {
            signIn: 'auth/login'
        }),
        
      async  handleLogin() {
            await axios.get('/sanctum/csrf-cookie').then(response => {
                axios.post('/api/auth/login', this.userData)
                .then(response => {
                    console.log('Logged in ' + response.data)
                    this.signIn()
                })
                .catch(error => console.log(error));
            })
        }
    }

}
</script>

<style>

</style>