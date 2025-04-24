@extends('layout.base')

@section('title', 'Создать объявление')

@section('konten')

<div class="container-profile">
    <h2 class="container-profile_title-h2">Создать объявление</h2>

    <form class="form_container-addannoun" action="{{ route('addannoun') }}" method="POST" enctype="multipart/form-data">
    @csrf
        <div class="container-addannoun">
            <div class="container-addannoun_left">
                <div class="addannoun_input-container">
                    <h3 class="addannoun-h3">Название</h3>

                    <input class="login-form_input addannoun-input" type="text" name="name" value="{{ old('name') }}">
                    @error("name")
                    <p class="text-error">{{ $message }}</p>
                    @enderror
                </div>

                <div class="addannoun_input-container">
                    <h3 class="addannoun-h3">Категория</h3>

                    <select class="login-form_input addannoun-input" name="categoty">
                        @foreach($tags as $tag)
                            <option style="color: {{ $tag->color }}" value="{{ $tag->id }}">{{ $tag->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="addannoun_input-container">
                    <h3 class="addannoun-h3">Описание</h3>

                    <textarea class="login-form_input addannoun-input addannoun-textarea" type="text" name="description">{{ old('description') }}</textarea>
                    @error("description")
                    <p class="text-error">{{ $message }}</p>
                    @enderror
                </div>

                <div class="addannoun_input-container">
                    <h3 class="addannoun-h3">Цена (Руб.)</h3>

                    <input class="login-form_input addannoun-input" type="number" min="0" name="price" value="{{ old('price') }}">
                    @error("price")
                    <p class="text-error">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <div class="container-addannoun_right">
                <div class="container-addannoun_input-file">
                    <input id="input_file" class="input-hidden" oninput="previewImage(this.files[0])" type="file" accept="image/*" name="image">
                    <label class="label_input-file" for="input_file">
                        <img id="preview" class="img_input-file" src="svg/editImage.svg" alt="alt">
                        <p id="preview_alt" class="p_input-file">Добавить изображение</p>
                    </label>
                </div>
                @error("image")
                <p class="text-error">{{ $message }}</p>
                @enderror
            </div>
        </div>

        <button class="login-form_button button-profile">Сохранить</button>
    </form>
</div>

<script src="js/fileReader.js"></script>

@endsection