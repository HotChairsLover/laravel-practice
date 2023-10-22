<div class="row justify-content-center">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <div class="form-group">
                    <label>Название</label>
                    <p class="form-control m-0">{{$item->title}}</p>
                </div>
                <div class="form-group">
                    <label>Категория</label>
                    <p class="form-control m-0">{{$item->category->title}}</p>
                </div>
                <div class="form-group">
                    <label>Автор</label>
                    <p class="form-control m-0">{{$item->user->name}}</p>
                </div>
                <div class="form-group">
                    <label for="price">Цена</label>
                    <p class="form-control m-0">{{$item->price}} ₽</p>
                </div>
                <div class="form-group">
                    <label for="price">Описание</label>
                    <p class="form-control m-0">{{$item->description}}</p>
                </div>
            </div>
        </div>
    </div>
</div>
