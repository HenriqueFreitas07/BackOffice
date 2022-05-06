<template>
  <div>
      {{data}}
  </div>
</template>

<script>
  export default {
    data(){
      return{
        data:{}
      }
    },
    async mounted() {
        const response = await axios.get("projects/"+this.$route.params.project_id);
        console.log(response.data)
        this.data=response.data
        console.log(this.data)
      }
  }
</script>

<style lang="scss" scoped>

</style>