<template>
  <section>
    <h2 class="headerH2">Food Detail</h2>
    <div class="nav headerDiv">
      <table class="table table-bordered">
        <thead>
          <tr>
            <th>ID</th>
            <th>Food Name</th>
            <th>Food Price</th>
            <th>Food Image</th>
            <th>Food Category</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="AllFood in Allfoods" :key="AllFood.id">
            <td>{{ AllFood.id }}</td>
            <td>{{ AllFood.FoodName }}</td>
            <td>RM {{ AllFood.FoodPrice }}</td>
            <td>{{ AllFood.FoodImage }}</td>
            <td>{{ AllFood.FoodCategoryName }}</td>
            <td>
              <div class="btn-group" role="group">
                <router-link
                  :to="{ name: 'EditFood', params: { id: AllFood.id } }"
                  class="btn btn-primary"
                  >Edit
                </router-link>
                <button class="btn btn-danger" @click="DeleteFood(AllFood.id)">
                  Delete
                </button>
              </div>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
  </section>
</template>

<script>
export default {
  data() {
    return {
      Allfoods: [],
    };
  },
  created() {
    this.axios.get(`http://localhost:8000/api/AllFood`).then((response) => {
      this.Allfoods = response.data;
    });
  },
  methods: {
    DeleteFood(id) {
      this.axios
        .delete(`http://localhost:8000/api/DeleteFood/${id}`)
        .then((response) => {
          let i = this.Allfoods.map((item) => item.id).indexOf(id); // find index of your object
          this.Allfoods.splice(i, 1);
        });
    },
  },
};
</script>