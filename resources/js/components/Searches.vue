<template>
  <div>
    <h5>Recent Searches</h5>
    <ul>
      <li class="list-unstyled" v-for="search in searches" v-bind:key="search.id">{{ search.term}}</li>
    </ul>
  </div>
</template>
<script>
import { EventBus } from "../bus.js";
export default {
  data() {
    return {
      searches: [],
      message: ""
    };
  },
  created() {
    this.fetchSearches();
    EventBus.$on("i-got-clicked", data => {
      this.fetchSearches();
    });
  },
  methods: {
    fetchSearches() {
      let url = "/api/searches/";
      fetch(url)
        .then(res => res.json())
        .then(res => {
          this.searches = res.data;
        })
        .catch(err => this.message);
    }
  }
};
</script>