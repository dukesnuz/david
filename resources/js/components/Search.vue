<template>
  <div>
    <h2>Search</h2>
    <h4>{{ message }}</h4>
    <form @submit.prevent="search()" class="mb-3">
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
      <div v-for="link in links" v-bind:key="link.id">
        <div class="bg-dark text-white" style="margin:25px">
          <div class="card-header">
            <h3>{{ link.subject }}</h3>
          </div>
          <div class="card-body">
            <p>
              Category:
              <a
                v-bind:href="'/links/category/'+link.category.categories"
              >{{ link.category.categories }}</a>
            </p>
            <p>Description: {{ link.description }}</p>
            <p>
              <a :href="link.link" class="btn btn-success" target="blank">Read More</a>
            </p>
            <ul class="list-inline">
              <li class="list-inline-item">Tags:</li>
              <li v-for="tag in link.tags" v-bind:key="tag.id" class="list-inline-item">
                <a v-bind:href="'/links/tag/'+tag.name ">{{ tag.name}}</a>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      links: [],
      pagination: {},
      term: "",
      url: "",
      term: "laravel",
      message: "",
      show_nav: false,
      hide: true
    };
  },
  methods: {
    search(page_url) {
      this.show_nav = false;
      let vm = this;
      let url = page_url || "/api/search/" + this.term + "";
      fetch(url)
        .then(res => res.json())
        .then(res => {
          this.links = res.data;
          vm.makePagination(res.meta, res.links);
          if (this.links == "") {
            this.message = "No results found. Please search again.";
          } else {
            this.show_nav = true;
          }
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

<style>
</style>
