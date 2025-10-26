@extends('layout')

@section('title', 'Créer un nouveau exercice')

@section('mainSection')
<!-- Formulaire -->
<div class="container mx-auto mt-10 px-6 max-w-xl bg-white rounded-xl shadow-md p-8">
    <h1 class="text-3xl font-bold text-center text-blue-700 mb-6">Créer un nouveau Exercice</h1>

    <form action="{{ route('store') }}" method="POST" class="space-y-5">
    @csrf

    <div>
        <label for="name" class="block font-semibold mb-1 text-gray-700">Nom :</label>
        <input type="text" id="name" name="name" value="{{ old('name') }}" required
        class="w-full border border-gray-300 rounded-lg p-2 focus:ring-2 focus:ring-blue-400 outline-none @error('name') border-red-500 @enderror">
        @error('name') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
    </div>

    <div>
        <label for="description" class="block font-semibold mb-1 text-gray-700">Description :</label>
        <textarea id="description" name="description" rows="4" required
        class="w-full border border-gray-300 rounded-lg p-2 focus:ring-2 focus:ring-blue-400 outline-none @error('description') border-red-500 @enderror">{{ old('description') }}</textarea>
        @error('description') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
    </div>

    <div>
        <label for="image" class="block font-semibold mb-1 text-gray-700">Image (URL) :</label>
        <input type="text" id="image" name="image" value="{{ old('image') }}" required
        class="w-full border border-gray-300 rounded-lg p-2 focus:ring-2 focus:ring-blue-400 outline-none @error('image') border-red-500 @enderror">
        @error('image') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
    </div>

    <div class="mb-3">
        <label for="category" class="form-label">Catégorie *</label>
        <select class="form-select" id="category" name="category" required>
            <option value="">Choisir une catégorie</option>
            @foreach($categories as $category)
                <option value="{{ $category }}" {{ old('category') == $category ? 'selected' : '' }}>
                    {{ $category }}
                </option>
            @endforeach
        </select>
        @error('category')
            <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>

    <button type="submit" class="w-full bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 rounded-lg transition-all">➕ Créer le Exercice</button>
    </form>
</div>
@endsection