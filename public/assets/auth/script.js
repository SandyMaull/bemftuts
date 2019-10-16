function toggleDropdown (e) {
    const _d = $(e.target).closest('.dropdown'),
        _m = $('.dropdown-menu', _d);
    setTimeout(function(){
        const shouldOpen = e.type !== 'click' && _d.is(':hover');
        _m.toggleClass('show', shouldOpen);
        _d.toggleClass('show', shouldOpen);
        $('[data-toggle="dropdown"]', _d).attr('aria-expanded', shouldOpen);
    }, e.type === 'mouseleave' ? 100 : 0);
}

$('body')
.on('mouseenter mouseleave','.dropdown',toggleDropdown)
.on('click', '.dropdown-menu a', toggleDropdown);


$('#deleteModal').on('show.bs.modal', function(event) {

    var button = $(event.relatedTarget)
    var id = button.data('id')
    var modal = $(this)
    
    modal.find('.modal-body #deleteID').val(id);
})
// audioPlayer();
// function audioPlayer(){
//     var currentsong = 0;
//     $("#audioPlayer")[0].src = $("#playlist li a")[0];
//     $("#audioPlayer")[0].muted = false;
//     $("#audioPlayer")[0].play();
//     $("#playlist li a").click(function(e){
//         e.preventDefault();
//         $("#audioPlayer")[0].src = this;
//         $("#audioPlayer")[0].muted = false;
//         $("#audioPlayer")[0].play();
//         $("#playlist li").removeClass("current-song");
//         currentsong = $(this).parent().index();
//         $(this).parent().addClass("current-song");
//     });
//     $("#audioPlayer")[0].addEventListener("ended", function(){
//         currentsong++;
//         if(currentsong == $("#playlist li a").length)
//             currentsong = 0;
//         $("#playlist li").removeClass("current-song");
//         $("#playlist li:eq("+currentsong+")").addClass("current-song");
//         $("#audioPlayer")[0].src = $("#playlist li a")[currentsong].href;
//         $("#audioPlayer")[0].muted = false;
//         $("#audioPlayer")[0].play();
//     });
// }