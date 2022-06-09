console.log("Ok Js:)");
require("./bootstrap");

window.axios = require("axios");
window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

window.Vue = require("vue");
window.axios
    .get("http://127.0.0.1:8000/api/posts")
    .then((res) => {
        console.log(res);
    })
    .catch((e) => {
        console.log(e);
    });

import AppComponent from "./app/AppComponent";
const app = new Vue({
    el: "#app",
    render: (h) => h(AppComponent),
});
