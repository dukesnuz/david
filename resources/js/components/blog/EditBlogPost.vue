<template>
  <div class="blog-inner-content">
    <div class="edit-post">
      <h3>Edit This Blog Post</h3>
      {{ message }}
      {{ status }}
      <editor
        api-key="8fvbyqp6y3crcp6loaupiilair2atyyfei80ao20yezogbuv"
        cloud-channel="5"
        :disabled="false"
        id="uuid"
        :init="{plugins: 'link, wordcount, image', default_link_target: '_blank'}"
        initial-value
        model-events
        plugins
        tag-name="div"
        toolbar
        value
        v-model="post.body"
      ></editor>

      <form v-on:submit.prevent="editPost()">
        <ul>
          <li>
            <label for="blog-category">Category</label>
            <select v-model="post.category" name="category" id="blog-category">
              <option></option>
              <option
                v-bind:key="category.id"
                v-for="category in categories"
              >{{ category.categories }}</option>
            </select>
          </li>

          <li>
            <label for="blog-subject">Subject</label>
            <input type="text" name="subject" id="blog-subject" v-model="post.subject" />
          </li>
          <li>
            <input type="hidden" name="body" v-model="post.body" />
          </li>
          <li>
            <input type="submit" value="Submit" />
          </li>
        </ul>
      </form>

      <ul>
        <li v-if="post.is_live ">Post Live</li>
        <li v-else>Post Not Live</li>
      </ul>

      <p v-on:click="makeLive(post.id, post.is_live)">
        <button>Make Live</button>
      </p>
    </div>

    <div class="comments">
      <h3>Approve Comments</h3>
      <p>{{ messageComments }}</p>
      <ul v-for="comment in comments" v-bind:key="comment.id">
        <li v-if="comment.is_live">Live</li>
        <li v-else>Not Live</li>
        <li>{{ comment.comment }}</li>
        <li>{{ comment.email.name }}</li>
        <li>{{ comment.email.email }}</li>
        <li>{{ comment.created_at }}</li>
        <li v-on:click="editComment(comment.id, comment.is_live)">
          <button>Approve</button>
        </li>
      </ul>
    </div>
  </div>
</template>

<script>
import Editor from "@tinymce/tinymce-vue";
export default {
  name: "app",
  components: {
    editor: Editor
  },
  data() {
    return {
      response: {},
      message: "",
      messageComments: "",
      status: "",
      categories: [],
      tags: [],
      post: {
        category: "",
        subject: "",
        body: ""
      },
      comments: {}
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
  mounted() {
    this.getCategories();
    this.getTags();
  },
  methods: {
    getCategories() {
      let url = "/api/get-all-blog-categories";
      this.axios
        .get(url)
        .then(res => {
          this.categories = res.data;
          if (this.categories == "") {
            this.message = "Error. No results found for: ";
          }
        })
        .catch(err => this.message);
    },
    getTags() {
      let url = "/api/get-all-blog-tags";
      this.axios
        .get(url)
        .then(res => {
          this.tags = res.data;
          return this.tags;
          if (this.tags == "") {
            this.message = "OOppss Error no tags found: ";
          } else {
            this.message = "";
          }
        })
        .catch(err => this.message);
    },
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
            this.message = "OOppss! System error 1. We apologize.";
            this.data = null;
          }
          if (response.data.messageReturned == "error") {
            this.message = "OOppss! System error 2. We apologize.";
          }
        })
        .catch(error => {
          this.message = "OOpps. Error 3."; //error.response;
        });
    },
    editPost() {
      if (
        this.post.subject == "" ||
        this.post.body == "" ||
        this.post.category == ""
      ) {
        this.message = "Please enter a subject, body and category";
        return;
      }

      let uri = "/api/edit-post/" + this.pid + "";
      this.axios
        .post(uri, this.post, this.post.category, {
          headers: {
            "Content-Type": "application/json"
          }
        })
        .then(response => {
          if (response.data.messageReturned === "ok") {
            this.message = "Post was updated";
          } else {
            this.message = "OOppss. System error 2. Did you enter a category?";
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
            if (this.comments == "") {
              this.messageComments = "No comments";
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
    },
    editComment(id, status) {
      this.messageComments = "";
      let uri = "/api/edit-comment-status/" + id + "/" + status + "";
      this.axios
        .post(uri, this.comments, {
          headers: {
            "Content-Type": "application/json"
          }
        })
        .then(response => {
          if (response.data.messageReturned === "ok") {
            this.messageComments = "Comment was updated.";
            this.fetchComments();
          } else {
            this.messageComments =
              "OOppss. System error 2. Did you change a comment status?";
          }
        })
        .catch(error => {
          this.messageComments = "OOppss. System error 3. " + error + "";
        });
    },
    makeLive(id, status) {
      this.message = "";
      let uri = "/api/edit-post-status/" + id + "/" + status + "";
      this.axios
        .post(uri, this.post, {
          headers: {
            "Content-Type": "application/json"
          }
        })
        .then(response => {
          if (response.data.messageReturned === "ok") {
            this.message = "Post status was updated.";
            this.fetchPost();
          } else {
            this.message =
              "OOppss. System error 2. Did you change a post status?";
          }
        })
        .catch(error => {
          this.message = "OOppss. System error 3. " + error + "";
        });
    }
  }
};
</script>

<style scoped>
ul {
  list-style: none;
  padding: 0;
}
form {
  margin-top: 15px;
}
#blog-subject {
  width: 700px;
}
input[type="text"],
select {
  display: block;
}
.clear {
  clear: both;
}
.comments ul {
  background-color: #fff;
  padding: 10px;
}
</style>
