<template lang="">
    <div class="card rounded">
        <div class="hovered-link text-center">
            <div>
                AJUDE-NOS A AUMENTAR ESTE NÚMERO!
            </div>
            <div class="my-2">
                <a 
                    class="btn btn-warning"
                    href="https://www.thebighand.org/donativos-apadrinhamento/"
                >
                    Apoiar
                </a>
            </div>
        </div>
        <b-img rounded :src="data.img" alt=""></b-img>
        <div class="text-center">
            <h2>
                {{ this.data.title.num }}
            </h2>
            {{ this.data.title.subtitle.toUpperCase() }}
        </div>
    </div>
</template>
<script>
export default {
    props: ["data"]
};
</script>
<style>
.card div {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    color: white;
    text-decoration: uppercase;
    font-size: 0.93rem;
}
.card img {
    filter: brightness(70%);
}
.card:hover .hovered-link
{
    opacity: 1;
}
.hovered-link {
    position: absolute;
    opacity: 0;
    width: 100%;
    height: 100%;
    z-index: 4;
    background-color: rgba(29, 118, 187, 0.9);
    transition: all 0.2s ease-in-out;
}
.hovered-link div {
    position: relative;
    cursor: pointer;
    width: 60%;
}
</style>
