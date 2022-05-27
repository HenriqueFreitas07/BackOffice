<template>
    <div>
        <Nav />
        <div class="banner">
            <div>
                <h1>
                    The Big Hand
                </h1>
                <h5>
                    Quem somos/Missões/Visões
                </h5>
            </div>
        </div>

        <div class="container">
            <b-row class="my-5">
                <b-col cols="6">
                    <h1  style="color:#1d76bb;">Quem Somos</h1>
                    The Big Hand é uma organização não-governamental para o
                    desenvolvimento que promove o bem-estar das crianças que
                    vivem em condições desfavoráveis, com especial atenção para
                    as meninas órfãs, garantindo o seu acesso à educação,
                    cuidados de saúde e nutrição, a água e saneamento básico.
                    Através de um modelo centrado na criança The Big Hand
                    constrói escolas, investe em equipamentos, na formação de
                    professores e desenvolve, em parceria com os agentes locais,
                    programas inclusivos que visam preparar as crianças para os
                    desafios da vida em estreita ligação com a comunidade onde
                    vivem. <br> <br>
                    The Big Hand é uma instituição transparente nos seus
                    processos, de cidadãos para cidadãos, e está aberta a
                    qualquer pessoa ou entidade que queira ajudar-nos a mudar o
                    mundo.
                </b-col>
                <b-col cols="5" >
                    <b-img style="max-height:300px;" class="imgMocambique" src="https://www.thebighand.org/wp-content/uploads/2019/02/mapa_the_big_hand.png"></b-img>
                    <h3 style="color:#1d76bb;">Moçambique</h3>
                    <h1 style="color:#f8c811;">PROVÍNCIA DE MANICA</h1>
                </b-col>
            </b-row>
            <b-row>
                <div v-for="card in cards" :key="card.id" class="col-md-4 my-2">
                    <cards :data="card"></cards>
                </div>
            </b-row>
        </div>
        <Footer></Footer>
    </div>
</template>

<script>
import Nav from "../../components/Nav";
import Cards from "./cards.vue";
import Footer from "../../components/Footer";

export default {
    name: "Home",
    components: {
        Nav,
        Footer,
        Cards
    },
    data() {
        return {
            cards: [
                {
                    id: 1,
                    title: {
                        num: "7.000",
                        subtitle: "Crianças Beneficiam do Apoio da Bighand"
                    },
                    img:
                        "https://www.thebighand.org/wp-content/uploads/2019/02/o_que_fazemos_home_bighand_1-750x560.jpg"
                },
                {
                    id: 2,
                    title: { num: "15", subtitle: "Salas de Aula" },
                    img:
                        "https://www.thebighand.org/wp-content/uploads/2019/02/o_que_fazemos_home_bighand_2-750x560.jpg"
                },
                {
                    id: 3,
                    title: { num: "10", subtitle: "Salas de Apoio Escolar" },
                    img:
                        "https://www.thebighand.org/wp-content/uploads/2019/02/o_que_fazemos_home_bighand_3-750x560.jpg"
                },
                {
                    id: 4,
                    title: { num: "2", subtitle: "Furos de Água" },
                    img:
                        "https://www.thebighand.org/wp-content/uploads/2019/02/o_que_fazemos_home_bighand_4-750x560.jpg"
                },
                {
                    id: 5,
                    title: {
                        num: "5.562",
                        subtitle: "Consultas de Sáude Materno Infantil"
                    },
                    img:
                        "https://www.thebighand.org/wp-content/uploads/2019/02/o_que_fazemos_home_bighand_5-750x560.jpg"
                },
                {
                    id: 6,
                    title: { num: "8", subtitle: "Bicicletas Ambulância " },
                    img:
                        "https://www.thebighand.org/wp-content/uploads/2019/02/o_que_fazemos_home_bighand_6-750x560.jpg"
                }
            ]
        };
    }
};
</script>

<style></style>
