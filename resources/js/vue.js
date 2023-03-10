
import axios from 'axios';
import _ from 'lodash';
import * as bootstrap from 'bootstrap';
import swal from 'sweetalert2';
import jquery from 'jquery';
import * as vue from 'vue';


window.axios = axios;
window.$ = jquery;
window.swal = swal;
window.bootstrap = bootstrap;
window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';
window.$ = jquery;
window.Vue = vue;
