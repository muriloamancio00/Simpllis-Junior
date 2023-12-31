window._ = require('lodash');

try {
    require('bootstrap');
} catch (e) {}

/**
 * We'll load the axios HTTP library which allows us to easily issue requests
 * to our Laravel back-end. This library automatically handles sending the
 * CSRF token as a header based on the value of the "XSRF" token cookie.
 */

window.axios = require('axios');

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

/**
 * Echo exposes an expressive API for subscribing to channels and listening
 * for events that are broadcast by Laravel. Echo and event broadcasting
 * allows your team to easily build robust real-time web applications.
 */

// import Echo from 'laravel-echo';

// window.Pusher = require('pusher-js');

// window.Echo = new Echo({
//     broadcaster: 'pusher',
//     key: process.env.MIX_PUSHER_APP_KEY,
//     cluster: process.env.MIX_PUSHER_APP_CLUSTER,
//     forceTLS: true
// });


//interceptar os requests da aplicação
axios.interceptors.request.use(
    config => {

        //definir para todas as requisições os parametros de accept e autorization
        config.headers.Accept ='application/json'

        //separar e recuperar o token do cookies
        let token = document.cookie.split(';').find(indice =>{
            //busca busca o token
            return indice.includes('token=')
        })

        //separando apenas o conteudo do token
        token = token.split('=') [1]
        token = 'Bearer ' + token

        config.headers.Authorization = token

        console.log('Intercepta o request antes do envio, e inclui cabeçarios', config)
        return config
    },
    error => {
        console.log('Erro na requisição: ', error)
        return Promise.reject(error)
    }
)

//interceptar as respostas depois de retornadas
axios.interceptors.response.use(
    response => {
        return response
    },
    error => {
        if(error.response.status == 401 && error.response.data.message == 'Token has expired'){
console.log('dsdsds')
            //nesse ponto qualquer requisição por meio do axios voltam a receber todas as regras do axios.interceptors.request
            axios.post('http://127.0.0.1:8000/api/refresh/')
                .then(response => {
                    document.cookie = 'token='+response.data.token
                    console.log('Token Atualizado: ', response.data.token)
                    window.location.reload()
                })
        }
        return Promise.reject(error)
    }
)
