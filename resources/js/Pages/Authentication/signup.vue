<template>
    <div class="account-pages my-5 pt-sm-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="text-center mb-5">
                        <a class="logo"><img :src="logo" height="40" alt="logo"></a>
                        <h5 class="font-size-16 text-white-50 mb-4">Become financially included!</h5>
                    </div>
                </div>
            </div>
            <!-- end row -->

            <div class="row justify-content-center">
                <div class="col-xl-5 col-sm-8">
                    <div class="card">
                        <div class="card-body p-4">
                            <div class="p-2">
                                <h5 class="mb-5 text-center">Register Account to Saleblaze.</h5>
                                <form class="form-horizontal" @submit.prevent="submit" autocapitalize="off">

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group form-group-custom mb-4">
                                                <input type="text" class="form-control"
                                                       v-model="form.shop_name" id="" required>
                                                <label for="username">Shop name</label>
                                                <error :message="errors.shop_name"/>
                                            </div>
                                            <div class="form-group form-group-custom mb-4">
                                                <input type="email" class="form-control"
                                                       v-model="form.email" id="" required>
                                                <label for="useremail">Email</label>
                                                <error :message="errors.email"/>
                                            </div>
                                            <div class="form-group form-group-custom mb-4">
                                                <input type="password" class="form-control"
                                                       v-model="form.password" id="" required>
                                                <label for="userpassword">Password</label>
                                                <error :message="errors.password"/>
                                            </div>
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="term-conditionCheck">
                                                <label class="custom-control-label font-weight-normal" for="term-conditionCheck">I accept <a href="#" class="text-primary">Terms and Conditions</a></label>
                                            </div>
                                            <div class="mt-4">
                                                <button :disabled="loading" class="btn btn-success btn-block waves-effect waves-light" type="submit">{{ loading ? "Please Wait..." : "Submit"}}</button>
                                            </div>
                                            <div class="mt-4 text-center">
                                                <Link href="login" class="text-muted"><i class="mdi mdi-account-circle mr-1"></i> Already have account?</Link>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end row -->
        </div>
    </div>
</template>
<script>
import {reactive, ref} from "vue";
import {Inertia} from "@inertiajs/inertia";
import Error from "../../components/error";

export default {
    name:"signup",
    components: {Error},
    props:["logo","errors"],
    setup(){
        let loading = ref(false)
        let form = reactive({
            shop_name:"",
            email:"",
            password:""
        })
        function submit(){
            loading.value = true
            Inertia.post("register",form,{
                onFinish:()=>{
                    loading.value=false
                }
            });
        }
        return {form,submit,loading}
    }
}
</script>
