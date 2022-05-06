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
                            'https://www.thebighand.org/wp-content/uploads/2019/05/' +
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
                        <pre class="mt-3 mb-0">{{ description }}</pre>
                    </b-form-textarea>
                    <b-form-datepicker
                        v-else-if="input.type_input == 'date'"
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
                <b-button
                    @click="$router.push('/admin/news')"
                    variant="outline-primary"
                >
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
            title: "",
            description: "",
            image: "",
            is_publish: "",
            date: "",
            inputs: [
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
                    label: "Descrição",
                    property: "description",
                    type_input: "textarea",
                    disabled: false,
                    model: "description"
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
    methods: {
        async Save() {
            const f = {
                title: this.title,
                feature_image: this.image,
                description: this.description,
                is_publish: this.is_publish,
                date: this.date,
                project_id: this.$route.params.news_id
            };
            
            const r = await axios.post(
                "/news/update/" + this.$route.params.news_id,f
            );
            if (r.status == 200) {
                let toast = this.$toasted.show(r.data.message, {
                    theme: "outline",
                    position: "top-center",
                    duration: 1000
                });
                
            }
        }
    },
    async mounted() {
        const response = await axios.get("news/" + this.$route.params.news_id);
        let data = response.data[0];
        this.title = data.title;
        this.image = data.feature_image;
        this.description = data.description;
        this.is_publish = data.is_publish;
        this.date = data.date;
    }
};
</script>

<style lang="scss" scoped></style>
