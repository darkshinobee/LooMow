<template>
  <div>

    <div class="search_component dropdown">

      <div class="input-group dropdown-toggle" data-toggle="dropdown">
        <input type="text" class="form-control input-sm" placeholder="Search..."
        v-model="search_query" @keyup.enter="search()">
        <span class="input-group-addon" id="basic-addon1" @click="search" disabled>
          <i class="glyphicon glyphicon-search"> </i>
        </span>
      </div>

  <ul class="search_res dropdown-menu search_ddown" v-if="search_query.length">
    <li class="single_search_result" v-for="result in search_results">
      <a :href="'/products/'+result.id">
        <img :src="result.image_path" alt="" class="result_image">
        <span class="result_name">{{ result.title }} - </span>
        <em>
          {{ result.platform }}
        </em>
      </a>
    </li>
    <li class="single_search_result text-center" v-if="search_loader">{{ search_loader }}</li>
    <li class="single_search_result text-center" v-if="errors">{{ errors }}</li>
    <div class="img-responsive pull-right" style="padding-right:10px">
      <img src="/images/logos/algolia_logo.jpg" alt="Algolia Logo">
      <span>with <i class="glyphicon glyphicon-heart"></i></span>
    </div>
  </ul>
</div>
</div>
</template>

<script>
var algoliasearch = require('algoliasearch');
var client = algoliasearch('7QVF296YT4', '4c88071e634786bc9a9841bb26d937af');
var index = client.initIndex('products');

export default {
  mounted() {
  },

  data() {
    return {
      search_query: '',
      search_results: [],
      errors: '',
      search_loader: ''
    }
  },

  watch: {
    search_query: function () {
      this.search_results = null
      if (this.search_query.length >= 3) {
        this.search()
      }
    }
  },

  methods: {
    search: _.debounce(function() {
      var obj = this;
      obj.search_loader = "Searching..."
      index.search(obj.search_query, function(err, content) {
        if (content.hits) {
          obj.search_loader = ""
          obj.search_results = content.hits
        }else{
          obj.search_loader = ""
          obj.errors = "No Matching Records!"
        }
      })
    }, 500)
  }
}
</script>

<style>
.search_component{
  display:flex;
  /*flex-direction: column;*/
  width: 100%;
  /*justify-content: center;*/
  align-items: center;
}
.search_component input {
  /*border : 1px transparent;*/
}
.search_res {
  list-style-type: none;
  /*background:white;*/
  padding-left: 0px;
  margin-top: 5px;

}
.single_search_result {
  border-bottom: 2px solid #eeeeee;
  /*padding:10px;*/
}
.single_search_result:hover {
  /*background: royalblue;*/
  cursor : pointer;
}
.result_name {
  font-weight: bold;
}
.result_image {
  width: 60px;
  height: 80px;
}
.search_ddown {
  overflow-y: scroll;
  max-height: 350px;
  width: 100%;
}
</style>
