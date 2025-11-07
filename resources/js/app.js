import { createApp } from "vue";
import Search  from "./components/Search.vue";

const app = createApp();
app.component('search', Search);

app.mount('#search');
