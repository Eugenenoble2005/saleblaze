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
                                        <a style = "text-align:right;" href = "../financial-report" target="_blank" class = "btn btn-success">Generate Financial Report</a><br>
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
                                                                <label for="example-text-input" class="col-md-2 col-form-label">Creditor</label>
                                                                <div class="col-md-10">
                                                                    <input class="form-control" v-model="form.creditor" type="text" id="example-text-input">
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label for="example-search-input" class="col-md-2 col-form-label">Amount</label>
                                                                <div class="col-md-10">
                                                                    <input class="form-control" type="text" v-model="form.amount"  id="example-search-input">
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label for="example-text-input" class="col-md-2 col-form-label">Interest</label>
                                                                <div class="col-md-10">
                                                                    <input class="form-control" v-model="form.interest" type="text" id="example-text-input">
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label for="example-text-input" class="col-md-2 col-form-label">Duration</label>
                                                                <div class="col-md-10">
                                                                    <input class="form-control" v-model="form.duration" type="text" id="example-text-input">
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
                                                    <th>Date Taken</th>
                                                    <th>Maturity</th>
                                                    <th>Mark As Paid</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <tr v-for="(loan,key) in loans">
                                                    <th scope="row"> {{ key+1 }} </th>
                                                    <td>{{loan.creditor_name}}</td>
                                                    <td>&#8358; {{loan.amount.toLocaleString()}}</td>
                                                    <td>{{(new Date(loan.created_at)).toDateString()}}</td>
                                                    <td>{{(new Date(loan.maturity_date)).toDateString()}}</td>
                                                    <td>
                                                        <button class = "btn btn-success" @click="markAsPaid(loan.id,$event)" v-if="loan.repaid == false">Mark As Paid</button>
                                                        <div v-else class="badge badge-primary">Loan Repaid</div>
                                                    </td>
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
    name: "credit",
    components: {Shared, Topbar, Sidebar,Head,Footer},
    props:["loans"],
    setup(){
        let loading = ref(false)
        let form = reactive({
            creditor:"",
            amount:"",
            interest:"",
            duration:""
        })
        function submit(){
            loading.value = true;
            axios.post("/dashboard/loan/create",form).then((res)=>{
                loading.value = false
                if(res.data.state){
                    alertify.success(res.data.message)
                    Inertia.reload({only:["loans"]})
                }
                else{
                    alertify.error(res.data.message);
                }
            }).catch((err)=>{console.log(err.response)})
        }
        function markAsPaid(id,$event)
        {
            $event.target.innerHTML = "Please Wait"
            $event.target.disabled = true
            axios.get(`/dashboard/loan/mark-as-paid/${id}`).then((res)=>{
                console.log(res);
                Inertia.reload({only:["loans"]})
            })
        }
        return {form,submit,loading,markAsPaid}
    }
}
</script>

<style scoped>

</style>
