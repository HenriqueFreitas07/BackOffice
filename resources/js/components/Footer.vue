<template>
    <footer class="footer footer-dark " style="background-color: #1d76bb;">
      <div class="container text-center pb-5">
        <b-row>
          <b-col cols="4">
              <h6 style=" text-align:middle; color:white" >Como ajudar</h6>
          </b-col>
          <b-col cols="4">
            <h6 style=" text-align:middle; color:white" >The Big Hand</h6>
          </b-col>
          <b-col cols="4">
            <h6 style=" text-align:middle; color:white" >Mais informações</h6>
          </b-col>
        </b-row>
        <b-row>
          <b-col cols="4">
            <b-row v-for="b in btns" :key="b.id">
                <a class="btn-footer" :href="b.link">
                  {{b.nome}}
                </a>
            </b-row>
          </b-col>
          <b-col cols="4">
            <b-row v-for="l in links" :key="l.id">
                <a class="link-footer" :href="l.link">
                  {{l.nome}}
                </a>
            </b-row>
          </b-col>
          <b-col cols="4">       
            <b-row v-for="l in plus" :key="l.id">
                <a class="link-footer" :href="l.link">
                  {{l.nome}}
                </a>
            </b-row>
          </b-col>
        </b-row>
      </div>
    </footer>
</template>

<script>
export default {
    name: 'Footer',
    data() {
      return{
        btns:[
            {
              id:1,
              nome:"Donativos",
              link:"https://www.thebighand.org/donativos-apadrinhamento/",
            },
            {
              id:2,
              nome:"Apadrinhamento",
              link:"https://www.thebighand.org/donativos-apadrinhamento/?tipo=apadrinhamento",
            },
            {
              id:3,
              nome:"Loja Online",
              link:"https://www.thebighand.org/loja-online/",
            },
          ],
        links:[
            {
              id:1,
              nome:"The Big Hand",
              link:"https://www.thebighand.org/the-big-hand/",
            },
            {
              id:2,
              nome:"O que Fazemos",
              link:"https://www.thebighand.org/o-que-fazemos/",
            },
            {
              id:3,
              nome:"Notícias",
              link:"https://www.thebighand.org/noticias/",
            },
            {
              id:4,
              nome:"Voluntariado",
              link:"https://www.thebighand.org/voluntariado/",
            },
            {
              id:5,
              nome:"Loja Online",
              link:"https://www.thebighand.org/loja-online/",
            },
          ],
        plus:[
            {
              id:1,
              nome:"FAQ's",
              link:"https://www.thebighand.org/faqs/",
            },
            {
              id:2,
              nome:"Política de Proteção de Crianças",
              link:"https://www.thebighand.org/politica-de-protecao-de-crianca/",
            },
            {
              id:3,
              nome:"Política de Privacidade",
              link:"https://www.thebighand.org/politica-de-privacidade/",
            },
            {
              id:4,
              nome:"Termos e Condições ",
              link:"https://www.thebighand.org/termos-e-condicoes/",
            },
          ]
      }
    },
}
</script>