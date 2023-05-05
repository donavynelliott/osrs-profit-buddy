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