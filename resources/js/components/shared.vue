<template>

</template>

<script>
import {loadScript, unloadScript} from "vue-plugin-load-script";
import {Inertia} from "@inertiajs/inertia";

export default {
    name: "shared",
    mounted() {
        loadScript("js/template/jquery/jquery.min.js");
        loadScript("js/template/bootstrap/js/bootstrap.bundle.min.js")
        loadScript("js/template/metismenu/metisMenu.min.js")
        loadScript("js/template/simplebar/simplebar.min.js")
        loadScript("js/template/node-waves/waves.min.js")
        loadScript("js/template/air-datepicker/js/datepicker.min.js")
        loadScript("js/template/air-datepicker/js/i18n/datepicker.en.js")
        loadScript("js/template/apexcharts/apexcharts.min.js")
        loadScript("js/template/jquery-knob/jquery.knob.min.js")
        loadScript("js/template/jqvmap/jquery.vmap.min.js")
        loadScript("js/template/jqvmap/maps/jquery.vmap.usa.js")
        loadScript("https://unicons.iconscout.com/release/v2.0.1/script/monochrome/bundle.js")
        loadScript("js/template/dashboard.init.js")
        loadScript("js/template/app.js");

        Inertia.on("navigate",(event)=>{
            unloadScript("js/template/jquery/jquery.min.js")
            unloadScript("js/template/bootstrap/js/bootstrap.bundle.min.js")
            unloadScript("js/template/metismenu/metisMenu.min.js")
            unloadScript("js/template/simplebar/simplebar.min.js")
            unloadScript("js/template/node-waves/waves.min.js")
            unloadScript("js/template/air-datepicker/js/datepicker.min.js")
            unloadScript("js/template/air-datepicker/js/i18n/datepicker.en.js")
            unloadScript("js/template/apexcharts/apexcharts.min.js")
            unloadScript("js/template/jquery-knob/jquery.knob.min.js")
            unloadScript("js/template/jqvmap/jquery.vmap.min.js")
            unloadScript("js/template/jqvmap/maps/jquery.vmap.usa.js")
            unloadScript("js/template/dashboard.init.js")
            unloadScript("js/template/app.js");
        })
    },
}
</script>

<style scoped>

</style>
