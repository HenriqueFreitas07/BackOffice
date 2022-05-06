<template>
  <div width="100%">

      <!-- Earnings (Monthly) Card Example -->
      <div v-if="data.type == 1" class="col-xl-12 col-md-6 mb-4" >
        <div class="card border-left-primary shadow h-100 py-2">
          <div class="card-body">
            <div class="row no-gutters align-items-center">
              <div class="col mr-2">
                <div
                  class="
                    text-xs
                    font-weight-bold
                    text-primary text-uppercase
                    mb-1
                  "
                >
                  {{data.title}}
                </div>
                <div class="h5 mb-0 font-weight-bold text-gray-800">
                  €{{data.text}}
                </div>
              </div>
              <div class="col-auto">
                <i class="fas fa-calendar fa-2x text-gray-300"></i>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- Earnings (Annual) Card Example -->
      <div v-if="data.type == 2 " class="col-xl-12 col-md-6 mb-4">
        <div class="card border-left-success shadow h-100 py-2">
          <div class="card-body">
            <div class="row no-gutters align-items-center">
              <div class="col mr-2">
                <div
                  class="
                    text-xs
                    font-weight-bold
                    text-success text-uppercase
                    mb-1
                  "
                >
                  {{data.title}}
                </div>
                <div class="h5 mb-0 font-weight-bold text-gray-800">
                  €{{data.text}}
                </div>
              </div>
              <div class="col-auto">
                <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- Tasks Card Example -->
      <div v-if="data.type == 3 " class="col-xl-12 col-md-6 mb-4">
        <div class="card border-left-info shadow h-100 py-2">
          <div class="card-body">
            <div class="row no-gutters align-items-center">
              <div class="col mr-2">
                <div
                  class="text-xs font-weight-bold text-info text-uppercase mb-1"
                >
                  {{data.title}}
                </div>
                <div class="row no-gutters align-items-center">
                  <div class="col-auto">
                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">
                      {{data.text}}%
                    </div>
                  </div>
                  <div class="col">
                    <div class="progress progress-sm mr-2">
                      <div
                        class="progress-bar bg-info"
                        role="progressbar"
                        :style="'width:'+data.text+'%'"
                        aria-valuenow="50"
                        aria-valuemin="0"
                        aria-valuemax="100"
                      ></div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-auto">
                <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- Pending Requests Card Example -->
      <div v-if="data.type == 4 " class="col-xl-12 col-md-6 mb-4">
        <div class="card border-left-warning shadow h-100 py-2">
          <div class="card-body">
            <div class="row no-gutters align-items-center">
              <div class="col mr-2">
                <div
                  class="
                    text-xs
                    font-weight-bold
                    text-warning text-uppercase
                    mb-1
                  "
                >
                  Pending Requests
                </div>
                <div class="h5 mb-0 font-weight-bold text-gray-800">18</div>
              </div>
              <div class="col-auto">
                <i class="fas fa-comments fa-2x text-gray-300"></i>
              </div>
            </div>
          </div>
        </div>
      </div>

 
      <div v-if="data.type == 5 " class="col-lg-12">
        <!-- Default Card Example -->
        <div class="card mb-4">
          <div class="card-header">Default Card Example</div>
          <div class="card-body">
            This card uses Bootstrap's default styling with no utility classes
            added. Global styles are the only things modifying the look and feel
            of this default card example.
          </div>
        </div>

        <!-- Basic Card Example -->
      </div>
        <div v-if="data.type ==6" class="card shadow mb-4">
          <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">
              {{data.title}}
            </h6>
          </div>
          <div class="card-body">
            {{data.text}}
          </div>
        </div>

      <div v-if="data.type == 7" class="col-lg-12
      ">
        <!-- Dropdown Card Example -->
        <div class="card shadow mb-4">
          <!-- Card Header - Dropdown -->
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
            <h6 class="m-0 font-weight-bold text-primary">
              Dropdown Card Example
            </h6>
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
          <!-- Card Body -->
          <div class="card-body">
            Dropdown menus can be placed in the card header in order to extend
            the functionality of a basic card. In this dropdown card example,
            the Font Awesome vertical ellipsis icon in the card header can be
            clicked on in order to toggle a dropdown menu.
          </div>
        </div>

        <!-- Collapsable Card Example -->
        <div class="card shadow mb-4">
          <!-- Card Header - Accordion -->
          <a
            href="#collapseCardExample"
            class="d-block card-header py-3"
            data-toggle="collapse"
            role="button"
            aria-expanded="true"
            aria-controls="collapseCardExample"
          >
            <h6 class="m-0 font-weight-bold text-primary">
              Collapsable Card Example
            </h6>
          </a>
          <!-- Card Content - Collapse -->
          <div class="collapse show" id="collapseCardExample">
            <div class="card-body">
              This is a collapsable card example using Bootstrap's built in
              collapse functionality.
              <strong>Click on the card header</strong> to see the card body
              collapse and expand!
            </div>
          </div>
        </div>
      </div>
    </div>
</template>

<script>
export default {
    name: 'Cards',
    props:['data'],
    mounted(){
      console.log(this.data.type)
    }
}
</script>