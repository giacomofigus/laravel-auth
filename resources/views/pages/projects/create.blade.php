@extends('layouts.app')

@section('content')
    <main>
        <div class=" container d-flex justify-content-center">
            <div class="mt-5 border w-50 p-5">
                <h1>Crea il tuo progetto:</h1>
                <form action="{{ route('dashboard.projects.store') }}" method="POST">
                    @csrf
                    
                    <div>
                        <label for="name" class="form-label">Nome</label>
                        <input name="name" type="text" class="form-control">
                    </div>

                    <div>
                        <label for="description" class="form-label">Descrizione</label>
                        <textarea name="description" id="description" cols="30" rows="10" class="form-control"></textarea>
                    </div>


                    <button type="submit" class="btn btn-primary mt-4">
                        Crea
                    </button>

                </form>
            </div>
        </div>
    </main>
@endsection