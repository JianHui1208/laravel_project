import admin from './components/admin.vue'
import student from './components/student.vue'
import lecturer from './components/lecturer.vue'
import company from './components/company.vue'

export const routes=[
    {
        name: 'admin',
        path: '/admin/users',
        component: admin
    },
    {
        name: 'student',
        path: '/student/users',
        component: student
    },
    {
        name: 'company', 
        path:'/company/users', 
        component: company
    },
    {
        name: 'lecturer',
        path:'/lecturer/users',
        component: lecturer
    }
]