
<x-app-layout>
    <section class="max-w-3xl mx-auto">
        <header class="mb-6">
            <h2 class="text-xl font-semibold text-gray-900 dark:text-gray-100">
                {{ __('Détails de la Catégorie') }}
            </h2>
        </header>
        <div class="bg-white dark:bg-gray-800 shadow sm:rounded-lg p-6">
            <div>
                <p class="font-semibold">Titre de la Catégorie:</p>
                <p>{{ $category->title }}</p>
            </div>
    
            <div class="mt-4">
                <p class="font-semibold">Description:</p>
                <p>{{ $category->description }}</p>
            </div>
    
            <div class="mt-4">
                <p class="font-semibold">Image:</p>
                @if($category->image)
                    <img src="{{ asset('images/' . $category->image) }}" alt="Category Image" class="mx-auto mt-4 rounded-lg">
                @else
                    <p class="text-red-500">Aucune image disponible</p>
                @endif
            </div>
        </div>
    </section>
</x-app-layout>