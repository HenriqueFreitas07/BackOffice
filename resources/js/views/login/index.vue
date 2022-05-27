<template>
  <div>
    <Nav />
    <div class="container">
      <!---- Navbar -->
      <!-- Outer Row -->
      <div
        class="row justify-content-center"
        v-if="verificationStatus"
      >
      </div>
      <div class="row justify-content-center">
        <div class="col-xl-10 col-lg-12 col-md-9">
          <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
              <!-- Nested Row within Card Body -->
              <div class="row">
                <div class="col-lg-4 d-none d-lg-block bg-login-image"></div>
                <div class="col-lg-8">
                  <div class="p-5">

                    <div class="text-center">
                      <h1 class="h4 text-gray-900 mb-4">Bem vindo!</h1>
                    </div>
                    <form class="user" @submit.prevent="login">
                      <div class="form-group">
                        <input
                          type="email"
                          class="form-control form-control-user"
                          id="exampleInputEmail"
                          aria-describedby="emailHelp"
                          placeholder="Enter Email Address..."
                          v-model="email"
                        />
                      </div>
                      <div class="form-group">
                        <input
                          type="password"
                          class="form-control form-control-user"
                          id="exampleInputPassword"
                          placeholder="Password"
                          v-model="password"
                        />
                      </div>
                      <div class="form-group">
                        <div class="custom-control custom-checkbox small">
                          <input
                            type="checkbox"
                            class="custom-control-input"
                            id="customCheck"
                          />
                          <label class="custom-control-label" for="customCheck"
                            >Remember Me</label
                          >
                        </div>
                      </div>
                      <button
                        type="submit"
                        class="btn btn-primary btn-user btn-block"
                      >
                        Login
                      </button>
                    </form>
                    <hr />
                    <div class="text-center">
                      <router-link class="small" to="/forgot-password"
                        >Esqueceu-se da palavra-passe?</router-link
                      >
                    </div>
                    <div class="text-center">
                      <router-link class="small" to="/register"
                        >Criar conta!</router-link
                      >
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import axios from "axios";
import Nav from "../../components/Nav";
import * as notify from "../../utils/notify.js";

export default {
  name: "Login",
  components: {
    Nav,
  },
  data() {
    return {
      email: "",
      password: "",
      verificationStatus: this.$route.query.verification_status ? true : false,
      verificationMessage: '',
      verificationAlertClasses: {
        'alert-success': false,
        'alert-danger': false
      }
    };
  },
  methods: {
    async login() {
      try {
        const response = await axios.post("login", {
          email: this.email,
          password: this.password,
        });
        console.log(response);
        let toast = Vue.toasted.show(response.data.message, {
            theme: "toasted-primary",
            position: "top-right",
            duration: 3000,
          });
        localStorage.setItem("token", response.data.token);
        this.$store.dispatch("user", response.data.user);
        this.$router.push("/admin");
      } catch (error) {
        console.error(error);
        notify.authError(error);
      }
    },
  },
  mounted(){
    console.log("mounted")
  }
};
</script>

<style>
.bg-login-image {
  background: url("https://www.thebighand.org/wp-content/uploads/2019/02/gallery_5_the_big_hand-360x360.jpg");
  background-position: center;
  background-size: cover;
}

</style>