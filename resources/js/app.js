require('./bootstrap');

import Alpine from 'alpinejs';
import persist from '@alpinejs/persist';
import intersect from '@alpinejs/intersect';

window.Alpine = Alpine;
Alpine.plugin(persist);
Alpine.plugin(intersect);
Alpine.start();
