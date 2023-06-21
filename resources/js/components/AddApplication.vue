<template>
    <div>
        <h3 class="text-center">Add Post</h3>
        <div class="row">
            <div class="col-md-6">
                <form @submit.prevent="addApp">
                    <div class="form-group">
                        <label>App Title</label>
                        <input type="text" class="form-control" v-model="app.title">
                    </div>
                    <div class="form-group">
                        <label>App Description</label>
                        <input type="text" class="form-control" v-model="app.description">
                    </div>
                    <div class="form-group">
                        <label>App Development Status</label>
                        <select class="form-control" v-model="app.development_status">
                            <option value=""></option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>App Developer</label>
                        <input type="text" class="form-control" v-model="app.developer">
                    </div>
                    <div class="form-group">
                        <label>App Deployment</label>
                        <input type="date" class="form-control" v-model="app.deployment">
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
                app: {}
            }
        },
        methods: {
            addApp() {
  
                this.axios
                    .post('http://127.0.0.1:8000/api/add/application', this.app)
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