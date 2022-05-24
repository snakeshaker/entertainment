require('./bootstrap');
require('./admin');
require('./datatable');
require('./cart');
require('./dashboard');
require('./payment');

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();
