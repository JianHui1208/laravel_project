<template>
  <section>
    <h2 class="headerH2">Food Searchs</h2>
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
          <tr v-for="foodsearchs in foodsearch" :key="foodsearchs.id">
            <td>{{ foodsearchs.id }}</td>
            <td>{{ foodsearchs.FoodName }}</td>
            <td>RM {{ foodsearchs.FoodPrice }}</td>
            <td>{{ foodsearchs.FoodImage }}</td>
            <td>{{ foodsearchs.FoodCategoryName }}</td>
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
      foodsearch: [],
    };
  },
  created() {
    this.axios.get(`http://localhost:8000/api/FoodSearch`)
    .then((response) => {
      this.foodsearch = response.data;
    });
  },
  methods: {

  },
};
</script>