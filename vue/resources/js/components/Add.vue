<template>
  <div class="container">
    <form
      @submit.prevent="AddFood"
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
      <select v-model="food.FoodCategory" class="form-control">
        <option v-for="food in foods" :key="food.id" :value="food.id">
          {{ food.FoodName }}
        </option>
      </select>

      <label
        id="image"
        label="Image:"
        label-for="image"
        style="margin-top: 20px"
        >Food Image</label
      >
      <input type="file" @change="onFileChange" />
      <div id="preview">
        <input type="hidden" v-bind:value="food.url" />
        <img v-if="url" :src="url" />
      </div>

      <input type="submit" value="Submit" style="margin-top: 10px" />
    </form>
  </div>
</template>

<script>
export default {
  data() {
    return {
      // Image Url
      url: null,
      //   Food Information
      food: {},
      //   Food Category
      foods: [],
      //   Food Category Select
      FoodCategory: "",
      //   Food Image Selected
      FoodImage: "",
    };
  },
  created() {
    this.axios.get(`http://localhost:8000/api/AddFood`).then((response) => {
      this.foods = response.data;
    });
  },
  methods: {
    AddFood() {
      this.axios
        .post("http://localhost:8000/api/StoreFood", this.food)
        .then(
          (response) => this.$router.push({ name: "Home" })
          // console.log(response.data)
        )
        .catch((error) => console.log(error))
        .finally(() => (this.loading = false));
    },
    onFileChange(e) {
      const file = e.target.files[0];
      this.url = URL.createObjectURL(file);
    },
  },
};
</script>