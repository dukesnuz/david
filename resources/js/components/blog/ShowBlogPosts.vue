<template>
  <div class="inner-content flex-container">
    <div class="blog-categories">
      <h4>Categories</h4>
      <ul>
        <li v-for="category in categorys" v-bind:key="category.id">{{ category.categorys }}</li>
      </ul>
    </div>

    <div class="blog-post">
      <h1>Blog Posts About Website Development and Technology</h1>
      <ul v-for="post in posts" v-bind:key="post.id" class="posts">
        <li class="blog-subject">{{ post.subject }}</li>
        <li v-html="post.body.substring(0,20)" class="blog-post-body"></li>
        <li>
          <a :href="`${post.id}/cat/slug`">
            <button type="button" class="btn btn-info">Read More</button>
          </a>
        </li>
      </ul>
    </div>
    <LeftSideBar />
  </div>
</template>

<script>
import LeftSideBar from "../aside/LeftSideBar.vue";

export default {
  components: {
    LeftSideBar
  },

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
      let url = "/api/show-live-blog-posts";
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
  width: 98%;
  font-size: 1.5em;
  margin-left: 1%;
  margin-right: 1%;
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
  .blog-categories {
    margin-left: 2%;
    margin-right: 2%;
  }
@media only screen and (min-width: 376px) {
  .blog-post {
    width: 80%;
    margin: 0;
  }
  .flex-container {
    display: flex;
    flex-direction: row;
    justify-content: space-between;
  }
  .blog-categories {
    margin:0;
    margin-right: 25px;
  }
}
</style>