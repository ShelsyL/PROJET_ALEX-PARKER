
$(function(){

  $('.delete').click(function(){
    if (!confirm('Etes-vous sur de vouloir supprimer ce post ?')){
      return false;
    }
  });

  $('.edit').submit(function(){
    if (!confirm('Etes-vous sur de vouloir modifier ce post ?')){
      return false;
    }
  });

});
