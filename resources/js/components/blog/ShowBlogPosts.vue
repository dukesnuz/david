<template>
  <div class="inner-content">
    <h3>Recent Blog Posts</h3>
    <ul v-for="post in posts" v-bind:key="post.id">
      <li class="category">{{ post.category }}</li>
      <li class="subject">{{ post.subject }}</li>
      <li v-html="post.body" class="body"></li>
      <li class="tags">{{ post.tags }}</li>
    </ul>
  </div>
</template>

<script>
export default {
  data() {
    return {
      message: "",
      posts: {}
    };
  },
  mounted() {
    this.getCategories();
  },
  methods: {
    getCategories() {
      let url = "/api/show-all-blog-posts";
      //fetch(url)
      this.axios
        .get(url)
        // .then(res => res.json())
        .then(res => {
          this.posts = res.data;
          console.log(this.posts);

          if (this.posts == "") {
            this.message = "OOPpps system error.";
          }
        })
        .catch(err => this.message);
    }
  }
};
</script>

<style scoped>
.inner-content {
  margin-bottom: 500px;
}
ul{
    list-style: none;
}
.category {
}
.subject {
}
.body {
}
.tags {
}
</style>