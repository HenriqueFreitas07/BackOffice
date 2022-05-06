<template>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2>News</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <b-table
                    hover
                    :bordered="true"
                    :items="news"
                >
                    <template #cell(editar)="data">
                        <router-link
                            :to="'/admin/news/' + data.item.editar"
                        >
                            <button class=" btn btn-primary text-white">
                                <i class="fa fa-eye"></i>
                            </button>
                        </router-link>
                        <router-link
                            :to="'/admin/news/edit/' + data.item.editar"
                        >
                            <button class=" btn btn-success text-white">
                                <i class="fa fa-pen"></i>
                            </button>
                        </router-link>
                        <button class="btn btn-danger text-white">
                            <i class="fas fa-trash"></i>
                        </button>
                    </template>
                </b-table>
            </div>
        </div>
    </div>
</template>

<script>
import axios from "axios";
export default {
    data() {
        return {
            news: [],
        };
    },
    async mounted() {
        const response = await axios.get("news/all");
        response.data.forEach((element, index) => {
            let p;
            if (element.is_publish == "yes") {
                p = "";
            } else {
                p = "warning";
            }
            let f = {
                _rowVariant: p,
                Notícia: element.project_id,
                Publicado: element.is_publish,
                Nome: element.title,
                Data: element.date,
                editar: element.project_id
            };
            this.news.push(f);
        });
    }
};
</script>

<style lang="scss" scoped></style>
