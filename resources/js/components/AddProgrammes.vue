<template>
    <div>
        <h3 class="text-center">Add Program</h3>
        <div class="row">
            <div class="col-md-6">
                <form @submit.prevent="addApp">
                    <div class="form-group">
                        <label>Program Title</label>
                        <input type="text" class="form-control" v-model="program.title">
                    </div>
                    <div class="form-group">
                        <label>Program Description</label>
                        <input type="text" class="form-control" v-model="program.description">
                    </div>
                    <div class="form-group">
                        <label>Program Development Status</label>
                        <select class="form-control" v-model="program.development_status">
                            <option value=""></option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Program Developer</label>
                        <input type="text" class="form-control" v-model="program.developer">
                    </div>
                    <div class="form-group">
                        <label>Program Deployment</label>
                        <input type="date" class="form-control" v-model="program.deployment">
                    </div>
                    <button type="submit" class="btn btn-primary">Add Application</button>
                </form>
            </div>
        </div>
    </div>
</template>
  
<script>
    export default {
        data() {
            return {
                program: {}
            }
        },
        methods: {
            addApp() {
  
                this.axios
                    .post('http://127.0.0.1:8000/api/add/application', this.program)
                    .then(response => (
                        this.$router.push({name: 'applications'})
                        // console.log(response.data)
                    ))
                    .catch(error => console.log(error))
                    .finally(() => this.loading = false)
            }
        }
    }
</script>