<template>
    <div :class="estilo" role="alert">
        {{ titulo }}
        <hr>
        <p>{{ detalhes.mensagem }}</p>
        <ul v-if="detalhes.dados">
            <li v-for="e, key in detalhes.dados" :key="key">{{ e[0] }}</li>
        </ul>
    </div>
</template>

<script>
export default {
    props: ['tipo','titulo','detalhes'],
    //detalhes é tudo que ele recebera como erros contidos nos logs, regras
    computed: {
        estilo() {
            return 'alert alert-' + this.tipo
            //concatena com string recebida
        }
    }
}
</script>
