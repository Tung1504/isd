/**
 * thay doi hien thi giua grid va list
 */
$('button').click(function(e) {
  if ($(this).hasClass('grid')) {
    $('.main ul').removeClass('list').addClass('grid');
  } else if ($(this).hasClass('list')) {
    $('.main ul').removeClass('grid').addClass('list');
  }
});

/**
 * hien ra form them danh muc/san pham
 */
function showDiv() {
  document.getElementById('addform').style.display = "block";
}