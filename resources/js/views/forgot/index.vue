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
                    <div v-if="!emailSent">
                      <div class="text-center">
                        <h1 class="h4 text-gray-900 mb-2">
                          Esqueceste-te da palavra-passe?
                        </h1>
                        <p class="mb-4">
                          Percebe-se á coisas que acontecem... Mas nós arranjamos maneira de não teres desculpa para ajudar. Recompõe aqui a tua palavra-passe basta inserires o teu e-mail.
                        </p>
                      </div>
                      <form class="user" @submit.prevent="forgot">
                        <div class="form-group">
                          <input
                            type="email"
                            class="form-control form-control-user"
                            id="exampleInputEmail"
                            aria-describedby="emailHelp"
                            placeholder="Email Address..."
                            v-model="email"
                          />
                        </div>
                        <LoadingButton
                          text="Repor password"
                          v-bind:isLoading="isLoading"
                        />
                      </form>
                    </div>
                    <div v-else>
                      <span class="h4">
                        <i class="far fa-check-circle text-success"></i> Check
                        your email!
                      </span>
                    </div>
                    <hr />
                    <div class="text-center">
                      <router-link class="small" to="/register"
                        >Criar Conta!</router-link
                      >
                    </div>
                    <div class="text-center">
                      <router-link class="small" to="/login"
                        >Já têm uma conta? Entre !</router-link
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
import * as notify from "../../utils/notify.js";
import Nav from "../../components/Nav";
import LoadingButton from "../../components/LoadingButton";

export default {
  name: "Forgot",
  components: {
    Nav,
    LoadingButton,
  },
  data() {
    return {
      email: this.email,
      isLoading: false,
      emailSent: false,
    };
  },
  methods: {
    async forgot() {
      this.isLoading = true;
      try {
        await axios.post("forgot", {
          email: this.email,
        });
        this.isLoading = false;
        this.emailSent = true;
      } catch (error) {
        notify.authError(error);
        this.isLoading = false;
      }
    },
  },
};
</script>
<style>
.bg-password-image {
  background: url("https://www.thebighand.org/wp-content/uploads/2019/02/gallery_4_the_big_hand-360x360.jpg");
  background-position: center;
  background-size: contain;
}
</style>