<template>
    <ul
      class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion"
      id="accordionSidebar"
    >
      <!-- Sidebar - Brand -->
      <router-link
        class="sidebar-brand d-flex align-items-center justify-content-center"
        to="/"
      >
        
        <div class="sidebar-brand-text mx-3">BigHand</div>
      </router-link>

      <!-- Divider -->
      <hr class="sidebar-divider my-0" />

      <!-- Nav Item - Dashboard -->
      
      <li class="nav-item active" v-for="item in sidebarItems" :key="item.id">
        <router-link class="nav-link" :to="item.link">
          <i :class="item.icon"></i>
          <span>{{item.name}}</span></router-link
        >
      </li>
      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>
    </ul>
    <!-- End of Sidebar -->
</template>

<script>
import { ref } from 'vue'
export default {
    name: 'Sidebar',
    data(){
      return{ 
        sidebarItems:[
          {
            id:0,
            name:'Doações',
            icon:'fa fa-chart-bar',
            link:'/admin#'
          },
          {
            id:1,
            name:'Projectos',
            icon:'fa fa-flag',
            link:'/admin/projects'
          },
          {
            id:2,
            name:'Notícias',
            icon:'fa fa-newspaper',
            link:'/admin/news'
          },
          {
            id:3,
            name:'Timeline',
            icon:'fa fa-handshake',
            link:'/admin/timeline'
          },
        ]
      }
    }
}
</script>
