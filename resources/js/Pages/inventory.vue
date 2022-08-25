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
                                <h4 class="page-title mb-1">Goods In Your Inventory <button class="btn btn-outline-success" data-toggle="modal" data-target=".bs-example-modal-center">Add New</button></h4>
                                <!-----Modal----->
                                <div class="modal fade bs-example-modal-center" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title mt-0">Add Item to Inventory</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form @submit.prevent="submit">
                                                    <div class="form-group row">
                                                        <label for="example-text-input" class="col-md-2 col-form-label">Name</label>
                                                        <div class="col-md-10">
                                                            <input class="form-control" v-model="form.name" type="text" id="example-text-input">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="example-search-input" class="col-md-2 col-form-label">Cost</label>
                                                        <div class="col-md-10">
                                                            <input class="form-control" type="number" v-model="form.cost"  id="example-search-input">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="example-search-input" class="col-md-2 col-form-label">Price</label>
                                                        <div class="col-md-10">
                                                            <input class="form-control" type="number" v-model="form.price"  id="example-search-input">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="example-search-input" class="col-md-2 col-form-label">Units</label>
                                                        <div class="col-md-10">
                                                            <input class="form-control" type="number" v-model ="form.units" id="example-search-input">
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">Close</button>
                                                        <button class="btn btn-primary waves-effect waves-light" type="submit" :disabled="loading">{{ loading ? "Please Wait" : "Save"}}</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div><!-- /.modal-content -->
                                    </div><!-- /.modal-dialog -->
                                </div>
                                <!------End Modal---->
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
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">

                                        <h4 class="header-title">Goods</h4>
                                        <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                            <thead>
                                            <tr>
                                                <th>Name</th>
                                                <th>Cost</th>
                                                <th>Price</th>
                                                <th>Units</th>
                                                <th>Profit</th>
                                                <th>Add Unit</th>
                                                <th>Record Sale</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <tr v-for="good in goods">
                                                <td> {{ good.name }} </td>
                                                <td> {{ good.cost}} </td>
                                                <td>{{ good.price }}</td>
                                                <td>{{ good.units }}</td>
                                                <td>2,000,000</td>
                                                <td><button class = "btn btn-primary">Add Unit</button></td>
                                                <td><button class = "btn btn-info">Record Sale</button></td>
                                            </tr>
                                            </tbody>
                                        </table>

                                    </div>
                                </div>
                            </div> <!-- end col -->
                        </div>
                    </div>
                    <!-- end container-fluid -->
                </div><br><br>

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
import {reactive, ref} from "vue";
import {InertiaProgress} from "@inertiajs/progress";
import nprogress from "nprogress";
export default {
    name: "inventory",
    props:["message","error","state","goods"],
    components: {Shared, Topbar, Sidebar,Head,Footer},
    mounted(){
        $(document).ready(function(){$("#datatable").DataTable(),$("#datatable-buttons").DataTable({lengthChange:!1,buttons:["copy","excel","pdf","colvis"]}).buttons().container().appendTo("#datatable-buttons_wrapper .col-md-6:eq(0)")});
    },
    setup(props){
        var loading = ref(false)
        var form = reactive({
            name:"",
            cost:"",
            price:"",
            units:""
        })
        function submit(){
            loading.value = true
            axios.post("/dashboard/inventory/create",form).then((res)=>{
                loading.value = false
                console.log(res)
                if(res.data.state){
                    alertify.success(res.data.message)
                    Inertia.reload({only:['goods']})
                }
            })
        }
        return {submit,form,loading}
    }
}
</script>

<style scoped>

</style>
