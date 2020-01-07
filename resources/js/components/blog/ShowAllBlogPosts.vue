<template>
  <div class="inner-content flex-container">
    <div class="blog-post">
      <h1>Blog Posts About Website Development and Technology</h1>
      <ul v-for="post in posts" v-bind:key="post.id" class="posts">
        <li class="blog-subject">{{ post.subject }}</li>
        <li v-html="post.body.substring(0,20)" class="blog-post-body"></li>
        <li v-if="post.is_live">Live</li>
        <li v-else>Not Live</li>
        <li>
          <a :href="`${post.id}/cat/slug`">
            <button type="button" class="btn btn-info">Read More</button>
          </a>
        </li>
      </ul>
    </div>
    <div>
      <h4>Categories</h4>
      <ul class="blog-categories">
        <li v-for="category in categorys" v-bind:key="category.id">{{ category.categorys }}</li>
      </ul>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      message: "",
      posts: {},
      categorys: {}
    };
  },
  mounted() {
    this.getAllBlogPosts();
    this.getCategories();
  },
  methods: {
    getAllBlogPosts() {
      let url = "/api/show-all-blog-posts";
      //fetch(url)
      this.axios
        .get(url)
        // .then(res => res.json())
        .then(res => {
          this.posts = res.data;
          if (this.posts == "") {
            this.message = "OOPpps system error.";
          }
        })
        .catch(err => this.message);
    },
    getCategories() {
      let url = "/api/get-all-blog-categories";
      //fetch(url)
      this.axios
        .get(url)
        // .then(res => res.json())
        .then(res => {
          this.categorys = res.data;

          if (this.categorys == "") {
            this.message = "Please search again. No results found for: ";
          }
        })
        .catch(err => this.message);
    }
  }
};
</script>

<style scoped>
ul {
  list-style: none;
}
ul.posts {
  background-color: #fff;
  padding: 10px;
  margin-bottom: 25px;
  border-radius: 10px;
  width: 100%;
}
ul.blog-categories {
  padding: 0;
}
.blog-category {
  padding-left: 5px;
}
.blog-post {
  width: 100%;
  font-size: 1.5em;
}
.blog-subject {
  font-weight: bold;
  font-size: 1.25em;
  padding-left: 5px;
}
.blog-post-body {
  margin: 5px 0;
  padding-left: 5px;
}
.btn.btn-info {
  margin: 5px;
  color: #fff;
}
@media only screen and (min-width: 320px) {
  .blog-post {
    width: 80%;
  }
  .flex-container {
    display: flex;
    flex-direction: row;
    justify-content: space-between;
  }
}
</style>