$(window).on('load',function(){
  $('.btn_load').on('click', function() {
    var $this = $(this);
    $this.button('loading');
  });
});
