
$('.c').starbox({
    average: 0.5,
    autoUpdateAverage: true,
    ghosting: true,
    changeable:true,
    buttons:10
  });
  $('.showrate').starbox({
  average: 0.5,
  autoUpdateAverage: false,
  ghosting: false,
  changeable:false,
  buttons:10
});

    var i = 0;
    while (true) {
      i++;
      $('#sh'+i).starbox('setValue',$('#shr'+i).text()/5);
      if (i > 7) {
        break;
      }
    }


  function rate(r) {
    //  alert($('#r'+r).starbox('getValue'));
      $('.cat'+r).val($('#r'+r).starbox('getValue'));
      $('.cat'+r).val($('.cat'+r).val()*5)
   }
     //  alert($('#r'+r).starbox('getValue'));
