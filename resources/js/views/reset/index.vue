<template>
<div>
  <Nav />
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-xl-10 col-lg-12 col-md-9">
        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
              <div class="col-lg-4 d-none d-lg-block bg-password-image"></div>
              <div class="col-lg-8">
                <div class="p-5">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-2">Repor Palavra-passe</h1>
                  </div>
                  <form class="user" @submit.prevent="reset">
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
                      <input
                        type="password"
                        class="form-control form-control-user"
                        id="exampleRepeatPassword"
                        placeholder="Repeat Password"
                        v-model="password_confirm"
                      />
                    </div>
                    <button
                      type="submit"
                      class="btn btn-primary btn-user btn-block"
                    >
                      Reset Password
                    </button>
                  </form>
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
import axios from "axios"
import * as notify from "../../utils/notify.js"
import Nav from '../../components/Nav'

export default {
  name: "Reset",
  components: {
    Nav
  },
  data() {
    return {
      password: "",
      password_confirm: "",
    };
  },
  methods: {
    async reset() {
      try {
        const response = await axios.post("reset", {
          password: this.password,
          password_confirm: this.password_confirm,
          token: this.$route.params.token,
        });
        let toast = this.$toasted.show("Palavra-passe atualizada com sucesso", {
          theme: "toasted-primary",
          position: "top-right",
          duration: 5000,
        });

        this.$router.push("/login");
      } catch (error) {
        notify.authError(error);
      }
    },
  },
};
</script>
<style>
.bg-password-image {
  background: url("https://www.thebighand.org/wp-content/uploads/2019/02/gallery_3_the_big_hand-360x360.jpg");
  background-position: center;
  background-size: cover;
}
</style>
