<template>
  <div>

    <div class="search_component dropdown">

      <div class="input-group dropdown-toggle" data-toggle="dropdown">
        <input type="text" class="form-control" placeholder="Search..."
        v-model="search_query" @keyup.enter="search()">
        <span class="input-group-btn">
          <button class="btn btnColor" type="button" @click="search">
            <span class="glyphicon glyphicon-search a_link"></span>
          </button>
        </span>
      </div>

      <ul class="search_res dropdown-menu search_ddown" v-if="search_query.length">
        <li class="single_search_result" v-for="result in search_results">
          <a :href="'/games/'+result.slug">
            <img :src="result.image_path" alt="" class="result_image">
            <span class="result_name">{{ result.title }} - </span>
            <em>
              {{ result.platform }}
            </em>
          </a>
        </li>
        <li class="single_search_result text-center" v-if="search_loader">{{ search_loader }}</li>
        <li class="single_search_result text-center" v-if="errors">{{ errors }}</li>
      </ul>
    </div>
  </div>
</template>

<script>

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
      this.errors = ""
      if (this.search_query.length >= 1) {
        this.search()
      }
    }
  },

  methods: {
    search: _.debounce(function() {
      var obj = this;
      obj.search_loader = "Searching..."
      axios.get('/search_results?query=' + obj.search_query)
      .then(function (content) {
        if (content.data == 'empty') {
          obj.search_loader = ""
        }else if (content.data == 'no match') {
          obj.errors = "No Matching Records!"
          obj.search_loader = ""
        }else {
          obj.search_loader = ""
          obj.search_results = content.data
          obj.errors = ""
        }
      })

      // if (content.length > 1) {
      //   obj.search_loader = ""
      //   obj.search_results = content.query
      //   obj.errors = ""
      // }else{
      //   obj.search_loader = ""
      //   obj.errors = "No Matching Records!"
      // }
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
  /*align-items: center;*/
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
