<template>
    <shared/>
    <body data-topbar="colored">

    <!-- Begin page -->
    <div id="layout-wrapper">

        <topbar/>

        <sidebar/>

        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->
        <div class="main-content">

            <div class="page-content">

                <!-- Page-Title -->
                <div class="page-title-box">
                    <div class="container-fluid">
                        <div class="row align-items-center">
                            <div class="col-md-8">
                                <h4 class="page-title mb-1">Dashboard</h4>
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item active">Welcome to saleblaze Dashboard</li>
                                </ol>
                            </div>
                            <div class="col-md-4">
                                <div class="float-right d-none d-md-block">
                                    <div class="dropdown">
                                        <button class="btn btn-light btn-rounded dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="mdi mdi-settings-outline mr-1"></i> Settings
                                        </button>
                                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-animated">
                                            <a class="dropdown-item" href="#">Action</a>
                                            <a class="dropdown-item" href="#">Another action</a>
                                            <a class="dropdown-item" href="#">Something else here</a>
                                            <div class="dropdown-divider"></div>
                                            <a class="dropdown-item" href="#">Separated link</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <!-- end page title end breadcrumb -->

                <div class="page-content-wrapper">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-xl-4">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-6">
                                                <h5>Welcome Back !</h5>
                                                <p class="text-muted">Saleblaze Dashboard</p>

                                                <div class="mt-4">
                                                    <a href="#" class="btn btn-primary btn-sm">View more <i class="mdi mdi-arrow-right ml-1"></i></a>
                                                </div>
                                            </div>

                                            <div class="col-5 ml-auto">
                                                <div>
                                                    <img src="assets/images/widget-img.png" alt="" class="img-fluid">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="header-title mb-4">Monthy sale Report</h5>
                                        <div class="media">
                                            <div class="media-body">
                                                <p class="text-muted mb-2">This month's Sale</p>
                                                <h4>&#8358; {{ (auth.user.total_revenue).toLocaleString()}}</h4>
                                            </div>
                                            <div dir="ltr" class="ml-2">
<!--                                                <input data-plugin="knob" data-width="56" data-height="56" data-linecap=round data-displayInput=false-->
<!--                                                       data-fgColor="#3051d3" value="56" data-skin="tron" data-angleOffset="56"-->
<!--                                                       data-readOnly=true data-thickness=".17" />-->
                                            </div>
                                        </div>
                                        <hr>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-8">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="float-right ml-2">
                                            <a href="#">View all</a>
                                        </div>
                                        <h5 class="header-title mb-4">Latest Sales</h5>

                                        <div class="table-responsive">
                                            <table class="table mb-0">
                                                <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Customer Name</th>
                                                    <th>Good</th>
                                                    <th>Amount</th>
                                                    <th>Units</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <tr v-for="(purchase,key) in sales">
                                                    <th scope="row"> {{ key+1 }} </th>
                                                    <td>{{ purchase?.customer_name }}</td>
                                                    <td>{{purchase.inventory[0].name}}</td>
                                                    <td> &#8358; {{ purchase?.amount.toLocaleString() }}</td>
                                                    <td>{{purchase?.units}}</td>
                                                </tr>

                                                </tbody>
                                            </table>
                                        </div>

                                        <div class="mt-4">
                                            <ul class="pagination pagination-rounded justify-content-center mb-0">
                                                <li class="page-item disabled">
                                                    <a class="page-link" href="#" aria-label="Previous">
                                                        <i class="mdi mdi-chevron-left"></i>
                                                    </a>
                                                </li>
                                                <li class="page-item"><a class="page-link" href="#">1</a></li>
                                                <li class="page-item active"><a class="page-link" href="#">2</a></li>
                                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                                <li class="page-item"><a class="page-link" href="#">4</a></li>
                                                <li class="page-item">
                                                    <a class="page-link" href="#" aria-label="Next">
                                                        <i class="mdi mdi-chevron-right"></i>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end row -->

                        <div class="row">
                            <div class="col-lg-4">
                                <div class="card">
                                    <div class="card-header bg-transparent p-3">
                                        <h5 class="header-title mb-0">Sales Status</h5>
                                    </div>
                                    <ul class="list-group list-group-flush">
                                        <li class="list-group-item">
                                            <div class="media my-2">

                                                <div class="media-body">
                                                    <p class="text-muted mb-2">Number of Sales</p>
                                                    <h5 class="mb-0"> {{ auth.user.total_sales}} </h5>
                                                </div>
                                                <div class="icons-lg ml-2 align-self-center">
                                                    <i class="uim uim-layer-group"></i>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="list-group-item">
                                            <div class="media my-2">
                                                <div class="media-body">
                                                    <p class="text-muted mb-2">Sales Profit </p>
                                                    <h5 class="mb-0 text" :class="{'text-danger':auth.user.total_profit<1, 'text-success':auth.user.total_profit > 1}"> &#8358; {{ auth.user.total_profit}}</h5>
                                                </div>
                                                <div class="icons-lg ml-2 align-self-center">
                                                    <i class="uim uim-analytics"></i>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!-- end row -->

                        <!-- end row -->

                    </div> <!-- container-fluid -->
                </div>
                <!-- end page-content-wrapper -->
            </div>
            <!-- End Page-content -->
            <Footer/>
        </div>
        <!-- end main content-->

    </div>
    <!-- END layout-wrapper -->
    </body>
</template>

<script>
import Sidebar from "../components/sidebar";
import Topbar from "../components/topbar";
import { Head } from "@inertiajs/inertia-vue3";
import  Footer from "../components/footer"
import {loadScript, unloadScript} from "vue-plugin-load-script"
import {Inertia} from "@inertiajs/inertia";
import Shared from "../components/shared";
export default {
    name: "home",
    props:["sales","auth"],
    components: {Shared, Topbar, Sidebar,Head,Footer},

}
</script>

<style scoped>

</style>
