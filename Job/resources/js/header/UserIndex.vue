<template>
    <div>
        <div class="card-header row" style="margin-left: 0px; margin-right: 0px;">
            <div class="col-sm-3" style="text-align: center;"><router-link to="/admin/users" class="nav-item nav-link">Admins List</router-link></div>
            <div class="col-sm-3" style="text-align: center;"><router-link to="/student/users" class="nav-item nav-link">Students List</router-link></div>
            <div class="col-sm-3" style="text-align: center;"><router-link to="/company/users" class="nav-item nav-link">Company List</router-link></div>
            <div class="col-sm-3" style="text-align: center;"><router-link to="/lecturer/users" class="nav-item nav-link">Lecturers List</router-link></div>
        </div>
        <div class="card-body">
            <router-view></router-view>
        </div>
    </div>
</template>
 
<script>
    export default {}
</script>