<x-layout>
    <div class="container mt-5">
        <div class="row justify-content-center pt-5">
            <div class="col-12 text-center pt-5 pb-4">
                <h1 class="display-4">Accedi</h1>
            </div>
        </div>
        <div class="row justify-content-center align-items-center height-custom">
            <div class="col-12 col-md-6">
                <form class="bg-body-tertiary shadow-lg rounded p-5" action="{{ route('login') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="loginEmail" class="form-label">Email </label>
                        <div class="input-group">
                            <div class="import-group-addon border border-1 border-body-tertiary rounded-start-2">
                                <i class="bi bi-envelope-at-fill fs-4 p-3"></i>
                            </div>
                            <input type="email" class="form-control @error('email') is-invalid @enderror"
                                id="loginEmail" name="email">
                            @error('email')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <div class="input-group">
                            <div class="import-group-addon border border-1 border-body-tertiary rounded-start-2">
                                <i class="bi bi-key-fill fs-4 p-3"></i>
                            </div>
                            <input type="password" class="form-control @error('password') is-invalid @enderror"
                                id="password" name="password">
                            @error('password')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="d-flex justify-content-center">
                        <button type="submit" class="btn btn-dark">Accedi</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</x-layout>
