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
                <tr v-for="(student, index) in students" :key="student.id">
                    <td>
                        {{ index+1 }}
                    </td>
                    <td>
                        {{ student.FristName }}
                    </td>
                    <td>
                        {{ student.LastName }}
                    </td>
                    <td>
                        {{ student.email }}
                    </td>
                    <td>
                        <span class="badge badge-info">Student</span>
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
                students: [],
            };
        },
        created() {
            this.axios.get(`http://localhost:8000/api/student/users`).then((response) => {
                this.students = response.data;
            });
        },
        methods: {},
    };
</script>