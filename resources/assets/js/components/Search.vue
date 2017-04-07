<template>
<div class="input-group">
  <input type="text" class="form-control nb" placeholder="Search...">
  <span class="input-group-btn">
    <button class="btn btn-primary" type="button">
      <i class="glyphicon glyphicon-search"> </i>
    </button>
  </span>
</div>
</template>

<script>
  var algoliasearch = require('algoliasearch');
  var client = algoliasearch('7QVF296YT4', '4c88071e634786bc9a9841bb26d937af');
  var index = client.initIndex('products');

    export default {
        mounted() {
          console.log("Searching ");
        index.search('forza', function(err, content) {
        console.log(content.hits);
          });
        }
    }
</script>
