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
                <tr v-for="(lecturer, index) in lecturers" :key="lecturer.id">
                    <td>
                        {{ index+1 }}
                    </td>
                    <td>
                        {{ lecturer.FristName }}
                    </td>
                    <td>
                        {{ lecturer.LastName }}
                    </td>
                    <td>
                        {{ lecturer.email }}
                    </td>
                    <td>
                        <span class="badge badge-info">Lecturer</span>
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
                lecturers: [],
            };
        },
        created() {
            this.axios.get(`http://localhost:8000/api/lecturer/users`).then((response) => {
                this.lecturers = response.data;
            });
        },
        methods: {},
    };
</script>