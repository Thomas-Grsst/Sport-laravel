@extends('layout')

@section('title', 'Créer un exercice')

@section('mainSection')
<div class="max-w-2xl mx-auto px-4 mt-10">
    <h1 class="text-3xl font-bold text-blue-700 mb-8 text-center">Créer un nouvel exercice</h1>
    
    <form action="{{ route('exercices.store') }}" method="POST" class="bg-white p-6 rounded-lg shadow-md">
        
        @csrf
        
        <div class="mb-4">
            <label for="name" class="block text-gray-700 font-medium mb-2">Nom de l'exercice *</label>
            <input type="text" id="name" name="name" value="{{ old('name') }}" class="w-full border border-gray-300 rounded-lg p-2 focus:ring-2 focus:ring-blue-500 focus:border-blue-500" required>
            @error('name')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label for="category" class="block text-gray-700 font-medium mb-2">Catégorie *</label>
            <select id="category" name="category"
                    class="w-full border border-gray-300 rounded-lg p-2 focus:ring-2 focus:ring-blue-500 focus:border-blue-500" required>
                <option value="">Choisir une catégorie</option>
                @foreach($categories as $category)
                    <option value="{{ $category }}" {{ old('category') == $category ? 'selected' : '' }}>
                        {{ $category }}
                    </option>
                @endforeach
            </select>
            @error('category')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label for="description" class="block text-gray-700 font-medium mb-2">Description *</label>
            <textarea id="description" name="description" rows="3" class="w-full border border-gray-300 rounded-lg p-2 focus:ring-2 focus:ring-blue-500 focus:border-blue-500" required>{{ old('description') }}</textarea>
            @error('description')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label for="image" class="block text-gray-700 font-medium mb-2">Image (URL)</label>
            <input type="url" id="image" name="image" value="{{ old('image') }}" class="w-full border border-gray-300 rounded-lg p-2 focus:ring-2 focus:ring-blue-500 focus:border-blue-500" placeholder="https://example.com/image.jpg">
        </div>

        <div class="flex gap-4 justify-center mt-6">
            <button type="submit" class="bg-blue-600 text-white font-medium px-6 py-2 rounded-lg hover:bg-blue-700 transition">
                Créer l'exercice
            </button>
            <a href="{{ route('index') }}" class="bg-gray-500 text-white font-medium px-6 py-2 rounded-lg hover:bg-gray-600 transition">
                Annuler
            </a>
        </div>
    </form>
</div>
@endsection