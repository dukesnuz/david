<template>
  <div class="inner-content" :style="{ backgroundImage:'url('+b_image+')'}">
    {{ message }}
    <p class="banner">
      Greetings! </br>Welcome to my blog. I post topics I enjoy and
      hope others will also. Most of my posts will be about transportation and web development.
       If you enjoy this blog feel free to share on social media
    </p>
    <div class="blog-post">
      <h4>Most Recent Blog Post</h4>
      <h5>{{ post.subject }}</h5>
      <p>{{ post.body }}</p>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      post: {},
      message: "",
      b_image: "../images/black-iphone-7-on-brown-table-699122.jpg",
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
.banner {
  margin-left: 5px;
  margin-right: 5px;
  color: #fff;
  font-size: 1.5em;
}
.blog-post {
  color: #fff;
  width: 500px;
  padding: 5px;
}
@media only screen and (min-width: 320px) {
  .blog-post, .banner {
    margin-left: 25px;
  }
.banner{
    margin-right: 50%;
  }
}
</style>
<style>
body {
  background-color: antiquewhite !important;
}
</style>