<template>
  <section class="headerSection">
    <h2 class="headerH2">Menu</h2>
    <div class="nav headerDiv">
      <ul>
        <li v-for="food in foods" :key="food.id">
          <router-link
            :to="{ name: 'FoodDetail', params: { id: food.id } }"
            >{{ food.FoodName }}</router-link
          >
        </li>
      </ul>
    </div>

    <div class="nav headerDiv">
      <form @submit.prevent="FoodSearch" method="get">
        <input type="search" v-model="food.keyword" id="" placeholder="Search for Food Name" class="form-control">
        <br>
        <button type="submit" class="form-control">SearchFood</button>
      </form>
    </div>
  </section>
</template>

<script>
export default {
  data() {
    return {
      foods: [],
      food: {},
    };
  },
  created() {
    this.axios
      .get(`http://localhost:8000/api/FoodCategory`)
      .then((response) => {
        this.foods = response.data;
      });
  },
  methods: {
    FoodSearch(){
      this.axios
      .get("http://localhost:8000/api/SearchFood",this.food)
      .then(
          (response) => this.$router.push({ name: "FoodSearch" })
          // console.log(response.data)
        )
      .catch((error) => console.log(error))
      .finally(() => (this.loading = false));
    }
  },
};
</script>