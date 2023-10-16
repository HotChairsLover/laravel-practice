@php
    /** @var \App\Models\AdvCategory $item */
@endphp
<div class="row justify-content-center">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                @if($item->is_published)
                    Опубликовано
                @else
                    Черновик
                @endif
            </div>
            <div class="card-body">
                <div class="form-group">
                    <label for="title">Заголовок</label>
                    <input name="title" value="{{ old('title', $item->title) }}"
                           id="title"
                           type="text"
                           class="form-control"
                           minlength="3"
                           required>
                </div>
                <div class="form-group">
                    <label for="description">Описание</label>
                    <textarea name="description"
                              id="description"
                              class="form-control"
                              rows="20">
                        {{ old('description', $item->description) }}
                    </textarea>
                </div>
                <div class="form-group">
                    <label for="category_id">Категория</label>
                    <select name="category_id"
                            id="category_id"
                            class="form-control"
                            placeholder="Выберите категорию"
                            required>
                        @foreach($categoryList as $categoryOption)
                            <option value="{{ $categoryOption->id }}"
                                    @if($categoryOption->id == $item->category_id) selected @endif>
                                {{$categoryOption->id_title}}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="slug">Идентификатор</label>
                    <input name="slug" value="{{$item->slug}}"
                           id="slug"
                           type="text"
                           class="form-control">
                </div>
                <div class="form-group">
                    <label for="price">Цена</label>
                    <input name="price"
                           id="price"
                           class="form-control"
                           value="{{ old('price', $item->price) }}">
                </div>
                <div class="form-check">
                    <input name="is_published"
                           type="hidden"
                           value="0">
                    <input name="is_published"
                           type="checkbox"
                           class="form-check-input"
                           value="1"
                           @if($item->is_published)
                               checked="checked"
                        @endif>
                    <label class="form-check-label" for="is_published">Опубликовано</label>
                </div>
            </div>
        </div>
    </div>
</div>
