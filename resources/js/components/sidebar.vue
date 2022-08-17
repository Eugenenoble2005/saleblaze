<template>
    <shared/>
    <!-- ========== Left Sidebar Start ========== -->
    <div class="vertical-menu">

        <div data-simplebar class="h-100">

            <!--- Sidemenu -->
            <div id="sidebar-menu">
                <!-- Left Menu Start -->
                <ul class="metismenu list-unstyled" id="side-menu">
                    <li class="menu-title">Menu</li>

                    <li>
                        <a href="/dashboard" class="waves-effect">
                            <div class="d-inline-block icons-sm mr-1"><i class="uim uim-airplay"></i></div><span class="badge badge-pill badge-success float-right">3</span>
                            <span>Dashboard</span>
                        </a>
                    </li>

                    <li>
                        <a href="/dashboard/inventory" class=" waves-effect">
                            <div class="d-inline-block icons-sm mr-1"><i class="uim uim-schedule"></i></div>
                            <span>Inventory</span>
                        </a>
                    </li>

                    <li>
                        <a href="/dashboard/staff" class=" waves-effect">
                            <div class="d-inline-block icons-sm mr-1"><i class="uim uim-schedule"></i></div>
                            <span>Staff</span>
                        </a>
                    </li>
                    <li>
                        <a href="calendar.html" class=" waves-effect">
                            <div class="d-inline-block icons-sm mr-1"><i class="uim uim-airplay"></i></div>
                            <span>Purchases</span>
                        </a>
                    </li>
                    <li>
                        <a href="calendar.html" class=" waves-effect">
                            <div class="d-inline-block icons-sm mr-1"><i class="uim uim-schedule"></i></div>
                            <span>Credit</span>
                        </a>
                    </li>

                </ul>

            </div>
            <!-- Sidebar -->
        </div>
    </div>
    <!-- Left Sidebar End -->
</template>

<script>
import {loadScript, unloadScript} from "vue-plugin-load-script";
import {Inertia} from "@inertiajs/inertia";
import Shared from "./shared";

export default {
    name: "sidebar",
    components: {Shared},
}

</script>

<style scoped>

</style>
