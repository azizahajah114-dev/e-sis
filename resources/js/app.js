import './bootstrap';
import { createIcons, icons } from 'lucide';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

document.addEventListener("DOMContentLoaded", () => {
    createIcons({ icons });
});

Alpine.start();
