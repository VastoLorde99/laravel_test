$("#reg").submit(function(event) {
    event.preventDefault();
    // console.log(new FormData(this));
    $.ajax({
        method: "POST",
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        url: "/up",
        data: new FormData(this),
        processData: false,
        contentType: false,
    })
    .done(function (msg) {
        // msg = JSON.parse(msg)
        console.log(msg);
        let html = ''
        if (msg.msg == 'Вы зарегистрированы') {
            html = '<div class="not btn btn-success">' + msg.msg +'</div>';
        } 
        else {
            html = '<div class="not btn btn-danger">' + msg.msg +'</div>';
        }
        $('#reg .btn-primary').after(html);
        setTimeout(() => {
            $('#reg .not').css('transition', '1s');
            $('#reg .not').css('opacity', '0');
        }, 3000);
        setTimeout(() => {
            $('#reg .not').remove();
        }, 4000);
    });
});

$("#auth").submit(function(event) {
    event.preventDefault();
    // console.log(new FormData(this));
    $.ajax({
        method: "POST",
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        url: "/in",
        data: new FormData(this),
        processData: false,
        contentType: false,
    })
    .done(function (user) {
        $('.nav-link.active').html(user.name);
        $('.d-flex').html('<a href="/logout" class="btn btn-outline-danger ms-3">Выход</a>');
        $('input[type=hidden]').attr('value', user.id)
    });
});

$("#msg").submit(function(event) {
    event.preventDefault();
    console.log(new FormData(this));
    $.ajax({
        method: "POST",
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        url: "/msg",
        data: new FormData(this),
        processData: false,
        contentType: false,
    })
    .done(function (user) {
        
    });
});
// $(document).ready(function () {    
    
// })