<template>
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <h3>{{data[0].title}}</h3>
      </div>
      <div class="row">
        <div class="col-xl-12 col-lg-12">
          <div class="image_template rounded d-block">
            <img :src="data[0].feature_image" class="">
          </div>
        </div>
      </div>
      <div class="row my-3 mx-auto">
        <div class="col-md-12 align-center">
            <CardComponent :data="{type:6,title:'Descrição', text:data[0].description }"/>
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
        const response = await axios.get("news/"+this.$route.params.news_id);
        this.data=response.data
        
      }
  }
</script>

<style lang="scss" scoped>

</style>