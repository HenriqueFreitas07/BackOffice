<template>
    <div>
        <Nav />
        <div class="banner">
            <div>
              <h1>
                O que Fazemos?
              </h1>
            </div>
        </div>


        <div class="container">
          <b-row>
            <b-col cols="12" class=" px-5 my-2">
                The Big Hand acredita que todas as crianças merecem uma oportunidade e que só ajudando todas as crianças da aldeia é possível quebrar o ciclo de pobreza em que vivem. Assim, The Big Hand actua em 3 níveis:
            </b-col>
          </b-row>
          <b-row  class="my-5">
            <b-col cols="2">
              <div class="icon">
                <b-img class="centerAbsolute" src="https://www.thebighand.org/wp-content/uploads/2019/04/icon_criancas_thebighand.png">
                  </b-img>
              </div>
            </b-col>
              <b-col cols="10" class="text-aboutus">
                  <h3>Crianças</h3>
                  A Big Hand acredita que todas as crianças educadas num ambiente saudável serão pessoas, cidadãos. mães e pais mais ativos. Usando todas as suas competências irão trabalhar para melhorar a sua comunidade e construir um mundo melhor. Para atingir este objetivo, o programa da Big Hand proporciona a todas as crianças:
              </b-col>            
            </b-row>
          <b-row class="my-5">
            <b-col cols="2" >
              <div class="icon">
                <b-img class="centerAbsolute" src="https://www.thebighand.org/wp-content/uploads/2019/04/icon_escolas_thebighand.png">
                  </b-img>
              </div>

            </b-col>
              <b-col cols="10" class="text-aboutus">
                <h3>Escolas</h3>
                O programa Escola Amiga da Big Hand procura criar nas escolas as condições necessárias para que a criança possa estudar em segurança e num ambiente acolhedor. É nosso objetivo assegurar o acesso das crianças a bens essenciais como água potável, saneamento básico, cuidados de saúde e nutrição, salas de aula iluminadas e arejadas, assim como dinamizar um plano pedagógico eclético e inclusivo.
              </b-col>            
            </b-row>
          <b-row class="my-5">
            <b-col cols="2" >
              <div class="icon">
                <b-img class="centerAbsolute" src="https://www.thebighand.org/wp-content/uploads/2019/04/icon_comunidades_thebighand.png">
                  </b-img>
              </div>

            </b-col>
              <b-col cols="10" class="text-aboutus">
                <h3>Comunidades</h3>
                Junto das lideranças formais e informais da Aldeia, apoiando os Chefes locais no seu esforço de melhorar as condições de vida da população, construindo equipamentos sociais como furos de água, tanques de lavar roupa e latrinas, apoiando micro-negócios e reforçando o trabalho do Posto Médico local com o apoio e promoção da unidade móvel de Saúde.
              </b-col>            
            </b-row>
            <b-row>
                <b-col cols="12 mb-2">
                    <b-carousel
                        id="carousel-fade"
                        style="text-shadow: 0px 0px 2px #000"
                        fade
                        indicators
                        img-width="1920"
                        img-height="929"
                    >
                        <b-carousel-slide
                            img-src="https://www.thebighand.org/wp-content/uploads/2019/03/gallery_thebighand_2-750x360.jpg"
                        ></b-carousel-slide>
                        <b-carousel-slide
                            img-src="https://www.thebighand.org/wp-content/uploads/2019/02/gallery_6_the_big_hand-750x360.jpg"
                        ></b-carousel-slide>
                    </b-carousel>
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

<style>

</style>
