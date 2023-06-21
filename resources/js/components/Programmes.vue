<template>
    <div>
        <h3 class="text-center">All programs</h3><br />

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Lead</th>
                    <th>Support</th>
                    <th>Status</th>
                    <th>Created At</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="program in programmes" :key="program.id">
                    <td>{{ program.title }}</td>
                    <td>{{ program.lead_program_officer }}</td>
                    <td>{{ program.support_department }}</td>
                    <td>{{ program.status }}</td>
                    <td>{{ program.created_at }}</td>
                    <td>
                        <div class="btn-group" role="group">
                            <router-link :to="{ name: 'edit', params: { id: program.id } }" class="btn btn-primary">Edit
                            </router-link>
                            <button class="btn btn-danger" @click="deletePost(program.id)">Delete</button>
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
            programmes: []
        }
    },
    created() {
        this.axios
            .get('http://127.0.0.1:8000/api/programmes')
            .then(response => {
                this.programmes = response.data.programmes;
            });
    },
    methods: {
        deletePost(id) {
            this.axios
                .delete(`http://127.0.0.1:8000/api/post/delete/${id}`)
                .then(response => {
                    let i = this.programlications.map(item => item.id).indexOf(id); // find index of your object
                    this.programlications.splice(i, 1)
                });
        }
    }
}
</script>