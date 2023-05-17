import './bootstrap';

// resources/js/app.js
import * as bootstrap from 'bootstrap';
import * as bootstrapIcons from 'bootstrap-icons';
import Chart from 'chart.js/auto';
import zoomPlugin from 'chartjs-plugin-zoom';
import moment from 'moment';
window.Chart = Chart;
window.moment = moment;
Chart.register(zoomPlugin);

window.addEventListener('DOMContentLoaded', event => {

    // Toggle the side navigation
    const sidebarToggle = document.body.querySelector('#sidebarToggle');
    if (sidebarToggle) {
        //Uncomment Below to persist sidebar toggle between refreshes
        if (localStorage.getItem('sb|sidebar-toggle') === 'true') {
            document.body.classList.toggle('sb-sidenav-toggled');
        }
        sidebarToggle.addEventListener('click', event => {
            event.preventDefault();
            document.body.classList.toggle('sb-sidenav-toggled');
            localStorage.setItem('sb|sidebar-toggle', document.body.classList.contains('sb-sidenav-toggled'));
        });
    }
});