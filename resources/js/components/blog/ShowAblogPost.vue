<template>
  <div class="blog-inner-content">
    <h1>The Category is: {{ post.blogcategory.categorys }}</h1>
    <div class="blog-subject">{{ post.subject }}</div>
    <div class="blog-body" v-html="post.body"></div>
    <ul class="blog-tags">
      <li>Tags:</li>
      <li v-bind:key="tag.id" v-for="tag in post.blogtags">{{ tag.name }}</li>
    </ul>
    <div class="clearFix"></div>
    <p class="blog-date">Date posted: {{ new Date(post.created_at) }}</p>

    <div class="social-media">
      <social-sharing
        :url="getUrl()"
        :title="post.subject"
        :description="post.subject"
        :quote="post.subject"
        :hashtags="tagsstring +'blogpost'"
        twitter-user="Dukesnuz"
        inline-template
      >
        <div class="social">
          <network network="email">
            <i class="fa fa-envelope"></i> Email
          </network>
          <network network="facebook">
            <i class="fa fa-facebook"></i> Facebook
          </network>
          <network network="googleplus">
            <i class="fa fa-google-plus"></i> Google +
          </network>
          <network network="line">
            <i class="fa fa-line"></i> Line
          </network>
          <network network="linkedin">
            <i class="fa fa-linkedin"></i> LinkedIn
          </network>
          <network network="odnoklassniki">
            <i class="fa fa-odnoklassniki"></i> Odnoklassniki
          </network>
          <network network="pinterest">
            <i class="fa fa-pinterest"></i> Pinterest
          </network>
          <network network="reddit">
            <i class="fa fa-reddit"></i> Reddit
          </network>
          <network network="skype">
            <i class="fa fa-skype"></i> Skype
          </network>
          <network network="sms">
            <i class="fa fa-commenting-o"></i> SMS
          </network>
          <network network="telegram">
            <i class="fa fa-telegram"></i> Telegram
          </network>
          <network network="twitter">
            <i class="fa fa-twitter"></i> Twitter
          </network>
          <network network="vk">
            <i class="fa fa-vk"></i> VKontakte
          </network>
          <network network="weibo">
            <i class="fa fa-weibo"></i> Weibo
          </network>
          <network network="whatsapp">
            <i class="fa fa-whatsapp"></i> Whatsapp
          </network>
        </div>
      </social-sharing>
    </div>

    <div class="comment" v-show="showForm">
      <h3>Leave a Comment</h3>
      <ul>
        <form v-on:submit.prevent="createComment()">
          <ul>
            <li>
              <label for="new-comment-name">Name</label>
              <input
                type="text"
                name="new-comment-name"
                id="new-comment-name"
                v-model="newComment.name"
              />
            </li>
            <li>
              <label for="new-comment-email">Email</label>
              <input
                type="text"
                name="new-comment-email"
                id="new-comment-email"
                v-model="newComment.email"
              />
            </li>
            <li>
              <label for="new-comment">Comment</label>
              <textarea
                type="text"
                name="new-comment"
                id="new-comment"
                v-model="newComment.comment"
              ></textarea>
            </li>
            <li>
              <input type="submit" value="Submit" />
            </li>
          </ul>
        </form>
      </ul>
    </div>

    <div class="comments">
      <h3>Comments</h3>
      <p>{{ messageComments }}</p>
      <ul v-for="comment in comments" v-bind:key="comment.id">
        <li>
          <span class="commentor-name">{{ comment.email.name }}</span> *
          <span class="comment-date">{{ comment.created_at }}</span>
        </li>
        <li>{{ comment.comment }}</li>
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
      post: {
        blogcategory: {}
      },
      comments: {},
      newComment: {
        name: "",
        email: "",
        comment: "",
        pid: this.pid
      },
      tagsstring: ""
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
    this.getUrl();
  },
  methods: {
    getUrl() {
      var url = window.location.href;
      return url;
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
            var string = "";
            this.post.blogtags.forEach(function(item, index) {
              string = string + item["name"] + ",";
            });
            this.tagsstring = string;
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
      if (
        this.newComment.name == "" ||
        this.newComment.email == "" ||
        this.newComment.comment == ""
      ) {
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
            this.newComment = "";
            this.showForm = false;
            this.messageComments =
              "Thank you for your comment. Your comment will go live as soon as Duke has approved your comment.";
            // this.fetchComments();
          } else {
            this.message = "OOppss. System error. 2";
          }
        })
        .catch(error => {
          this.message = "OOppss. System error 3. " + error + "";
        });
    },
    fetchComments() {
      let uri = "/api/get-live-comments/" + this.pid + "";
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
ul {
  list-style: none;
  padding: 0;
}
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
input[type="text"] {
  background-color: #fff;
  display: block;
  width: 325px;
}
input[type="submit"] {
  background-color: rgb(9, 148, 228);
  color: #fff;
  font-weight: bold;
  margin-top: 10px;
}
#new-comment {
  background-color: #fff;
  height: 100px;
  width: 325px;
  margin-top: 10px;
  display: block;
}
label {
  margin-top: 25px;
  display: block;
  font-weight: bold;
}
.comment {
  margin-top: 50px;
}
.comments {
  width: 600px;
  margin: auto;
  margin-top: 25px;
}
.comments ul {
  background-color: #fff;
  padding: 10px 0;
  padding-left: 5px;
}

.commentor-name {
  font-weight: bold;
  color: rgb(190, 17, 17);
}
.comment-date {
  color: #aca7a7;
}
.social {
  cursor: grab;
}
.social-media {
  border: 1px solid#000;
  padding: 2px;
  background: #fff;
}
</style>
