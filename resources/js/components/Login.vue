<template>
    <div >
        <h4>From vue </h4>
        <div class="mb-3"></div>
        <b-card-group deck>
  <b-card
    title="Login"
    img-src="/img/credencial.png"
    img-top
    tag="article"
    style="max-width: 20rem;"
    class="mb-3 form-group text-center"
    align="center   '   '"
  >
    <b-form >
        <label class="sr-only" for="email">Email</label>
        <b-input
        id="email" v-model="dataForm.email"
        class="mb-2 mr-sm-2 mb-sm-0"
        placeholder="Email"
        ></b-input>

        <label class="sr-only" for="password">Password</label>
        <b-input-group prepend-html="<img src='/img/olho.png' width='40'/>" class="mb-2 mr-sm-2 mb-sm-0"
        @click="show = !show">
        <b-input id="password" :type="show ? 'text' : 'password'" placeholder="Password"
         v-model="dataForm.password"></b-input>
        </b-input-group>

        <b-form-checkbox class="mb-2 mr-sm-2 mb-sm-0">lembrar-me </b-form-checkbox>

        <b-button @click="onSubmit(dataForm)"  variant="primary">Login</b-button>
    </b-form>

  </b-card>
</b-card-group> 

    </div>    
</template>
<script>
import axios from 'axios'
export default {
    components:{
        axios
    },
    data(){
        return {
            show : false,
            dataForm:{
                email:"",
                password:""
            }
        }
    },
    methods:{
        onSubmit:function(dataForm){
            axios.post('http://blog.localhost/api/auth/login',{
                 email : dataForm.email,
                 password : dataForm.password
             }).then(
                function(response){
                    console.log(response.data)
                }
            )
        },
        onReset:function(){

        }
    }
}
</script>
<style scoped>

</style>