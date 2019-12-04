<template>
  <div>
    <div class="subject">{{ post.subject}}</div>
    <div class="body" v-html="post.body"></div>
    <ul class="tags">
      <li>Tags:</li>
      <li v-bind:key="tag.id" v-for="tag in post.blogtags">{{ tag.name }}</li>
    </ul>
    <div class="clearFix"></div>
    <p class="date">Date posted: {{ new Date(post.created_at) }}</p>
  </div>
</template>

<script>
export default {
  data() {
    return {
      status: "",
      post: {}
    };
  },
  props: {
    pid: {
      type: String,
      default: 0
    }
  },
  created() {
    this.fetchPost();
  },
  methods: {
    fetchPost() {
      let uri = "/api/show-post/" + this.pid + "";
      this.axios
        .get(uri, {
          headers: {
            "Content-Type": "application/json"
          }
        })
        .then(response => {
          if (response.status == 200) {
            this.post = response.data;
            console.log(this.post);
          } else {
            this.status = "OOppss! System error 1. We apologize.";
            this.data = null;
          }
          if (response.data.messageReturned == "error") {
            this.status = "OOppss! System error 2. We apologize.";
          }
        })
        .catch(error => {
          this.status = "OOpps. Error 3."; //error.response;
        });
    }
  }
};
</script>

<style scoped>
.subject {
  background-color: burlywood;
  text-align: center;
  font-size: 2.25em;
  padding: 10%;
  font-weight: bold;
  color: #fff;
}
.body {
  background-color: #fff;
  padding: 25px;
}
.tags {
  margin-top: 20px;
  padding: 0;
}
.tags li {
  float: left;
  margin-right: 5px;
  display: inline-block;
  margin-top: 10px;
  padding-left: 25px;
}
.date {
  margin-top: 20px;
  padding-left: 25px;
}
</style>
