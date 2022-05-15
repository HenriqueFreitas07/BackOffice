<template>
    <div>
        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">BigHand</h1>
        </div>
        <div class="row">
            <!-- Area Chart -->
            <div class="col-xl-8 col-lg-7">
                <h3 class="ml-4 font-weight-bold text-primary">2022</h3>
                <div class="chart-area" id="chart-area">
                    <canvas id="myBarChart"></canvas>
                </div>
            </div>
            <v-divider vertical> </v-divider>
            <div class="col-xl-4 col-lg-3">
                <h5 class="pl-2">Mês</h5>
                <b-form-select
                    @change="ChangeMonthDonations"
                    v-model="selectedMonth"
                    :options="selectMonths"
                ></b-form-select>
            </div>

            <!-- Pie Chart -->
            <!--  <div class="col-xl-4 col-lg-5">
        <div class="card shadow mb-4">
          <div
            class="
              card-header
              py-3
              d-flex
              flex-row
              align-items-center
              justify-content-between
            "
          >
            <h6 class="m-0 font-weight-bold text-primary">Revenue Sources</h6>
            <div class="dropdown no-arrow">
              <a
                class="dropdown-toggle"
                href="#"
                role="button"
                id="dropdownMenuLink"
                data-toggle="dropdown"
                aria-haspopup="true"
                aria-expanded="false"
              >
                <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
              </a>
              <div
                class="
                  dropdown-menu dropdown-menu-right
                  shadow
                  animated--fade-in
                "
                aria-labelledby="dropdownMenuLink"
              >
                <div class="dropdown-header">Dropdown Header:</div>
                <a class="dropdown-item" href="#">Action</a>
                <a class="dropdown-item" href="#">Another action</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#">Something else here</a>
              </div>
            </div>
          </div>
          <div class="card-body">
            <div class="chart-pie pt-4 pb-2">
              <canvas id="myPieChart"></canvas>
            </div>
            <div class="mt-4 text-center small">
              <span class="mr-2">
                <i class="fas fa-circle text-primary"></i> Direct
              </span>
              <span class="mr-2">
                <i class="fas fa-circle text-success"></i> Social
              </span>
              <span class="mr-2">
                <i class="fas fa-circle text-info"></i> Referral
              </span>
            </div>
          </div>
        </div>
      </div> -->
        </div>
    </div>
</template>

<script>
import chartAreaDemo from "../../chart/demo/chart-area-demo";
import chartPieDemo from "../../chart/demo/chart-pie-demo";
import chartBarDemo from "../../chart/demo/chart-bar-demo";
import axios from "axios";
export default {
    name: "Dashboard",
    data() {
        return {
            months: 1,
            dataSetChart: [],
            selectMonths: [
                { value: 1, text: "Janeiro" },
                { value: 2, text: "Fevereiro" },
                { value: 3, text: "Março" },
                { value: 4, text: "Abril" },
                { value: 5, text: "Maio" },
                { value: 6, text: "Junho" },
                { value: 7, text: "Julho" },
                { value: 8, text: "Agosto" },
                { value: 9, text: "Setembro" },
                { value: 10, text: "Outubro" },
                { value: 11, text: "Novembro" },
                { value: 12, text: "Dezembro" },
                { value: 13, text: "Ano inteiro" }
            ],
            selectedMonth: 13
        };
    },
    mounted() {
        //chartAreaDemo();
        //chartPieDemo();
        chartBarDemo();
        this.mediaMonths();
    },
    methods: {
        async mediaMonths() {
            if (this.months < 13 && this.$store.state.donations.length == 0) {
                const response = await this.requestMonthDonations(this.months);
                let data = response.data;
                let values = [];
                data.forEach(el => {
                    values.push(el.amount);
                });
                let a = values.reduce((a, b) => a + b, 0);
                this.dataSetChart.push(a.toFixed(2));
                setTimeout(() => {
                    this.months++;
                    this.mediaMonths();
                }, 25);
            } else {
                if (this.dataSetChart.length != 0 && this.months == 13) {
                    this.$store.commit("donations", this.dataSetChart);
                }
                this.SwitchCanvas();
                chartBarDemo(this.$store.state.donations);
                this.months = 14;
            }
        },
        async requestMonthDonations(month) {
            const r = await axios.get("donations/" + month);
            return r;
        },
        async ChangeMonthDonations(month) {
            if (month != 13) {
                let rr = await this.requestMonthDonations(month);
                let data = rr.data;
                this.dataSetChart = [];
                let days = [];
                data.forEach(el => {
                    let day = new Date(el.date);
                    this.dataSetChart.push(JSON.stringify(el.amount));
                    days.push(day.getMonth() + 1 + "/" + day.getDate());
                });
                this.SwitchCanvas();
                chartBarDemo(this.dataSetChart, days);
            } else {
                this.mediaMonths();
            }
        },
        SwitchCanvas() {
            let box = document.getElementById("chart-area");
            document.getElementById("myBarChart").remove();
            let g = document.createElement("canvas");
            g.setAttribute("id", "myBarChart");
            box.appendChild(g);
        }
    }
};
</script>
