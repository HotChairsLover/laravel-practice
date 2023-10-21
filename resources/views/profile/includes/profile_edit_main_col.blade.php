<div class="row justify-content-center">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <div class="form-group">
                    <label for="name">Имя</label>
                    <input name="name" value="{{ old('name', $user->name) }}"
                           id="name"
                           type="text"
                           class="form-control"
                           minlength="3"
                           required>
                </div>
                <div class="form-group">
                    <label for="email">Почта</label>
                    <input name="email"
                           id="email"
                           class="form-control"
                           value="{{ old('email', $user->email) }}"
                           required>
                </div>
            </div>
        </div>
    </div>
</div>
