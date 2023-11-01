<div class="row justify-content-center">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <div class="form-group">
                    <label for="name">Имя</label>
                    <p class="form-control m-0">{{$user->name}}</p>
                </div>
                <div class="form-group">
                    <label for="email">Почта</label>
                    <p class="form-control m-0">{{$user->email}}</p>
                </div>
                <div class="form-group">
                    <label for="api-key">Api-key</label>
                    <p class="form-control m-0">{{$user->api_key}}</p>
                </div>
            </div>
        </div>
    </div>
</div>
