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
        location.reload()
        // $('.nav-link.active').html(user.name);
        // $('.log.d-flex').html('<a href="/logout" class="btn btn-outline-danger ms-3">Выход</a>');
        // $('input[type=hidden]').attr('value', user.id)
    });
});

$("#msg").submit(function(event) {
    event.preventDefault();
    $.ajax({
        method: "POST",
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        url: "/msg",
        data: new FormData(this),
        processData: false,
        contentType: false,
    })
    .done(function (data) {
        let html = ''
        if (data.role == 'auth') {
            html = `
            <div data-id="${data.id}" class="list_item bg-dark row mb-3 p-1">
                <div class="info text-warning">${data.time}</div>
                    <div class="options d-flex text-light">
                        <div class="update me-3">изменить</div>
                        <div class="delete">удалить</div>
                    </div>
                <div class="text text-light">${data.text}</div>
            </div>`
        } else {
            html = `
            <div data-id="${data.id}" class="list_item bg-dark row mb-3 p-1">
                <div class="info text-warning">${data.time}</div>
                <div class="text text-light">${data.text}</div>
            </div>`
        }
        
        $('.list .list_item:first').before(html);
    });
});

$(".list").on('click', '.delete', function () {
    let id = $(this).parents('.list_item').attr('data-id'),
        list_item = $(this).parents('.list_item')
    $.ajax({
        method: "delete",
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        url: "/delete",
        data: `id=${id}`
    })
    .done(function (result) {
        console.log(result);
        if (result == 'ok') {
            list_item.remove();
        }
    });
})
