
eliminarUsuario = (Id) => {
    const uri = $('#url_delete').val();
    $.ajax({
        url: uri,
        async: true,
        data: {id_user : Id},
        success : function(response){
            if(response.status == 'success'){
                console.log('Eliminado satisfactoriamente');
            }else{
                console.log('Algo falló, comuníquese con el desarrollador');
            }
        },
        error : function(response){
            alert('Ocurrió un error al intentar borrar, intentelo más tarde');
            console.log(response);
        }
    });
}
