document.addEventListener("DOMContentLoaded", function(event) { 
  // Навигционое меню

  menu.addEventListener("click", () => myTopnav.classList.toggle("responsive"));  

  // Форма загрузки изображения 
  let fields = document.querySelectorAll('.field__file');
      Array.prototype.forEach.call(fields, function (input) {
        let label = input.nextElementSibling,
          labelVal = label.querySelector('.field__file-fake').innerText;
   
        input.addEventListener('change', function (e) {
          let countFiles = '';
          if (this.files && this.files.length >= 1)
            countFiles = this.files.length;
   
          if (countFiles)
            label.querySelector('.field__file-fake').innerText = 'Выбрано файлов: ' + countFiles;
          else
            label.querySelector('.field__file-fake').innerText = labelVal;
        });
      });

  // Кнопка избраного
  // const favoriteButtons = document.querySelectorAll(".favor_img");
  // favoriteButtons.forEach(element => element.addEventListener("click", function(){
  //   this.classList.toggle("activeFav");
  // }));

});

$(document).ready(function() {

    /* Favorites */

    $('.favor_img').on('click', function(e) {
      var favorID = $(this).attr('data-item');
        if($(this).hasClass('activeFav'))
            var doAction = 'dalete';
        else
          var doAction = 'add';
        addFavorite(favorID, doAction);
    });
    /* Favorites */

/* Избранное */
    function addFavorite(id, action) {
       var elem = $("[data-item="+ id +"]");
        var param = 'id='+id+"&action="+action;
        $.ajax({
            url:     '/local/ajax/favorites.php', // URL отправки запроса
            type:     "GET",
            dataType: "html",
            data: param,
            success: function(response) { // Если Данные отправлены успешно
                elem.toggleClass("activeFav");
            },
         });
    }
});
/* Избранное */
