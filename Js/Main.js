function renderView(breadcrum, icon) {
    $("#" + id).css('background-color', '#696969');
    $('.breadcrum').text(breadcrum).attr('class',icon);
}

function renderView(breadcrum, icon, id) {
    $("#" + id).css('background-color', '#696969');
    $('.breadcrum').text(breadcrum).attr('class',icon);
    setNavDefault();
    $('#' + id).css({
        color: 'steelblue',
        backgroundcolor: '#696969'
    });
}

function setNavDefault() {
    $('#add').css({
        backgroundcolor: '#373737',
        color: '#d0d0d0'
    });
    $('#view').css({
        backgroundcolor: '#373737',
        color: '#d0d0d0'
    });
    $('#find').css({
        backgroundcolor: '#373737',
        color: '#d0d0d0'
    });
}

function willDelete(){
     return window.confirm("voulez vous vraiment supprimer");
}