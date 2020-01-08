<template>
  <div class="blog-inner-content flex-container">
    <div class="blog-post">
      <h3>Create a Blog Post</h3>
      {{ message }}
      <div v-show="showForm">
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
        ></editor>, menubar: 'insert', toolbar: 'link'
        <form v-on:submit.prevent="create()">
          <ul>
            <li>
              <label for="category">Category</label>
              <select v-model="post.category" name="category" id="category">
                <option></option>
                <option
                  v-bind:key="category.id"
                  v-for="category in categories"
                >{{ category.categorys }}</option>
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
              <label class="blog-tag-label">Tags</label>
              <div v-bind:key="tag.id" v-for="tag in tags" class="blog-tags">
                <input type="checkbox" :value="tag.name" :id="tag.name" v-model="post.checkedTags" />
                {{tag.name}}
              </div>
              <div class="clear"></div>
            </li>
            <li>
              <label for="meta-description">Meta Description</label>
              <textarea
                type="text"
                name="meta-description"
                id="meta-description"
                v-model="post.metaDescription"
              ></textarea>
            </li>
            <li>
              <label for="url-friendly">Url Friendly</label>
              <input
                type="text"
                name="blog-url-friendly"
                id="url-friendly"
                v-model="post.urlFriendly"
              />
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
    <div class="add-c-t">
      <h4>Create</h4>

      <ul class="blog-categories">
        <form v-on:submit.prevent="createCategory()">
          <ul>
            <li>
              <label for="new-category">New Category</label>
              <input type="text" name="new-category" id="new-category" v-model="newCategory.name" />
            </li>
            <li>
              <input type="submit" value="Submit" />
            </li>
          </ul>
        </form>
      </ul>

      <ul class="blog-categories">
        <form v-on:submit.prevent="createTag()">
          <ul>
            <li>
              <label for="new-tag">New Tag</label>
              <input type="text" name="new-tag" id="new-tag" v-model="newTag.name" />
            </li>
            <li>
              <input type="submit" value="Submit" />
            </li>
          </ul>
        </form>
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
      showForm: true,
      showLink: false,
      message: "",
      categories: [],
      tags: [],
      post: {
        category: "",
        subject: "",
        body: "",
        checkedTags: [],
        metaDescription: "",
        urlFriendly: ""
      },
      newId: "",
      newCategory: {
        name: ""
      },
      newTag: {
        name: ""
      }
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
        this.post.category == "" ||
        this.post.metaDescription == "" ||
        this.post.urlFriendly == ""
      ) {
        this.message =
          "Please enter a subject, body, category, meta description and a url friendly.";
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
    },
    createCategory() {
      if (this.newCategory == "") {
        this.message = "Please enter category";
        return;
      }

      let uri = `/api/blog-category-create`;
      this.axios
        .post(uri, this.newCategory, {
          headers: {
            "Content-Type": "application/json"
          }
        })
        .then(response => {
          if (response.data.messageReturned === "ok") {
            this.newCategory.name = "";
            this.message = "New category created";
            this.getCategories();
          } else {
            this.message = "OOppss. System error. 2";
          }
        })
        .catch(error => {
          this.message = "OOppss. System error 3. " + error + "";
        });
    },
    createTag() {
      if (this.newCategory == "") {
        this.message = "Please enter tag";
        return;
      }

      let uri = `/api/blog-tag-create`;
      this.axios
        .post(uri, this.newTag, {
          headers: {
            "Content-Type": "application/json"
          }
        })
        .then(response => {
          if (response.data.messageReturned === "ok") {
            this.newTag.name = "";
            this.message = "New tag created";
            this.getTags();
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
li {
  margin-top: 20px;
}
.inner-content {
  padding-bottom: 500px;
}
.blog-tags {
  display: inline-flex;
  margin-top: 15px;
  margin-left: 5px;
  float: left;
}
form {
  margin-top: 15px;
}
#blog-subject,
#meta-description,
#url-friendly {
  width: 700px;
}
label {
  display: block;
}
input[type="text"],
select {
  display: block;
}
.blog-tag-label {
  float: left;
  margin-top: 15px;
}
.clear {
  clear: both;
}
@media only screen and (min-width: 320px) {
  .blog-post {
    border: 1px solid #000;
    padding: 0 5px;
    width: 80%;
  }
  .flex-container {
    display: flex;
    flex-direction: row;
    justify-content: space-between;
  }
  .add-c-t {
    margin-left: 10px;
    border: 1px solid #000;
    padding: 0 5px;
  }
}
</style>