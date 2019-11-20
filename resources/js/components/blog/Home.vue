<template>
  <div class="inner-content">
    <h3>David's Blog</h3>

    {{ message }}
    <p>
      Welcome to my blog. I coded this using Laravel and Vue.js. I post topics I enjoy and
      home others will also. If you enjoy this blog feel free to share on social media
    </p>

    <p>Most Recent Post</p>
  </div>
</template>

<script>
export default {
  data() {
    return {
      post: "",
      message: ""
    };
  },

  mounted: function() {
    this.search();
  },
  methods: {
    search() {
      console.log(99);
      let url = "/api/get-last-blog-post";
      fetch(url)
        .then(res => res.json())
        .then(res => {
          this.post = res.data;
         console.log('h');
          if (this.post == "") {
            this.message = "Please search again. No results found for: ";
          } else {
            console.log(89);
          }
        })
        .catch(err => this.message);
    }
  }
};
</script>

<style scoped>
.inner-content {
  background-color: aquamarine;
  padding-bottom: 500px;
}
</style>