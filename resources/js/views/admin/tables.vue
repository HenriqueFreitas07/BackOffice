<template>
    <div>
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-body">
                <div class="table-responsive">
                    <table
                        class="table table-bordered"
                        id="dataTable"
                        width="100%"
                        cellspacing="0"
                    >
                        <thead :v-if="type == 'projects'">
                            <tr>
                                <th>Id</th>
                                <th>Nome</th>
                                <th>Estado</th>
                                <th>Data</th>
                                <th>Editar</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="item in data[0]" :key="item.id">
                                <td>{{ item.project_id }}</td>
                                <td>{{ item.title }}</td>
                                <td>{{ item.is_publish }}</td>
                                <td>{{ item.date }}</td>
                                <td>
                                    <router-link :to="'/admin/projects/'+item.project_id">
                                        <button class="btn-circle bg-gradient-info text-white">
                                            <i
                                                class="fa fa-pen"
                                            ></i>
                                        </button>
                                    </router-link>
                                    <button class="btn-circle bg-gradient-danger text-white">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import "datatables.net-dt/js/dataTables.dataTables";
import "datatables.net-dt/css/jquery.dataTables.min.css";

export default {
    name: "Tables",
    props: ["data", "type"],
    mounted() {
        $("#dataTable").DataTable();
    }
};
</script>
