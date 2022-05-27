<template>
  <div class="container">
    <b-row>
      <b-row>
        <b-col cols="12">
          <h2> {{data[0].title}}</h2>
          <h5> {{data[0].date}}</h5>
        </b-col>
      </b-row>
      <b-col cols="7">
        <div class="image_template rounded d-block">
          <img :src="'https://www.thebighand.org/wp-content/uploads/2020/05/'+data[0].feature_image" class="">
        </div>
      </b-col>
      <b-col cols="5">
        <CardComponent :data="{type:1,title:'Objectivo', text:data[0].goal }"/>
        <CardComponent :data="{type:2,title:'Angariado', text:data[0].raised }"/>
        <CardComponent :data="{type:3,title:'Concluído', text:Math.round((data[0].raised/data[0].goal)*100) }"/>
      </b-col>
      <b-row>
        <b-col cols="12">
            <CardComponent :data="{type:6,title:'História', text:data[0].story }"/>
        </b-col>
      </b-row>
    </b-row>
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