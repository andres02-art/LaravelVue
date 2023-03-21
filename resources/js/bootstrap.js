import * as bootstrap from 'bootstrap';

import _ from 'lodash';

import swal from 'sweetalert2';

/**
 * We'll load the axios HTTP library which allows us to easily issue requests
 * to our Laravel back-end. This library automatically handles sending the
 * CSRF token as a header based on the value of the "XSRF" token cookie.
 */
import jquery from 'jquery';


window.$ = jquery;

import axios from 'axios';
import * as Table from 'datatables.net-bs5';
import 'datatables.net-bs5'

window.bootstrap = bootstrap;
window.tables = Table;
console.log(window.tables)
window._ = _;
window.swal = swal;
window.axios = axios;

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

const csrf = window.document.head.querySelector('meta[name="csrf-token"]').attributes.content.value;
if (!csrf) {
    console.error('No existe ningun token');
}else{
    window.axios.defaults.headers.common['X-CSRF-TOKEN'] = csrf;
}

/**
 * Echo exposes an expressive API for subscribing to channels and listening
 * for events that are broadcast by Laravel. Echo and event broadcasting
 * allows your team to easily build robust real-time web applications.
 */

// import Echo from 'laravel-echo';

// import Pusher from 'pusher-js';
// window.Pusher = Pusher;

// window.Echo = new Echo({
//     broadcaster: 'pusher',
//     key: import.meta.env.VITE_PUSHER_APP_KEY,
//     wsHost: import.meta.env.VITE_PUSHER_HOST ?? `ws-${import.meta.env.VITE_PUSHER_APP_CLUSTER}.pusher.com`,
//     wsPort: import.meta.env.VITE_PUSHER_PORT ?? 80,
//     wssPort: import.meta.env.VITE_PUSHER_PORT ?? 443,
//     forceTLS: (import.meta.env.VITE_PUSHER_SCHEME ?? 'https') === 'https',
//     enabledTransports: ['ws', 'wss'],
// });
