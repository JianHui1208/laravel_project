import index from './components/index.vue'
import Add from './components/Add.vue'
import AllFood from './components/information.vue'
import Edit from './components/edit.vue'
import Detail from './components/detail.vue'
import Search from './components/search.vue'

export const routes=[
    {
        name: 'Home',
        path: '/',
        component: index
    },
    {
        name: 'AllFood',
        path: '/AllFood',
        component: AllFood
    },
    {
        name: 'AddFood',
        path: '/AddFood',
        component: Add
    },
    {
        name: 'EditFood',
        path: '/EditFood/:id',
        component: Edit
    },
    {
        name: 'FoodDetail',
        path: '/FoodDetail/:id',
        component: Detail
    },
    {
        name: 'FoodSearch',
        path: '/FoodSearch',
        component: Search
    },
]