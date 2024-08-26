<script>
export default {
    data(){
        return {
            name: '',
            img: ''
        };
    }
}
</script>
<template>
    <section class="vh-100 w-100">
        <div class="container py-5 h-100">
            <div class="row justify-content-center align-items-center h-100">
                <div class="col-12 w-50 col-xl-7">
                    <div class="card shadow-lg card-registration" style="border-radius: 15px;">
                        <div class="card-body p-4 p-md-5">
                            <h3 class="mb-2 pb-2 pb-md-0 mb-md-5">Create new category</h3>
                            <form class="d-flex flex-column">

                                <div class="row">
                                    <div class="mb-2">

                                        <div data-mdb-input-init class="form-outline">
                                            <label class="form-label" for="title">Name</label>
                                            <input type="text" id="name" class="form-control form-control-lg" />
                                        </div>

                                    </div>
                                </div>


                                <div class="row">
                                    <div class="mb-2 pb-2">

                                        <div data-mdb-input-init class="form-outline">
                                            <label class="form-label" for="img">Image</label>
                                            <input type="file" id="img" class="form-control form-control-lg" />
                                        </div>

                                    </div>
                                </div>

                                <div class="mt-4 pt-2">
                                    <input data-mdb-ripple-init class="btn btn-primary btn-lg" type="submit" value="Submit" />
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>
<style scoped>

</style>
