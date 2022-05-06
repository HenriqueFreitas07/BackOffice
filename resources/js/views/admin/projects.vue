<template>
  <div>
    <h1>Projects</h1>
    <br>
    <TablesComponent :data="projectsData" type="projects"></TablesComponent>
  </div>
</template>

<script>
import axios from 'axios'
import TablesComponent from './tables'
  export default {
      name:'Projects',
      components: {
        TablesComponent
        },
      data() {
        return{
          projectsData:[]
        }
      },
      async mounted() {
        const response = await axios.get("projects/all");
        console.log(response.data)
        this.projectsData.push(response.data)
        console.log(this.projectsData[0])
      }
  }
</script>

<style lang="scss" scoped>

</style>