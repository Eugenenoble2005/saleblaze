<template>
   <div v-if = "message" class = "alert alert-danger">{{ message }}</div>
</template>

<script>
export default {
    name: "error",
    props:["message"],

}
</script>

<style scoped>

</style>
