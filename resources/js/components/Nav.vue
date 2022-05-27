<template>



  <header>
    <nav class="navbar navbar-expand-lg navbar-light bg-light nav-fill w-100">
      <div class="container">
        <button
          class="navbar-toggler"
          type="button"
          data-toggle="collapse"
          data-target="#navbarTogglerDemo01"
          aria-controls="navbarTogglerDemo01"
          aria-expanded="false"
          aria-label="Toggle navigation"
        >
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
          <router-link class="navbar-brand" to="/">
            <b-img height="50px" src="https://www.thebighand.org/wp-content/uploads/2019/02/logotipo_bighand.png" alt=""></b-img>
          </router-link>
          <ul class="navbar-nav mt-2 mt-lg-0 ml-auto" v-if="!user">
            <li class="nav-item active">
              <router-link class="nav-link" to="/login"
                >Entrar <span class="sr-only">(current)</span></router-link
              >
            </li>
            <li class="nav-item">
              <router-link class="nav-link" to="/register">Criar Conta</router-link>
            </li>
          </ul>
          <ul class="navbar-nav mt-2 mt-lg-0 ml-auto" v-if="user">
            <li class="nav-item active">
              <a class="nav-link" href="javascript:void(0)" @click="logout"
                >Logout <span class="sr-only">(current)</span></a
              >
            </li>
          </ul>
          <ul class="navbar-nav mx-2" v-if="user">
            <li class="nav-item active">
              <router-link class="nav-link d-flex" to="/admin" >
                <div class="m-3">
                  Painel Admin
                </div>
                <i class="my-auto fa fa-screwdriver fa-lg"></i>
              </router-link>
            </li>
          </ul>
        </div>
      </div>
    </nav>
  </header>
</template>

<script>
import { mapGetters } from "vuex";

export default {
  name: "Nav",
  methods: {
    logout() {
      localStorage.removeItem("token");
      this.$store.dispatch("user", null);
      this.$router.push("/login");
    },
  },
  computed: {
    ...mapGetters(["user"]),
  },
};
</script>