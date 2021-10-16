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
                        Company Name
                    </th>
                    <th>
                        Content Name
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
                <tr v-for="(company, index) in companies" :key="company.id">
                    <td>
                        {{ index+1 }}
                    </td>
                    <td>
                        {{ company.FristName }}
                    </td>
                    <td>
                        {{ company.LastName }}
                    </td>
                    <td>
                        {{ company.email }}
                    </td>
                    <td>
                        <span class="badge badge-info">Company</span>
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
                companies: [],
            };
        },
        created() {
            this.axios.get(`http://localhost:8000/api/company/users`).then((response) => {
                this.companies = response.data;
            });
        },
        methods: {},
    };
</script>