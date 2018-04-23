// default init
//$(function () {
//  $('[data-toggle="popover"]').popover()
//})

$("#btn-share").popover({
  html : true, 
  container : '#btn-share',
  content: function() {
    return $('#popoverExampleHiddenContent').html();
  },
  template: '<div class="popover" role="tooltip"><div class="popover-content"></div></div>'
});

$(document).click(function (event) {
  			// hide share button popover
        if (!$(event.target).closest('#btn-share').length) {
            $('#btn-share').popover('hide')
        }
    });

$("a.twitter").attr("href", "https://twitter.com/home?status=" + window.location.href);
$("a.facebook").attr("href", "https://www.facebook.com/sharer/sharer.php?u=" + window.location.href);
$("a.google-plus").attr("href", "https://plus.google.com/share?url=" + window.location.href);