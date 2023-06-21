<template>
    <div>
        <h3 class="text-center">All Applications</h3><br/>
  
        <table class="table table-bordered">
            <thead>
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Description</th>
                <th>Status</th>
                <th>Developer</th>
                <th>Deployment</th>
                <th>Created At</th>
                <th>Updated At</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="app in applications" :key="app.id">
                <td>{{ app.id }}</td>
                <td>{{ app.title }}</td>
                <td>{{ app.description }}</td>
                <td>{{ app.development_status }}</td>
                <td>{{ app.developer }}</td>
                <td>{{ app.deployment }}</td>
                <td>{{ app.created_at }}</td>
                <td>{{ app.updated_at }}</td>
                <td>
                    <div class="btn-group" role="group">
                        <router-link :to="{name: 'edit', params: { id: app.id }}" class="btn btn-primary">Edit
                        </router-link>
                        <button class="btn btn-danger" @click="deletePost(app.id)">Delete</button>
                    </div>
                </td>
            </tr>
            </tbody>
        </table>
    </div>
</template>
  
<script>
    export default {
        data() {
            return {
                applications: []
            }
        },
        created() {
            this.axios
                .get('http://127.0.0.1:8000/api/applications') 
                .then(response => {
                    this.applications = response.data;
                });
        },
        methods: {
            deletePost(id) {
                this.axios
                    .delete(`http://127.0.0.1:8000/api/post/delete/${id}`)
                    .then(response => {
                        let i = this.applications.map(item => item.id).indexOf(id); // find index of your object
                        this.applications.splice(i, 1)
                    });
            }
        }
    }
</script>