<template>
    <div class="container">
        <b-row>
            <b-col cols="12" class="pl-5">
                <h3>{{ data[0].title }}</h3>
            </b-col>
            <b-row>
                <b-col cols="4">
                    <div class="image_template rounded d-block">
                        <img :src="data[0].feature_image" class="" />
                    </div>
                </b-col>
                <b-col cols="8">
                    <b-row>
                        <b-col cols="12">
                            <CardComponent
                                :data="{
                                    type: 6,
                                    title: 'Descrição',
                                    text: data[0].description
                                }"
                            />
                        </b-col>
                    </b-row>
                    <b-row>
                        <b-col cols="12">
                            <CardComponent
                                :data="{
                                    type: 6,
                                    title: 'Data',
                                    text: data[0].date
                                }"
                            />
                        </b-col>
                    </b-row>
                </b-col>
            </b-row>
        </b-row>
    </div>
</template>

<script>
import CardComponent from "../cards.vue";
export default {
    components: {
        CardComponent
    },
    data() {
        return {
            data: {}
        };
    },
    async mounted() {
        const response = await axios.get(
            "timeline/" + this.$route.params.timeline_id
        );
        this.data = response.data;
        if(this.data[0].feature_image==null)
        { 
          this.data[0].feature_image ="https://t3.ftcdn.net/jpg/04/62/93/66/360_F_462936689_BpEEcxfgMuYPfTaIAOC1tCDurmsno7Sp.jpg"
        }
        console.log(this.data);
    }
};
</script>

<style lang="scss" scoped></style>
