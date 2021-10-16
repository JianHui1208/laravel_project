<template>
  <section>
    <h2 class="headerH2">Photo View</h2>
    <div class="nav headerDiv">
      <table class="table table-bordered">
        <thead>
          <tr>
            <th>ID</th>
            <th>Photo</th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="photo in photos" :key="photo.id">
            <td>{{ photo.id }}</td>
            <td>{{ photo.title }}</td>
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
      photos: [],
    };
  },
  created() {
    this.axios.get(`http://localhost:8000/api/AllPhoto`).then((response) => {
      this.photos = response.data;
    });
  },
};
</script>