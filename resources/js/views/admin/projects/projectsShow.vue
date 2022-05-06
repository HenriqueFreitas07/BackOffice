<template>
  <div class="container">
    <div class="row">
      <div class="row my-3 ms-4">
        <div class="col-md-12">
          <h2> {{data[0].title}}</h2>
          <h5> {{data[0].date}}</h5>
        </div>
      </div>
      <div class="col-xl-8 col-lg-7">
        <div class="image_template rounded d-block">
          <img :src="'https://www.thebighand.org/wp-content/uploads/2020/05/'+data[0].feature_image" class="">
        </div>
      </div>
      <div class="col-xl-4 col-lg-5">
        <CardComponent :data="{type:1,title:'Objectivo', text:data[0].goal }"/>
        <br>
        <CardComponent :data="{type:2,title:'Angariado', text:data[0].raised }"/>
        <br>

            <CardComponent :data="{type:3,title:'Concluído', text:Math.round((data[0].raised/data[0].goal)*100) }"/>

      </div>
      <div class="row">
        <div class="col-md-12">
          <br>
            <CardComponent :data="{type:6,title:'História', text:data[0].story }"/>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import CardComponent from '../cards.vue';
  export default {
    components:{
      CardComponent
    },
    data(){
      return{
        data:{}
      }
    },
    async mounted() {
        const response = await axios.get("projects/"+this.$route.params.project_id);
        this.data=response.data
      }
  }
</script>

<style lang="scss" scoped>

</style>