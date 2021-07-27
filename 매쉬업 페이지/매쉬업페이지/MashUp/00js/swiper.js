window.onloadend=function(){
  var ftab=["북악관","한림관","청운관","배달"];
  var swiper = new Swiper('.swiper-container', {
    pagination: {
      el: '.swiper-pagination',
      clickable: true,
      renderBullet: function (index, className) {
      return '<span class="' + className + '">' + ftab[index] + '</span>';
      },
    },
  });
}
