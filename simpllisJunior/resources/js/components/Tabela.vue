<template>
    <div>
        <table class="table table-hover">
            <thead>
            <tr>
                <th scope="col" v-for="t, key in titulos" :key="key">{{ t.titulo }}</th>
                <!--      Crud / valor VISIVEL passado pelo component           -->
                <th v-if="visualizar.visivel || atualizar.visivel || remover.visivel"></th>
            </tr>
            </thead>

            <tbody>
            <!-- Loop através dos objetos na lista de dados filtrados -->
                <tr v-for="obj, chave in dadosFiltrados" :key="chave">
                    <!-- Loop através dos valores dentro de cada objeto -->
                    <td v-for="valor, chaveValor in obj" :key="chaveValor">
                        <!-- Renderiza o valor de acordo com o tipo definido nos títulos -->
                        <span v-if="titulos[chaveValor].tipo == 'text'">{{ valor }}</span>
                        <span v-if="titulos[chaveValor].tipo == 'int'">{{ valor }}</span>
                        <span v-if="titulos[chaveValor].tipo == 'data'">{{ valor }}</span>
                    </td>
                    <!-- Se uma das ações é visível, renderiza os botões -->
                    <td v-if="visualizar.visivel || atualizar.visivel || remover.visivel">
                        <!-- (se visualizar visível) -->
                        <button v-if="visualizar.visivel" class="btn btn-outline-primary btn-sm"
                                :data-toggle="visualizar.dataToggle" :data-target="visualizar.dataTarget"
                                @click="setStore(obj)">
                            Visualizar
                        </button>
                        <!-- (se atualizar visível) -->
                        <button v-if="atualizar.visivel" class="btn btn-outline-dark btn-sm"
                                :data-toggle="atualizar.dataToggle" :data-target="atualizar.dataTarget"
                                @click="setStore(obj)">
                            Atualizar
                        </button>
                        <!-- (se remover visível) -->
                        <button v-if="remover.visivel" class="btn btn-outline-danger btn-sm"
                                :data-toggle="remover.dataToggle" :data-target="remover.dataTarget" @click="setStore(obj)">
                            Remover
                        </button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
export default {
    props: ['dados', 'titulos', 'visualizar', 'atualizar', 'remover'],
    methods: {
        setStore(obj) {

        }
    },
    computed: {
        dadosFiltrados() {
            // Esta função filtra os dados com base nos campos especificados em this.titulos.
            let campos = Object.keys(this.titulos)
            // Array que armazena os dados
            let dadosFiltrados = []

            this.dados.map((item, chave) => { //chave é o indice de cada um dos elementos / objt
                //novo obj para armazenar itemFiltrado
                let itemFiltrado = {}
                campos.forEach(campo => { //campos a serem apresentados
                    itemFiltrado[campo] = item[campo] //adição de indices, dentro de um indice do objeto
                })
                dadosFiltrados.push(itemFiltrado)

            })
            return dadosFiltrados // retornando um array de objetos
        }
    }
}
</script>
