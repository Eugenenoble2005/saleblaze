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
                                <h4 class="page-title mb-1">Your staff</h4>
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
                                        <button style="text-align:right;float:right" class = "btn btn-info" data-toggle="modal" data-target=".bs-example-modal-center">New</button>
                                        <div class="modal fade bs-example-modal-center" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title mt-0">Add new staff member</h5>
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
                                                                <label for="example-search-input" class="col-md-2 col-form-label">Role</label>
                                                                <div class="col-md-10">
                                                                    <input class="form-control" type="text" v-model="form.role"  id="example-search-input">
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
                                        <div class="modal fade bs-example-modal-center-2" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title mt-0">Pay Salary</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form @submit.prevent="paySalary">
                                                            <div class="form-group row">
                                                                    <label for="example-text-input" class="col-md-2 col-form-label">Amount</label>
                                                                <div class="col-md-10">
                                                                    <input class="form-control" v-model="form2.amount" type="number" id="example-text-input">
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label for="example-text-input" class="col-md-2 col-form-label">Card Information</label>
                                                                <div class="col-md-10">
                                                                    <input class="form-control" v-model="form2.card" type="number" id="example-text-input">
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
                                        <h4 class="header-title">Staff</h4>
                                        <p class="card-title-desc">Manage your staff and employees here.
                                        </p>
                                        <div class="table-responsive">
                                            <table class="table mb-0">
                                                <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Name</th>
                                                    <th>Role</th>
                                                    <th>Pay Salary</th>
                                                    <th>Remove</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <tr v-for="(staff,key) in staffs">
                                                    <th scope="row"> {{ key+1 }} </th>
                                                    <td>{{ staff.name }}</td>
                                                    <td>{{ staff.role }}</td>
                                                    <td><button class = "btn btn-secondary" data-toggle="modal" data-target=".bs-example-modal-center-2">Pay Salary</button></td>
                                                    <td><a class = "btn btn-danger" href = "#">Remove</a></td>
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
export default {
    name: "staff",
    props:["staffs"],
    components: {Shared, Topbar, Sidebar,Head,Footer},
    setup(){
        let loading = ref(false)
        var form = reactive({
            name:"",
            role:"",
        })
        var form2 = reactive({
            amount:"",
            card:""
        })
        function submit(){
            loading.value = true
            axios.post("/dashboard/staff/create",form).then((res)=>{
                loading.value = false
                console.log(res)
                if(res.data.state){
                    alertify.success(res.data.message)
                    Inertia.reload({only:['staffs']})
                }
            })
        }
        function paySalary()
        {
            loading.value = true
            axios.post("/dashboard/staff/salary",form2).then((res)=>{
                loading.value = false
                console.log(res)
                if(res.data.state){
                    alertify.success(res.data.message)
                    Inertia.reload({only:['staffs']})
                }
            }).catch((err)=>{this.loading = false;console.log(err.response)})
        }
        return {submit,form,loading,form2,paySalary}
    }

}
</script>

<style scoped>

</style>
