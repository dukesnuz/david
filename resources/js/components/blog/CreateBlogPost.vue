<template>
  <div class="inner-content">
    <h3>Create a Blog Post</h3>
    {{ message }}
    <div v-show="showForm">
      <editor
        api-key="8fvbyqp6y3crcp6loaupiilair2atyyfei80ao20yezogbuv"
        cloud-channel="5"
        :disabled="false"
        id="uuid"
        :init="{  }"
        initial-value
        model-events
        plugins
        tag-name="div"
        toolbar
        value
        v-model="post.body"
      ></editor>

      <form v-on:submit.prevent="create()">
        <ul>
          <li>
            <label for="category">Category</label>
            <select v-model="post.category" name="category" id="category">
              <option></option>
              <option
                v-bind:key="category.id"
                v-for="category in categories"
              >{{ category.categories }}</option>
            </select>
          </li>

          <li>
            <label for="subject">Subject</label>
            <input type="text" name="subject" id="subject" v-model="post.subject" />
          </li>
          <li>
            <input type="hidden" name="body" v-model="post.body" />
          </li>
          <li>
            <label class="tag-label">Tags</label>
            <div v-bind:key="tag.id" v-for="tag in tags" class="tags">
              <input type="checkbox" :value="tag.name" :id="tag.name" v-model="post.checkedTags" />
              {{tag.name}}
            </div>
            <div class="clear"></div>
          </li>
          <li>
            <input type="submit" value="Submit" />
          </li>
        </ul>
      </form>
    </div>
    <div v-show="showLink">
      <p>
        <a :href="`${newId}/slug`">
          <button type="button" class="btn btn-info">View New Post</button>
        </a>
      </p>
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
      showForm: true,
      showLink: false,
      message: "",
      categories: [],
      tags: [],
      post: {
        category: "",
        subject: "",
        body: "",
        checkedTags: []
      },
      newId: ""
    };
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
    create() {
      if (
        this.post.subject == "" ||
        this.post.body == "" ||
        this.post.category == ""
      ) {
        this.message = "Please enter a subject, body and category";
        return;
      }

      let uri = `/api/blog-post-create`;
      this.axios
        .post(uri, this.post, this.post.category, this.post.checkedTags, {
          headers: {
            "Content-Type": "application/json"
          }
        })
        .then(response => {
          if (response.data.messageReturned === "ok") {
            this.showForm = false;
            this.showLink = true;
            this.newId = response.data.postId;
          } else {
            this.message = "OOppss. System error. 2";
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
.inner-content {
  padding-bottom: 500px;
}
.tags {
  display: inline-flex;
  margin-top: 15px;
  margin-left: 5px;
  float: left;
}
form {
  margin-top: 15px;
}
#subject {
  width: 700px;
}
input[type="text"],
select {
  display: block;
}
.tag-label {
  float: left;
  margin-top: 15px;
}
.clear {
  clear: both;
}
</style>