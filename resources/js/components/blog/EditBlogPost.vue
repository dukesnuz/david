<template>
  <div>
    {{ message }}
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

    <form v-on:submit.prevent="editPost()">
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
      message: "",
      categories: [],
      tags: [],
      post: {
        category: "",
        subject: "",
        body: "",
        checkedTags: []
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
            console.log(this.post);
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
        .post(uri, this.post, this.post.category, this.post.checkedTags, {
          headers: {
            "Content-Type": "application/json"
          }
        })
        .then(response => {
          if (response.data.messageReturned === "ok") {
            this.message = "Post was updated";
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
</style>
