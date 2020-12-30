<template>
    <div>
       <p>index  see page 30 in vuejs in action book</p>
       {{ message }}
       <ul v-for="photo in photos" v-bind:key="photo.id">
     <li>  
         {{ photo.title }}
         <br>
     <img v-bind:src="photo.path" width=100 height=100>
     <br>
      <a :href="`photoalbum/photo/${photo.id}/cat/slug`">
            <button type="button" class="btn btn-info">View</button>
     </a>
    <br>
     {{ photo.caption }}</li>
</ul>
    </div>
</template>

<script>
export default {
  data() {
    return {
      message: "",
      data: {},
      photos: [],
    };
  },
    props: {
    id: {
      type: String,
      default: 0
    }
  },
  mounted() {
    this.getPhotos();
  },
  methods: {
    getPhotos() {
      this.message = "";
      let url = `/api/album-show-all-photos/`+this.id+``;
      //fetch(url)
      this.axios
        .get(url)
        // .then(res => res.json())
        .then(res => {
          this.data = res.data;
          if(this.data.messageReturned == 'ok'){
          this.photos = this.data.photos;
             console.log(this.data.photos);
          } else {
              this.message ="OOppss. Error returning photos.";
          }
        })
        .catch(err => this.message);
    },
  }
}
 </script>

<style scoped>

</style>