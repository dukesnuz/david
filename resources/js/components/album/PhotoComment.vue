<template>
  <div>
    
    {{ message }}
     <span class="glyphicon glyphicon-heart"></span>
<p class="glyphicon glyphicon-heart" v-on:click="makeFavorite()">fav</p>
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
      <ul v-for="comment in comments" v-bind:key="comment.id">
        <li>
         <span class="commentor-name">{{ comment.name }}</span>
          <span class="comment-date">{{ comment.Date }}</span>
        </li>
        <li>{{ comment.comment }}</li>
      </ul>
    </div>
  </div>
</template>

<script>
import BootstrapVue from 'bootstrap-vue';
import 'bootstrap/dist/css/bootstrap.css';
import 'bootstrap-vue/dist/bootstrap-vue.css';
Vue.use(BootstrapVue);

export default {
  data() {
    return {
      message: "",
      showForm: true,
      comments: {},
      newComment: {
        name: this.username,
        email: "e@e.com",
        comment: "a comment here",
      },
    };
  },
  props: {
    id: {
      type: String,
      default: 0,
    },
    username: {
      type: String,
      default: "",
    },
    userid: {
      type: String,
      default: "",
    },
  },
  mounted() {
    this.fetchComments();
  },
  methods: {
      makeFavorite() {
      console.log(this.id);
     },
    fetchComments() {
      //this.message = "";
      let url = `/api/album-show-all-comments/` + this.id + ``;
      //fetch(url)
      this.axios
        .get(url)
        // .then(res => res.json())
        .then((res) => {
          this.data = res.data;
          if (this.data.messageReturned == "ok") {
            this.comments = this.data.comments;
            //this.message = "Comments for this photo";
            console.log(this.username);
            console.log(this.userid);
            console.log(this.id);
          } else if (this.data.messageReturned == "no_comments") {
            this.message = "No comments, Be the first to make a comment.";
          } else {
            this.message = "OOpps. Error retrieving comments";
          }
        })
        .catch((err) => this.message);
    },
    createComment() {
      if (
        this.newComment.name == "" ||
        this.newComment.email == "" ||
        this.newComment.comment == ""
      ) {
        this.message = "Please enter your name, email and a comment";
        return;
      }
      this.newComment.photoId = this.id;
      this.newComment.userId = this.userid;
      let uri = `/api/photo-comment-create`;
      this.axios
        .post(uri, this.newComment, {
          headers: {
            "Content-Type": "application/json",
          },
        })
        .then((response) => {
          if (response.data.messageReturned === "ok") {
            this.newComment = "";
            this.showForm = false;
            this.message =
              "Thank you for your comment.";
            this.fetchComments();
          } else {
            this.message = "OOppss. System error. 2";
          }
        })
        .catch((error) => {
          this.message = "OOppss. System error 3. " + error + "";
        });
    },
  },
};
</script>


<style>
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

<style scoped>
