<template>
  <div class="container">
    <form
      @submit.prevent="UpdateFood"
      method="POST"
      class="form-group"
      enctype="multipart/form-data"
    >
      <label for="Name">Food Name</label>
      <input
        type="text"
        v-model="food.FoodName"
        placeholder="Food Name"
        class="form-control"
      />

      <label for="Price">Food Price</label>
      <input
        type="text"
        v-model="food.FoodPrice"
        placeholder="Food Price"
        class="form-control"
      />

      <label for="FoodCategory">Food Category</label>
      <input
        type="text"
        v-model="food.FoodCategory"
        class="form-control"
        readonly
      />

      <input type="hidden" v-model="food.FoodImage" />

      <input type="submit" value="Update Food" style="margin-top: 10px" />
    </form>
  </div>
</template>

<script>
export default {
  data() {
    return {
      food: {},
    };
  },
  created() {
    this.axios
      .get(`http://localhost:8000/api/EditFood/${this.$route.params.id}`)
      .then((response) => {
        this.food = response.data;
        // console.log(response.data);
      });
  },
  methods: {
    UpdateFood() {
      this.axios
        .post(
          `http://localhost:8000/api/UpdateFood/${this.$route.params.id}`,
          this.food
        )
        .then((response) => {
          this.$router.push({ name: "Home" });
        });
    },
  },
};
</script>