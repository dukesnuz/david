<template>
  <div>
      <h1>A Blog About Website Developement and Technology</h1>

       {{ message }}
    <p class="blog-banner">
      Greetings! </br>Welcome to my blog. I post topics I enjoy and
      hope others will also. Most of my posts will be about transportation and web development.
      If you enjoy this blog feel free to share on social media
    </p>

      <div class="flex-container">
    <div class="inner-content" :style="{ backgroundImage:'url('+b_image+')'}">
      <div class="blog-post">
        <h4>Most Recent Blog Post</h4>
        <h5>{{ post.subject }}</h5>
        <p v-html="post.body"></p>
        <p>
          <a :href="`${post.id}/cat/slug`">
            <button type="button" class="btn btn-info">Read More</button>
          </a>
        </p>
      </div>
    </div>
     <LeftSideBar/>
  </div>
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
      post: {},
      message: "",
      b_image: "../images/black-iphone-7-on-brown-table-699122.jpg"
    };
  },
  mounted: function() {
    this.search();
  },
  methods: {
    search() {
      let url = "/api/get-last-blog-post";
      fetch(url)
        .then(res => res.json())
        .then(res => {
          this.post = res;
          if (this.post == "") {
            this.message = "OOppss Error 1";
          } else {
          }
        })
        .catch(err => this.message);
    }
  }
};
</script>

<style scoped>
.inner-content {
  padding-bottom: 500px;
}
.blog-banner {
  margin-left: 5px;
  margin-right: 5px;
  margin-bottom: 5px;
  color: #000;
  font-size: 1.5em;
}
.blog-post {
  color: #fff;
  padding: 5px;
}
@media only screen and (min-width: 320px) {
  .blog-banner {
    margin: 0;
    text-align: left;
    font-size: 1.2em;
  }
}
.aside-container {
  margin-left: 0;
  margin-top: 25px;
}
@media only screen and (min-width: 500px) {
  .blog-post,
  .blog-banner {
   margin-bottom: 20px;
  }
   .flex-container {
    display: flex;
    flex-direction: column;
    flex-direction: row;
    justify-content: space-between;
  }
.blog-post{
    padding: 5px;
}
.aside-container {
  margin-top: 0px;
  margin: auto;
}
}
</style>