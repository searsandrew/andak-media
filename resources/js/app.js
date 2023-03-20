import 'intersection-observer';
IntersectionObserver.prototype.POLL_INTERVAL = 100;

import './bootstrap';

import Alpine from 'alpinejs';
import focus from '@alpinejs/focus';
window.Alpine = Alpine;

Alpine.plugin(focus);

Alpine.start();

const targets = document.querySelectorAll(".js-show-on-scroll");
const observer = new IntersectionObserver(callback);
targets.forEach(function(target) {
  target.classList.add("opacity-0");
  observer.observe(target);
});

const callback = function(entries) {
  entries.forEach(entry => {
    if (entry.isIntersecting) {
      entry.target.classList.add("motion-safe:animate-fadeIn");
    } else {
      entry.target.classList.remove("motion-safe:animate-fadeIn");
    }
  });
};