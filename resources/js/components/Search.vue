<template>
  <div>search</div>
</template>

<script>
export default {
  mounted() {
    console.log("Component mounted.");
  },
  created() {
    this.fetchLinks();
  },
  methods: {
    fetchLinks() {
      fetch(`api/search/laravel`)
        .then(res => res.json())
        .then(res => {
          console.log(res.data);
        });
    }
  }
};
</script>
