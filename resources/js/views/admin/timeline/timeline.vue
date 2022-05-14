<template>
    <div>
        <h2>Timeline</h2>
        <br />
        <b-table hover :bordered="true" :items="timeline">
            <template #cell(editar)="data">
                <router-link :to="'/admin/timeline/' + data.item.editar">
                    <button class=" btn btn-primary text-white">
                        <i class="fa fa-eye"></i>
                    </button>
                </router-link>
                <router-link :to="'/admin/timeline/edit/' + data.item.editar">
                    <button class=" btn btn-success text-white">
                        <i class="fa fa-pen"></i>
                    </button>
                </router-link>
                <button
                    @click="Delete(data.item.editar)"
                    class="btn btn-danger text-white"
                >
                    <i class="fas fa-trash"></i>
                </button>
            </template>
        </b-table>
    </div>
</template>

<script>
import Swal from "sweetalert2";
import axios from "axios";
export default {
    data() {
        return {
            timeline: []
        };
    },
    async mounted() {
        const response = await axios.get("timeline/all");
        response.data.forEach(element => {
            let p;
            if (element.is_publish == "yes") {
                p = "";
            } else {
                p = "warning";
            }
            let f = {
                _rowVariant: p,
                Evento: element.project_id,
                Publicado: element.is_publish,
                Nome: element.title,
                Data: element.date,
                editar: element.project_id
            };
            this.timeline.push(f);
        });
    },
    methods: {
        async Delete(id) {
            Swal.fire({
                title: "Têm a certeza?",
                text: "Não irá conseguir reverter esta ação!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes, delete it!"
            }).then(async result => {
                if (result.isConfirmed) {
                    const r = await axios.post("timeline/delete/" + id);
                    console.log(r);
                    if (r.status == 200) {
                        Swal.fire(
                            "Deleted!",
                            "Your file has been deleted.",
                            "success"
                        );
                    }
                }
            });
        }
    }
};
</script>

<style lang="scss" scoped></style>
