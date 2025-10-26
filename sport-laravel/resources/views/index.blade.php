@extends('layout')

@section('title', 'Liste des Exercices de Musculation')

@section('mainSection')
<div class="max-w-6xl mx-auto px-4 mt-10 text-center">
    <h1 class="text-4xl font-extrabold text-blue-700 mb-8">Exercices de Musculation</h1>

    <!-- Filtre par catégorie -->
    <div class="mb-8">
        <label for="categoryFilter" class="block text-gray-700 font-medium mb-2">Filtrer par catégorie :</label>
        <select id="categoryFilter"
                class="w-full sm:w-64 mx-auto border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500 p-2">
            <option value="">Toutes les catégories</option>
            @foreach($categories as $category)
                <option value="{{ $category }}">{{ $category }}</option>
            @endforeach
        </select>
    </div>

    <!-- Liste des exercices -->
    <div id="exercisesList" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 justify-items-center">
        @foreach($exercices as $exercice)
            <div class="exercise-card bg-white rounded-2xl shadow hover:shadow-lg transition-all duration-200 overflow-hidden w-full sm:w-72"
                    data-category="{{ $exercice->category }}">
                <div class="p-5 flex flex-col h-full">
                    <div class="flex flex-col items-center">
                        <h5 class="text-xl font-semibold text-gray-800">{{ $exercice->name }}</h5>
                        <span class="mt-2 bg-blue-100 text-blue-700 text-sm font-medium px-3 py-1 rounded-full">
                            {{ $exercice->category }}
                        </span>
                    </div>
                    <p class="text-gray-600 mt-3 flex-grow text-center">{{ Str::limit($exercice->description, 100) }}</p>
                    <div class="mt-4 flex justify-center gap-2">
                        <a href="{{ route('show', $exercice) }}"
                            class="text-center border border-blue-500 text-blue-600 font-medium px-3 py-2 rounded-lg hover:bg-blue-50 transition">
                            Voir
                        </a>
                        <a href="{{ route('edit', $exercice) }}"
                            class="text-center border border-gray-400 text-gray-700 font-medium px-3 py-2 rounded-lg hover:bg-gray-100 transition">
                            Modifier
                        </a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    @if($exercices->isEmpty())
        <div class="mt-8 p-4 bg-blue-50 border border-blue-200 text-blue-800 rounded-lg text-center">
            Aucun exercice trouvé.
            <a href="{{ route('create') }}" class="underline font-medium">Créez le premier !</a>
        </div>
    @endif
</div>

<script>
document.getElementById('categoryFilter').addEventListener('change', function() {
    const selectedCategory = this.value;
    const exerciseCards = document.querySelectorAll('.exercise-card');
    
    exerciseCards.forEach(card => {
        card.style.display = (!selectedCategory || card.getAttribute('data-category') === selectedCategory)
            ? 'block'
            : 'none';
    });
});
</script>
@endsection
