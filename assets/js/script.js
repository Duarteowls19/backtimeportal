$('#form1').submit(function(e){
    e.preventDefault();

    var name_shot = $('#name').val();
    var comment_shot = $('#comment').val();

    if(name_shot == '' || comment_shot == '' ){
        alert('ensira um valor valido !!');
    }else{
        $.ajax({
            url: 'http://localhost/nagatoro_san/inserir.php',
            method: 'POST',
            data: {name: name_shot, comment: comment_shot},
            dataType: 'json'
        }).done(function(result){
            $('#name').val('');
            $('#comment').val('');
    
            console.log(result);
    
            getComments();
        }).fail(function(jqXHR, textStatus, errorThrown){
            console.log("Erro na requisição AJAX: " + textStatus, errorThrown);
        });
    }

});

function getComments(){
    $.ajax({
        url: 'http://localhost/nagatoro_san/selecionar.php',
        method: 'GET',
        dataType: 'json'
    }).done(function(result){
        console.log(result);

        for(var i = 0; i < result.length; i++){
            $('.box_comment').prepend(`
                <div class="b_comm"><h4> ` +result[i].name+ ` </h4><p> ` +result[i].comment+ ` </p></div>
            `)
        }
    }).fail(function(jqXHR, textStatus, errorThrown){
        console.log("Erro na requisição AJAX: " + textStatus, errorThrown);
    });
}

getComments();