<template>
    <div class="table-responsive">
        <!-- Admin Card Body -->
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>
                        ID
                    </th>
                    <th>
                        Frist Name
                    </th>
                    <th>
                        Last Name
                    </th>
                    <th>
                        Email
                    </th>
                    <th>
                        Roles
                    </th>
                </tr>
            </thead>
            <tbody>
            <!-- v-for="(admin, index) in admins". admins is come from controller -->
                <tr v-for="(admin, index) in admins" :key="admin.id">
                    <td>
                        {{ index+1 }}
                    </td>
                    <td>
                        {{ admin.FristName }}
                    </td>
                    <td>
                        {{ admin.LastName }}
                    </td>
                    <td>
                        {{ admin.email }}
                    </td>
                    <td>
                        <span class="badge badge-info">Admin</span>
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
                admins: [],
            };
        },
        created() {
            this.axios.get(`http://localhost:8000/api/admin/users`).then((response) => {
                this.admins = response.data;
            });
        },
        methods: {},
    };
</script>