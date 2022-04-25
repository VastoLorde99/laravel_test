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
                <div data-id="{{ $post->id }}" class="list_item bg-dark row mb-3 p-1">
                    @php
                        if ($post->created_at != $post->updated_at) { $edit = '(Ред.)';}
                        else { $edit = ''; }
                    @endphp
                    <div class="info text-warning">{{ date('d.m.Y H:i', strtotime($post->created_at)) }} <span class="status">{{ $edit }}</span></div>
                    @php
                        $diff_hour = (time() - strtotime($post->created_at)) / (60 * 60);
                    @endphp
                    @if (($post->user_id == session('user.id') && $post->user_id != null) || session('user.role') == 'admin')
                        @if ((session('user.role') == 'user' && $diff_hour <= 2) || session('user.role') == 'admin')
                            <div class="options d-flex text-light">
                                {{-- <div class="update me-3">изменить</div> --}}
                                <div class="delete">удалить</div>
                            </div>
                            <div contenteditable="true" class="text text-light">{{ $post->text }}</div>
                        @else
                            <div class="text text-light">{{ $post->text }}</div>
                        @endif
                    @else
                        <div class="text text-light">{{ $post->text }}</div>
                    @endif
                </div>
            @endforeach
            {{ $posts->links() }}
            {{-- <div class="bg-dark row mb-3 p-1">
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
                </div>
                <div class="text text-light">Lorem, ipsum dolor sit amet consectetur adipisicing elit. </div>
            </div> --}}
        </div>
    </div>
</main>
