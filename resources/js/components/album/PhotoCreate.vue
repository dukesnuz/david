<!--<template>
  <div class="blog-inner-content flex-container">
    <div class="add-c-t">
      <p class="alert alert-success sm">{{ message }}</p>
      <ul class="blog-categories">
        <form v-on:submit.prevent="createCategory()">
          <ul>
            <li>
              <label for="new-category">New Category</label>
              <input
                type="text"
                name="new-category"
                id="new-category"
                v-model="newCategory.name"
              />
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
              <input
                type="text"
                name="new-tag"
                id="new-tag"
                v-model="newTag.name"
              />
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
      message: "Create new category or tag.",
      newId: "",
      newCategory: {
        name: "",
      },
      newTag: {
        name: "",
      },
    };
  },
  mounted() {},
  methods: {
    createCategory() {
      if (this.newCategory == "") {
        this.message = "Please enter category";
        return;
      }

      let uri = `/api/album-category-create`;
      this.axios
        .post(uri, this.newCategory, {
          headers: {
            "Content-Type": "application/json",
          },
        })
        .then((response) => {
          if (response.data.messageReturned === "ok") {
            this.newCategory.name = "";
            this.message = "New category created";
          } else {
            this.message = "OOppss. System error. 2";
          }
        })
        .catch((error) => {
          this.message = "OOppss. System error 3. " + error + "";
        });
    },
    createTag() {
      if (this.newCategory == "") {
        this.message = "Please enter tag";
        return;
      }

      let uri = `/api/album-tag-create`;
      this.axios
        .post(uri, this.newTag, {
          headers: {
            "Content-Type": "application/json",
          },
        })
        .then((response) => {
          if (response.data.messageReturned === "ok") {
            this.newTag.name = "";
            this.message = "New tag created";
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
.alert.alert-success.sm {
  font-size: 15px;
}
@media only screen and (min-width: 320px) {
  .flex-container {
    display: flex;
    flex-direction: row;
    justify-content: space-between;
  }
  .add-c-t {
    margin-left: 10px;
    border: 1px solid #000;
    padding: 0 5px;
    float: left;
  }
}
</style>