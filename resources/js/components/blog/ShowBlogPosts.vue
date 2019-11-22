<template>
  <div class="inner-content flex-container">
    <div>
      <h3>Recent Blog Posts</h3>
      <ul v-for="post in posts" v-bind:key="post.id" class="posts">
        <li class="category">{{ post.category }}</li>
        <li class="subject">{{ post.subject }}</li>
        <li v-html="post.body" class="body"></li>
        <li class="tags-wrapper">
          Tags:
          <ul class="tags">
            <li v-for="tag in post.blogtags" v-bind:key="tag.id">{{ tag.name }}</li>
          </ul>
        </li>
      </ul>
    </div>
    <div>
      <h4>Categories</h4>

      <ul class="categories">
        <li v-for="category in categorys" v-bind:key="category.id">{{ category.categories }}</li>
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
          console.log(this.posts);

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
          console.log(this.categorys[0]["categories"]);

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
.inner-content {
  margin-bottom: 500px;
}
ul {
  list-style: none;
}

ul.posts {
  background-color: #fff;
  padding: 10px;
  margin-bottom: 25px;
  border-radius: 10px;
  width: 100%;
  padding-left: 0px;
}
ul.categories {
  padding: 0;
}
.tags-wrapper {
}
.tag-wrapper ul {
}
.tags {
}
.tags ul {
}
.tags li {
}
.category {
  padding-left: 5px;
}
.subject {
  font-weight: bold;
  font-size: 1.25em;
  padding-left: 5px;
}
.body {
  padding-left: 5px;
}
@media only screen and (min-width: 320px) {
  .inner-content {
    background-color: cadetblue;
  }
  .flex-container {
    display: flex;
    flex-direction: row;
    justify-content: space-between;
  }
}
</style>