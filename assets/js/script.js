window.onload = function(){
    setInterval(updateArea, 100);
};
function updateArea(){
    var alturaTela = $(document.body).height();
    var posicao = $('.cursoleft').offset().top;
    var altura = alturaTela - posicao;
    $('.cursoleft, .cursoright').css('height', altura+'px');
    
    var ratio = 1920/1080;//Serve para aumentar e diminuir o video proporcionalmente, ratio de qualquer video widescreen
    var video_largura = $('#video').width();
    var video_altura = video_largura / ratio;
    $('#video').height(video_altura);    
}
function marcarAssistido(obj){
    var id = $(obj).attr('data-id');
    $(obj).remove();
    $.ajax({
        url:"/ajax/marcarAssistido/"+id
    });
}
