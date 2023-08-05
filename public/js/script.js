$(function () {
  $('.ac-label').click(function () {
    $(this).next('div').slideToggle();
    $(this).find(".arrow").toggleClass('open');
  });
});
