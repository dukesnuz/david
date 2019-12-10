<template>
  <div class="blog-inner-content">
    <div class="blog-subject">{{ post.subject}}</div>
    <div class="blog-body" v-html="post.body"></div>
    <ul class="blog-tags">
      <li>Tags:</li>
      <li v-bind:key="tag.id" v-for="tag in post.blogtags">{{ tag.name }}</li>
    </ul>
    <div class="clearFix"></div>
    <p class="blog-date">Date posted: {{ new Date(post.created_at) }}</p>

    <div class="comment" v-show="showForm">
      <ul>
        <form v-on:submit.prevent="createComment()">
          <ul>
             <li>
              <label for="new-comment-name">Name</label>
              <input type="text" name="new-comment-name" id="new-comment-name" v-model="newComment.name" />
            </li>
             <li>
              <label for="new-comment-email">Email</label>
              <input type="text" name="new-comment-email" id="new-comment-email" v-model="newComment.email" />
            </li>
            <li>
              <label for="new-comment">Comment</label>
              <input type="text" name="new-comment" id="new-comment" v-model="newComment.comment" />
            </li>
            <li>
              <input type="submit" value="Submit" />
            </li>
          </ul>
        </form>
      </ul>
    </div>

    <div class="comments">
      <p>{{ messageComments }}</p>
      <ul v-for="comment in comments" v-bind:key="comment.id">
        <li>{{ comment.comment }}</li>
         <li>{{ comment.name }}</li>
          <li>{{ comment.created_at }}</li>
      </ul>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      status: "",
      messageComments: "",
      showForm: true,
      post: {},
      comments: {},
      newComment: {
        name: "name",
        email: "1@1.com",
        comment: "comment",
        pid: this.pid
      }
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
    this.fetchComments();
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
    },
    createComment() {
      if (this.newComment.name == "" || this.newComment.email == "" || this.newComment.comment == "") {
        this.messageComments = "Please enter your name, email and a comment";
        return;
      }

      let uri = `/api/blog-comment-create`;
      this.axios
        .post(uri, this.newComment, {
          headers: {
            "Content-Type": "application/json"
          }
        })
        .then(response => {
          if (response.data.messageReturned === "ok") {
            //  this.newComment = "";
            this.showForm = false;
            this.messageComments = "Thank you for your comment";
            this.fetchComments();
          } else {
            this.message = "OOppss. System error. 2";
          }
        })
        .catch(error => {
          this.message = "OOppss. System error 3. " + error + "";
        });
    },
    fetchComments() {
      let uri = "/api/get-comments/" + this.pid + "";
      this.axios
        .get(uri, {
          headers: {
            "Content-Type": "application/json"
          }
        })
        .then(response => {
          if (response.status == 200) {
            this.comments = response.data;
            console.log(this.comments);
            if(this.comments == "") {
              this.messageComments = "Be the first to leave a comment";
            }
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
.blog-tags {
  margin-top: 20px;
  padding: 0;
}
.blog-tags li {
  float: left;
  margin-right: 5px;
  display: inline-block;
  margin-top: 10px;
  padding-left: 25px;
}
.blog-date {
  margin-top: 20px;
  padding-left: 25px;
}
</style>
