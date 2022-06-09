console.log("Ok Js:)");
require("./bootstrap");

window.axios = require("axios");
// window.Vue = require("vue");
window.axios
    .get("/api/posts")
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
