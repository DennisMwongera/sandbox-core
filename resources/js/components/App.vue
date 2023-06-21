<template>
    <div class="container">
        <div class="text-center" style="margin: 20px 0px 20px 0px;">
            <span class="text-secondary">Open Institute Sandbox</span>
        </div>
  
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="collapse navbar-collapse">
                <div class="navbar-nav">
                    <router-link to="/" class="nav-item nav-link">Home</router-link>
                    <!-- <router-link to="/posts" class="nav-item nav-link">Posts</router-link> -->
                    <router-link to="/apps" class="nav-item nav-link">Applications</router-link>
                    <!-- <router-link to="/add" class="nav-item nav-link">Add Post</router-link> -->
                    <router-link to="/addApp" class="nav-item nav-link">Add App</router-link>
                    <router-link to="/programmes" class="nav-item nav-link">Programmes</router-link>
                </div>
            </div>
        </nav>
        <br/>
        <router-view></router-view>
    </div>
</template>
  
<script>
    export default {}
</script>