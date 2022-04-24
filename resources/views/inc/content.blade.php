<main class="bg-black p-3">
    <div class="container text-center">
        <h2 class="text-light">Напишите запись</h2>
        <div>
            <form id="msg">
                <textarea style="outline: none; height: 100px;" class="w-100 p-3" name="text" cols="30" rows="10"
                    placeholder="Напишите что-нибудь"></textarea>
                <button type="submit" class="btn btn-primary">Сохранить</button>
            </form>
        </div>
    </div>

    <div class="container">
        <h2 class="text-center text-light">Все записи</h2>
        <div class="list">
            @foreach ($posts as $post)
                <div class="bg-dark row mb-3 p-1">
                    <div class="info text-warning">{{ date('d.m.Y H:i', strtotime($post->created_at)) }}</div>
                    <div class="text text-light">{{ $post->text }}</div>
                </div>
            @endforeach
            <div class="bg-dark row mb-3 p-1">
                <div class="info text-warning">24.04.2020 0:19</div>
                <div class="text text-light">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Iure fuga
                    repellendus eius? Corporis numquam repellat nihil cupiditate optio eius voluptates repudiandae ut
                    iure nesciunt? Temporibus saepe ab doloribus cupiditate ex asperiores ipsa a natus odit quia ratione
                    earum incidunt molestiae, ipsam reprehenderit et recusandae, placeat exercitationem. Veniam mollitia
                    perferendis debitis!</div>
            </div>
            <div class="bg-dark row mb-3 p-1">
                <div class="info text-warning">24.04.2020 0:10</div>
                <div class="options d-flex text-light">
                    <div class="update me-3">изменить</div>
                    <div class="delete">удалить</div>
                    {{-- <button class="btn btn-link">изменить</button>
                    <button class="btn btn-link">удалить</button> --}}
                </div>
                <div class="text text-light">Lorem, ipsum dolor sit amet consectetur adipisicing elit. </div>
            </div>
        </div>
    </div>
</main>
