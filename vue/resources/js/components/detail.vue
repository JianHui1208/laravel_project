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
          </tr>
        </thead>
        <tbody>
          <tr v-for="fooddetails in fooddetail" :key="fooddetails.id">
            <td>{{ fooddetails.id }}</td>
            <td>{{ fooddetails.FoodName }}</td>
            <td>RM {{ fooddetails.FoodPrice }}</td>
            <td>{{ fooddetails.FoodImage }}</td>
            <td>{{ fooddetails.FoodCategoryName }}</td>
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
      fooddetail: [],
    };
  },
  created() {
    this.axios.get(`http://localhost:8000/api/FoodDetail/${this.$route.params.id}`).then((response) => {
      this.fooddetail = response.data;
    });
  },
  methods: {

  },
};
</script>