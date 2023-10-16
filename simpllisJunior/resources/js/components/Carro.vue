<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">

                <!-- Inicio Lista -->
                <card-component titulo="Relação de carros">
                    <template v-slot:conteudo>
                        <tabela-component
                            :dados="carros.data"
                            :visualizar="{visivel: false}"
                            :atualizar="{visivel: false}"
                            :remover="{visivel: false}"
                            :titulos="{
                                id: {titulo: 'ID', tipo: 'texto'},
                                marca: {titulo: 'Marca', tipo: 'texto'},
                                created_at: {titulo: 'Criação', tipo: 'data'},
                            }"
                        ></tabela-component>
                    </template>

                    <template v-slot:rodape>
                        <div class="row">


                            <div class="col">
                                <button type="button" class="btn btn-primary btn-sm float-right">Adicionar</button>
                            </div>
                        </div>
                    </template>
                </card-component>
                <!-- Fim Lista -->

            </div>
        </div>

    </div>
</template>

<script>
export default {
    computed: {
        token() {
            //separando valores do cookie
            let token = document.cookie.split(';').find(indice =>{
                //busca busca o token
                return indice.includes('token=')
            })

            //separa apenas o conteudo do token
            token = token.split('=') [1]
            token = 'Bearer ' + token

            //token formado
            return token
        }
    },
    data() {
        return{
            urlBase: 'http://127.0.0.1:8000/api/v1/carro/',
            urlPaginacao: '',
            urlFiltro: '',
            //atributos
            nomeCarro: '',
            //variavel para salvar o estado da instancia do vue
            transacaoStatus: '',
            transacaoDetalhes: {},
            //definindo para vazio, ao invez de indefinido antes do meto assincrono for realizado
            carros: { data: [] },
            busca: { id: '', marca: '' }
        }
    },
    methods: {
        carregarLista() {

            let config = {
                headers: {
                    'Accept': 'application/json',
                    'Authorization': this.token
                }
            }

            let url = this.urlBase + '?' + this.urlPaginacao + this.urlFiltro
            console.log(url)
            axios.get(url, config)
                .then(response => {
                    this.carros = response.data
                })
                .catch(errors => {
                    console.log(errors)
                })
        },
    },
    mounted(){
        this.carregarLista()
    }
}
</script>
