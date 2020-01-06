<template>
  <div>
    <h2>Search Blog</h2>
    <h4>{{ message }}</h4>
    <form @submit.prevent="search()" v-bind:class="{'f': formStyle}">
      <div class="form-group">
        <input type="text" class="form-control" placeholder="Search for something" v-model="term" />
      </div>
      <button type="submit" class="btn btn-dark btn-block">Search Here</button>
    </form>

    <nav v-if="show_nav">
      <ul class="pagination">
        <li v-bind:class="[{disabled: !pagination.prev_page_url}]" class="page-item">
          <a class="page-link" href="#" @click="search(pagination.prev_page_url)">prev</a>
        </li>
        <li class="page-item disabled">
          <a class="page-link text-dark" href="#">
            Page {{pagination.current_page }}
            of {{ pagination.last_page }}
          </a>
        </li>

        <li v-bind:class="[{disabled: !pagination.next_page_url}]" class="page-item">
          <a class="page-link" href="#" @click="search(pagination.next_page_url)">next</a>
        </li>
      </ul>
    </nav>
    <div class="card">
      <div v-for="post in posts" v-bind:key="post.id">
        <div class="bg-dark text-white" style="margin:25px">
          <div class="card-header">
            <h3>{{ post.subject }}</h3>
          </div>
          <div class="card-body">
            <a :href="`/blog/${post.id}/cat/slug/`" target="blank">
              <button type="button" class="btn btn-info">Read more</button>
            </a>

            <ul class="list-inline">
              <li v-if="show_edit">
                <a :href="`/blog/blog-post/${post.id}/edit/`">
                  <button type="button" class="btn btn-info">Edit</button>
                </a>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import { EventBus } from "../../bus.js";
export default {
  data() {
    return {
      posts: [],
      pagination: {},
      term: "",
      url: "",
      term: "",
      message: "",
      show_nav: false,
      hide: true,
      formStyle: true
    };
  },
  props: {
    show_edit: {
      type: String,
      default: 0
    }
  },

  methods: {
    emitGlobalClickEvent() {
      EventBus.$emit("i-got-clicked", "extra data");
    },
    search(page_url) {
      this.message = "";
      this.show_nav = false;
      this.formStyle = true;
      let vm = this;
      let url = page_url || "/api/blog-search/" + this.term + "";
      fetch(url)
        .then(res => res.json())
        .then(res => {
          this.posts = res.data;
          console.log(this.posts);
          vm.makePagination(res.meta, res.links);
          if (this.posts == "") {
            this.message =
              "Please search again. No results found for: " + this.term;
          } else {
            this.formStyle = false;
            this.show_nav = true;
            this.term = "";
          }
          this.emitGlobalClickEvent();
        })
        .catch(err => this.message);
    },
    makePagination(meta, links) {
      let pagination = {
        current_page: meta.current_page,
        last_page: meta.last_page,
        next_page_url: links.next,
        prev_page_url: links.prev
      };
      this.pagination = pagination;
    }
  }
};
</script>

<style scoped>
.f {
  margin-bottom: 500px !important;
}
</style>