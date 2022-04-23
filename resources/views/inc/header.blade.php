{{-- <header class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 mb-4 border-bottom">
    <a href="/" class="d-flex align-items-center col-md-3 mb-2 mb-md-0 text-dark text-decoration-none">
        <svg class="bi me-2" width="40" height="32" role="img" aria-label="Bootstrap">
            <use xlink:href="#bootstrap"></use>
        </svg>
    </a>

    <ul class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0">
        <li><button class="nav-link px-2 link-secondary">Главная страница</button></li>
        <li><button class="nav-link px-2 link-dark">Обо мне</button></li>
        <li><button class="nav-link px-2 link-dark">Контакты</button></li>
        <li><button class="nav-link px-2 link-dark">Сообщения</button></li>
        <li><button class="nav-link px-2 link-dark">Телефонный справочник</button></li>
    </ul>
</header> --}}
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <div class="navbar-brand">Гостевая книга</div>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContent" aria-controls="navbarContent" aria-expanded="false">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    @if (session()->has('user'))
                        <div class="nav-link active">{{session('user.name')}}</div>
                    @else
                        <div class="nav-link active">Аноним</div>
                    @endif
                </li>
            </ul>
            <div class="d-flex">
                @if (session()->has('user'))
                    <a href="/logout" class="btn btn-outline-danger ms-3">Выход</a>
                @else
                    <button class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#upModal">Регистрация</button>
                    <button class="btn btn-outline-primary ms-3" data-bs-toggle="modal" data-bs-target="#inModal">Вход</button>
                @endif
            </div>
        </div>
    </div>
</nav>

<!-- Modal -->
<div class="modal fade" id="upModal" tabindex="-1" aria-labelledby="upModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Регистрация</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="reg">

                    <div class="row mb-3">
                        <label for="name" class="col-sm-2 col-form-label">Имя</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="name" id="name" required>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="emailReg" class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="email" id="emailReg" required>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="passwordReg" class="col-sm-2 col-form-label">Пароль</label>
                        <div class="col-sm-10">
                            <input type="password" class="form-control" name="password" id="passwordReg" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Зарегистрироваться</button>
                    </div>
                </form>
            </div>
            
        </div>
    </div>
</div>

<div class="modal fade" id="inModal" tabindex="-1" aria-labelledby="inModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Вход</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="auth">

                    <div class="row mb-3">
                        <label for="emailAuth" class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="email" id="emailAuth" required>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="passwordAuth" class="col-sm-2 col-form-label">Пароль</label>
                        <div class="col-sm-10">
                            <input type="password" class="form-control" name="password" id="passwordAuth" required>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Войти</button>
                    </div>

                </form>
            </div>
            
        </div>
    </div>
</div>
<!-- end Modal -->