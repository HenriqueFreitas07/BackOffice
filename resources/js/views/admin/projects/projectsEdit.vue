<template>
    <div class="container">
        <div class="row">
            <div class="col-xl-12 my-3 ps-3">
                <h2>{{ title }}</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="image_template rounded d-block">
                    <img
                        :src="
                            'https://www.thebighand.org/wp-content/uploads/2020/05/' +
                                image
                        "
                        class=""
                    />
                </div>
                <br />
                <!-- <b-form-file v-model="image" ref="image" class="mb-2"></b-form-file> -->
            </div>
            <div class="col-md-6">
                <b-form-group
                    v-for="input in inputs"
                    :key="input.id"
                    :label="input.label"
                    label-for="nested-street"
                    label-cols-sm="2"
                    label-align-sm="right"
                >
                    <b-form-input
                        v-if="
                            input.type_input == 'text' ||
                                input.type_input == 'number'
                        "
                        :type="input.type_input"
                        :disabled="input.disabled"
                        id="nested-street"
                        v-model="$data[input.model]"
                    ></b-form-input>

                    <b-form-textarea
                        v-else-if="input.type_input == 'textarea'"
                        id="textarea"
                        v-model="$data[input.model]"
                        placeholder="Enter something..."
                        rows="3"
                        max-rows="6"
                    >
                        <pre class="mt-3 mb-0">{{ story }}</pre>
                    </b-form-textarea>
                    <b-form-datepicker
                    v-else-if="input.type_input== 'date' "
                        id="datepicker-sm"
                        v-model="$data[input.model]"
                        size="sm"
                        locale="pt"
                        class="mb-2"
                    ></b-form-datepicker>
                    <b-form-checkbox
                        v-else-if="input.type_input == 'checkbox'"
                        class="pt-2"
                        v-model="$data[input.model]"
                        value="yes"
                        unchecked-value="no"
                    >
                        Publicar
                    </b-form-checkbox>
                </b-form-group>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-md-12">
                <b-button @click="$router.push('/admin/projects')" variant="outline-primary">
                    Voltar
                </b-button>
                <b-button @click="Save()" variant="primary">
                    Guardar
                </b-button>
            </div>
        </div>
    </div>
</template>

<script>
import axios from "axios";
export default {
    data() {
        return {
            goal: 0,
            raised: 0,
            title: "",
            story: "",
            location: "",
            image: "",
            is_publish: "",
            date: "",
            inputs: [
                {
                    id: 1,
                    label: "Objectivo",
                    property: "goal",
                    type_input: "number",
                    disabled: false,
                    model: "goal"
                },
                {
                    id: 2,
                    label: "Angariado",
                    property: "raised",
                    type_input: "number",
                    disabled: true,
                    model: "raised"
                },
                {
                    id: 3,
                    label: "Título",
                    property: "title",
                    type_input: "text",
                    disabled: false,
                    model: "title"
                },
                {
                    id: 4,
                    label: "História",
                    property: "story",
                    type_input: "textarea",
                    disabled: false,
                    model: "story"
                },
                {
                    id: 5,
                    label: "Localização",
                    property: "location",
                    type_input: "text",
                    disabled: false,
                    model: "location"
                },
                {
                    id: 6,
                    label: "Data",
                    property: "date",
                    type_input: "date",
                    disabled: false,
                    model: "date"
                },
                {
                    id: 7,
                    label: "Estado",
                    property: "is_publish",
                    type_input: "checkbox",
                    disabled: false,
                    model: "is_publish"
                }
            ]
        };
    },
    /* Na escola da Aldeia de Montechimoio as crianças estudam com condiçoes precárias. É urgente ajudar! Construir uma sala de aulda para o pré-escolar é fundamental para que a Equipa Big Hand possa atuar na proteção das crianças em risco. */
    methods: {
        async Save() {
            const r = await axios.post(
                "/projects/update/" + this.$route.params.project_id,
                {
                    title: this.title,
                    goal: this.goal,
                    location: this.location,
                    raised: this.raised,
                    feature_image:this.image,
                    story: this.story,
                    is_publish: this.is_publish,
                    date: this.date,
                    project_id: this.$route.params.project_id
                }
            );
            if(r.status == 200){
              
              let toast = this.$toasted.show(r.data.message, {
                theme: "outline",
                position: "top-center",
                duration: 1000,
              });
            }
        }
    },
    async mounted() {
        const response = await axios.get(
            "projects/" + this.$route.params.project_id
        );
        let data = response.data[0];
        this.title = data.title;
        this.goal = data.goal;
        this.raised = data.raised;
        this.image = data.feature_image;
        this.story = data.story;
        this.location = data.location;
        this.is_publish = data.is_publish;
        this.date = data.date;
    }
};
</script>

<style lang="scss" scoped></style>
