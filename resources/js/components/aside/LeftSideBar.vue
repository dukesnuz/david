<template>
  <div class="aside-container">
    <div class="box-1">
      <iframe
        src="//rcm-na.amazon-adsystem.com/e/cm?o=1&p=12&l=ez&f=ifr&linkID=6392acb2e116d7dbe1a634ed663b1c4c&t=dukesnuz2016-20&tracking_id=dukesnuz2016-20"
        width="300"
        height="250"
        scrolling="no"
        border="0"
        marginwidth="0"
        style="border:none;"
        frameborder="0"
      ></iframe>
    </div>

    <div class="box-2">
      <a target="_blank" href="https://www.idrive.com/p=dukesnuz">
        <img
          src="https://www.idrive.com/include/images/idrive-300250_25.png"
          width="300"
          height="250"
          border="0"
          title="IDrive Remote Backup"
          alt="IDrive Remote Backup"
        />
      </a>
    </div>

    <div class="box-3">
      <p>
        <a href="https://brave.com/dav264" target="blank">I Use Brave Browser</a>
      </p>
    </div>

    <div class="box-4">
        <p>
          <a href="https://m.do.co/c/3ec7cdf44173" target="_blank">Digital Ocean <br>
           Cloud based infastruture hosting company for deveoplers</a>
      </p>
    </div>
  </div>
</template>

<style scoped>
.aside-container {
  margin: auto;
  margin-top: 25px;
  width: 300px;
}

.box-1,
.box-2,
.box-3,
.box-4 {
  margin-bottom: 10px;
  height: 250px;
  width: 300px;
}
.box-4 {
  margin-top: 10px;
  margin-bottom: 0px;
  line-height: 170%;
}
.box-3 {
  text-align: center;
  padding-top: 20%;
  background-color: #ff5733;
}
.box-4 {
  text-align: center;
  background-color: #fff;
  padding: 5%;
}
.box-3 p, .box-4 p {
  font-weight: bold;
  font-size: 2em;
}
.box-3 a, .box-4 a{
  color: mediumblue;
}
@media only screen and (min-width: 500px) {
  .aside-container {
    margin-top: 0px;
    margin-left: 50px;
  }
}
</style>
