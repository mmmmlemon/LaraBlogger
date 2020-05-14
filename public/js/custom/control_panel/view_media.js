
  const fileInput = document.querySelector('#file-js-example input[type=file]');
  fileInput.onchange = () => {
    if (fileInput.files.length > 0) {
      const fileName = document.querySelector('#file-js-example .file-name');
      fileName.textContent = fileInput.files[0].name;
    }
  }

  const fileInputt = document.querySelector('#thumbnail_uploader input[type=file]');
  fileInputt.onchange = () => {
    if (fileInputt.files.length > 0) {
      const fileName = document.querySelector('#thumbnail_uploader .file-name');
      fileName.textContent = fileInputt.files[0].name;
    }
  }



  //Plyr, видеоплеер
const player = new Plyr('#player', {
});

$("#tab_preview").on('click', function(){
    $(this).addClass("is-active");
    $("#tab_thumbnail").removeClass("is-active");
    $("#preview").removeClass("invisible").addClass("fade-in");
    $("#thumbnail").addClass("invisible");
    player.pause();
});

$("#tab_thumbnail").on('click', function(){
    $(this).addClass("is-active");
    $("#tab_preview").removeClass("is-active");
    $("#thumbnail").removeClass("invisible").addClass("fade-in");
    $("#preview").addClass("invisible");
    player.pause();
});