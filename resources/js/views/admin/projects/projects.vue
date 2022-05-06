<template>
    <div>
        <h1>Projects</h1>
        <br />
        <!--     <TablesComponent :data="projectsData" type="projects"></TablesComponent>
 -->
        <b-table hover :bordered="true" :items="projectsData" :fields="fields">
            <template #cell(editar)="data">
                <router-link :to="'/admin/projects/'+data.item.editar">
                    <button class=" btn btn-primary text-white">
                        <i class="fa fa-eye"></i>
                    </button>
                </router-link>
                <router-link :to="'/admin/projects/edit/'+ data.item.editar">
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
</template>

<script>
import axios from "axios";
export default {
    name: "Projects",
    components: {
    },
    data() {
        return {
            fields: ["Projecto", "Publicado", "Nome", "Data", "Editar"],
            projectsData: []
        };
    },
    async mounted() {
        const response = await axios.get("projects/all");
        response.data.forEach((element, index) => {
            let p;
            if (element.is_publish == "yes") {
                p = "";
            } else {
                p = "warning";
            }
            let f = {
                _rowVariant: p,
                Projecto: element.project_id,
                Publicado: element.is_publish,
                Nome: element.title,
                Data: element.date,
                editar: element.project_id
            };
            this.projectsData.push(f);
        });
    }
};
</script>

<style lang="scss" scoped></style>
