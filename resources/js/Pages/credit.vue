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
                                <h4 class="page-title mb-1">Ongoing Loans</h4>
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
                            <div class="col-xl-12">
                                <div class="card">
                                    <div class="card-body">
                                        <button style = "text-align:right,float:right;" class = "btn btn-success">Generate Financial Report</button><br>
                                        <button style="text-align:right;float:right" class = "btn btn-info">New</button>
                                        <h4 class="header-title">Loans</h4>
                                        <p class="card-title-desc">Review Loans and credits you are on. Pay them early to boost your credit score
                                        </p>
                                        <div class="table-responsive">
                                            <table class="table mb-0">
                                                <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Creditor</th>
                                                    <th>Amount</th>
                                                    <th>Due</th>
                                                    <th>Mark As Paid</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <tr v-for="(x,key) in [1,2,3]">
                                                    <th scope="row"> {{ key+1 }} </th>
                                                    <td>Sona Microfinance</td>
                                                    <td>&#8358; 200,000.00</td>
                                                    <td>21 Aug 2023</td>
                                                    <td><a class = "btn btn-success" href = "#">Mark As Paid</a></td>
                                                </tr>

                                                </tbody>
                                            </table>
                                        </div>

                                    </div>
                                </div>
                            </div>

                        </div>
                        <!-- end row -->

                    </div>
                    <!-- end container-fluid -->
                </div> <br><br>
                <div class = "row">
                    <div class = "col-md-12">
                        <div class = "card">
                            <div class = "card-body">
                                <h5>This is where our customers can manage active loans they have taken. They can use this tas a motivator to repay loans hastily and boost their credit score. In addition to that, there is a button to generate financial report they can use to create a detailed record of their financial and business performance for the month. They can submit this report to credit organisations and FSPs to easily be viewed as credible for a loan or credit.</h5>
                            </div>
                        </div>
                    </div>
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
import {loadScript, unloadScript} from "vue-plugin-load-script"
import {Inertia} from "@inertiajs/inertia";
import Shared from "../components/shared";
import Footer from "../components/footer"
export default {
    name: "credit",
    components: {Shared, Topbar, Sidebar,Head,Footer},

}
</script>

<style scoped>

</style>
