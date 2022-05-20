<template>
    <div>
        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">BigHand</h1>
        </div>
        <div class="row">
            <div class="col-md-6 d-flex">
                <h5 class="my-auto mx-2">Mês</h5>
                <b-form-select
                    @change="ChangeMonthDonations"
                    v-model="selectedMonth"
                    :options="selectMonths"
                ></b-form-select>
            </div>
            <div class="col-md-6 d-flex">
                <h5 class="my-auto mx-2">Ano</h5>
                <b-form-select
                    @change="ChangeYearDonations()"
                    v-model="selectedYear"
                    :options="Year"
                ></b-form-select>
            </div>
        </div>
        <div class="row">
            <!-- Area Chart -->
            <div class=" col-lg-12">
                <b-progress
                    id="progress_bar"
                    height="3px"
                    :value="pr"
                    class="mb-3"
                ></b-progress>
                <div class="chart-area" id="chart-area">
                    <canvas id="myBarChart"></canvas>
                </div>
            </div>
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
import Swal from "sweetalert2";
import chartAreaDemo from "../../chart/demo/chart-area-demo";
import chartPieDemo from "../../chart/demo/chart-pie-demo";
import chartBarDemo from "../../chart/demo/chart-bar-demo";
import axios from "axios";
export default {
  name: "Dashboard",
  data() {
    const Toast = Swal.mixin({
      toast: true,
      position: "top-end",
      showConfirmButton: false,
      timer: 3000,
      timerProgressBar: true,
      didOpen: (toast) => {
        toast.addEventListener("mouseenter", Swal.stopTimer);
        toast.addEventListener("mouseleave", Swal.resumeTimer);
      },
    });
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
        { value: 13, text: "Ano inteiro" },
      ],
      selectedMonth: 13,
      Year: Array.from(
        { length: 10 },
        (_, index) => new Date().getFullYear() - 10 + index + 1
      ),
      selectedYear: this.$store.getters.year ? this.$store.getters.year : 2022,
      Toast,
      pr: 0,
      progressEl: null,
      projectsData: [],
      projectsAmount: [],
    };
  },
  mounted() {
    //chartAreaDemo();
   // chartPieDemo();
    chartBarDemo();
    this.mediaMonths();
  },
  methods: {
    async mediaMonths() {
      if (this.months < 13 && this.$store.state.donations.length == 0) {
        const response = await this.requestMonthDonations(this.months);
        let data = response.data;
        let values = [];
        data.forEach((el) => {
          values.push(el.amount);
        });
        let a = values.reduce((a, b) => a + b, 0);
        this.dataSetChart.push(a.toFixed(2));
        setTimeout(() => {
          this.pr = this.pr + (1 / 12) * 100;
          // console.log(this.pr);
          if (this.pr.toFixed(0) == 100) {
            this.pr = 0;
          }
          this.months++;
          this.mediaMonths();
        }, 25);
      } else {
        if (this.dataSetChart.length != 0 && this.months == 13) {
          this.$store.commit("donations", this.dataSetChart);
        }
        console.log(this.dataSetChart);
        this.SwitchCanvas();
        chartBarDemo(this.$store.state.donations);
        this.months = 14;
      }
    },
    async requestMonthDonations(month) {
      const r = await axios.get("donations/" + month + "/" + this.selectedYear);
      return r;
    },
    async ChangeMonthDonations(month) {
      if (month != 13) {
        let rr = await this.requestMonthDonations(month);
        let data = rr.data;
        this.dataSetChart = [];
        let days = [];
        data.forEach((el) => {
          let day = new Date(el.date);
          this.dataSetChart.push(JSON.stringify(el.amount));
          days.push(day.getMonth() + 1 + "/" + day.getDate());
        });
        const newArr = (
          (this.dataSetChart.reduce((a, b) => {
            return parseInt(a) + parseInt(b);
          }, 0) /
            this.dataSetChart.length) *
          1.68
        ).toFixed(0);
        if (this.dataSetChart.length == 0) {
          this.Toast.fire({
            icon: "info",
            title: "O mês selecionado não contêm nenhuma doação!",
          });
        } else {
          this.SwitchCanvas();
          chartBarDemo(this.dataSetChart, days, newArr);
        }
      } else {
        this.mediaMonths();
      }
    },
    ChangeYearDonations() {
      this.pr = 0;
      this.selectedMonth = 13;
      this.dataSetChart=[];
      this.$store.commit("donations", []);
      this.$store.commit("year", this.selectedYear);
      this.months = 1;
      this.mediaMonths();
    },
    SwitchCanvas() {
      let box = document.getElementById("chart-area");
      document.getElementById("myBarChart").remove();
      let g = document.createElement("canvas");
      g.setAttribute("id", "myBarChart");
      box.appendChild(g);
    },
  },
};
</script>
