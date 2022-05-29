require('./bootstrap');

import Alpine from 'alpinejs';
import persist from '@alpinejs/persist';
import intersect from '@alpinejs/intersect';
import Clipboard from "@ryangjchandler/alpine-clipboard"


window.Alpine = Alpine;
Alpine.plugin(Clipboard)
Alpine.plugin(persist);
Alpine.plugin(intersect);
Alpine.start();
