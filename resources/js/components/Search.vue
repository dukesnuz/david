<template>
  <div>
    <h2>Search</h2>
    <p>
      <a href="#" @click="fetchLinks(pagination.prev_page_url)">prev</a>
    </p>
    <p>
      <a href="#" @click="fetchLinks(pagination.next_page_url)">next</a>
    </p>

    <div v-for="link in links" v-bind:key="link.id">
      <p>{{ link.subject }}</p>
      <p>{{ link.description }}</p>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      links: []
    };
  },
  created() {
    this.fetchLinks();
  },
  methods: {
    fetchLinks(page_url) {
      let vm = this;
      page_url = page_url || `api/search/laravel`;
      fetch(page_url)
        .then(res => res.json())
        .then(res => {
          this.links = res.data;
          vm.makePagination(res.meta, res.links);
        })
        .catch(err => console.log(err));
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
