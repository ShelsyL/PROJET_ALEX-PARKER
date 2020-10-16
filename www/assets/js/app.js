
$(function(){

  $('.delete').click(function(){
    if (!confirm('Etes-vous sur de vouloir supprimer cet enregistrement ?')){
      return false;
    }
  });

  $('.edit').submit(function(){
    if (!confirm('Etes-vous sur de vouloir modifier cet enregistrement ?')){
      return false;
    }
  });


});
