import VueCurrencyInput from 'vue-currency-input';
import VCalendar from 'v-calendar';
import Vuelidate from 'vuelidate';
import axios from 'axios';
import Vue from 'vue';
import App from './App.vue';
import router from './router';

Vue.use(Vuelidate);
Vue.prototype.$http = axios;
Vue.config.productionTip = false;

const pluginOptions = {
  globalOptions: { currency: 'CAD' },
};


Vue.use(VueCurrencyInput, pluginOptions);
Vue.use(VCalendar, { componentPrefix: 'vc' });

new Vue({
  router,
  render: h => h(App),
}).$mount('#app');
