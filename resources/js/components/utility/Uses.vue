<template>
  <div class="inner-content flex-container">
    <div class="uses">
      <h1 class="font-weight-bold text-uppercase mb-2">/uses</h1>
      <h3>A list of tools I use to develop webpages and whatever else I do.</h3>

      <h4 class="font-weight-bold text-uppercase mt-5 mb-2">Podcast and Video Tutorials</h4>
      <ul>
        <li>
          <a href="https://syntax.fm" target="blank">
            <span class="text-primary">Syntax.fm</span>
          </a> podcast
        </li>
        <li>
          A few
          <a
            href="https://david.dukesnuz.com/blog/13/Website%20Development/best-youtube-channels-with-tutorials-to-learn-website-development-and-how-to-code-and-one-podcast"
            target="blank"
          >
            <span class="text-primary">more.</span>
          </a>
        </li>
      </ul>

      <h4 class="font-weight-bold text-uppercase mt-5 mb-2">Hardware</h4>
      <ul>
        <li>
          <a href="https://amzn.to/2v3oyRP" target="blank">
            <span class="text-primary">Acer Travelmate</span>
          </a> laptop with 17 inch screen
        </li>
        <li>
          <a href="https://amzn.to/2sIeZqJ" target="blank">
            <span class="text-primary">Acer LED Technology</span>
          </a> for a second monitor
        </li>
        <li>Yealink VOIP Phone with Vonnage for service</li>
        <li>Apple iphone 6</li>
      </ul>

      <h4 class="font-weight-bold text-uppercase mt-5 mb-2">Software</h4>
      <ul>
        <li>Atom for working with Laravel</li>
        <li>VS Code for working with Vue.js</li>
        <li>Postman when working with api</li>
        <li>
          <a href="https://www.idrive.com/p=dukesnuz" target="blank">
            <span class="text-primary">iDrive</span>
          </a> to back up my computer
        </li>
        <li>
          <a href="https://m.do.co/c/3ec7cdf44173" target="blank">
            <span class="text-primary">Digital Ocean</span>
          </a> for hosting
        </li>
        <li>
          <a
            href="https://developer.mozilla.org/en-US/docs/Mozilla/Firefox/Developer_Edition"
            target="blank"
          >
            <span class="text-primary">Firefox developer edition browser</span>
          </a> when developing. I learned about this browser on a recent
          <a
            href="https://syntax.fm/"
            target="blank"
          >
            <span class="text-primary">Syntax.fm</span>
          </a> podcast.
        </li>
        <li>Brave browser mostly used when not developing</li>
        <li>Chrome browser only used for development to check page responsiveness on mobile devices</li>
        <li>
          Searching internet for coding answers I use
          <a
            href="https://david.dukesnuz.com/blog/14/Computer%20Technology/tips-and-tricks-to-use-to-search-google-for-words-and-images-and-how-to-use-google-search"
            target="blank"
          >
            <span class="text-primary">google</span>
          </a>.
        </li>
      </ul>

      <h4 class="font-weight-bold text-uppercase mt-5 mb-2">Frameworks I Use and Enjoy The Most</h4>
      <ul>
        <li>
          <a href="https://laravel.com" target="blank">
            <span class="text-primary">Laravel</span>
          </a>
        </li>
        <li>
          <a href="https://vuejs.org" target="blank">
            <span class="text-primary">Vue.js</span>
          </a>
        </li>
      </ul>

      <h4 class="font-weight-bold text-uppercase mt-5 mb-2">Other Essentials</h4>
      <ul>
        <li>
          <a href="https://amzn.to/2TIe2dh" target="blank">
            <span class="text-primary">Ceramic cup</span>
          </a> made in China used for cocoa and tea
        </li>
        <li>
          <a href="https://amzn.to/2NK8kDP" target="blank">
            <span class="text-primary">Note Pads</span>
          </a> from office depot. Used for scribbling things down.
        </li>
        <li>
          <a href="https://dukecannon.com/?rfsn=3315585.912b22" target="blank">
            <span class="text-primary">Duke Cannon</span>
          </a> for toiletries
        </li>
      </ul>

      <p class="mt-5">
        So you may be thinking, Where did you get the idea to make this page? Anwser ==
        <a
          href="https://uses.tech/"
          target="blank"
        >
          <span class="text-primary">Wes Bos</span>
        </a>
      </p>
    </div>
    <LeftSideBar></LeftSideBar>
  </div>
</template>

<script>
import LeftSideBar from "../aside/LeftSideBar.vue";

export default {
  components: {
    LeftSideBar
  },

  data() {
    return {};
  },
  mounted: function() {},
  methods: {}
};
</script>

<style scoped>
ul {
  list-style: none;
}
ul.uses {
  padding: 0;
}
.uses {
  padding-left: 5px;
}
.uses {
  margin-left: 2%;
  margin-right: 2%;
}
@media only screen and (min-width: 376px) {

  .flex-container {
    display: flex;
    flex-direction: row;
    justify-content: space-between;
  }
  .uses {
    margin: 0;
    margin-right: 25px;
  }
}
</style>