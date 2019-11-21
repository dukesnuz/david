<template>
  <div class="inner-content">
    <h3>Create a Blog Post</h3>

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
      v-model="content"
    ></editor>
    
    <p><button @click="create()">Search Here</button></p>
    
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
      content: ""
    };
  },
  methods: {
      create(){
          console.log(this.content);
      }
  }
};
</script>

<style scoped>
.inner-content {
  padding-bottom: 500px;
}
</style>