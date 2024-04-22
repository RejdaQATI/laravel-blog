<x-app-layout>
    <section class="max-w-3xl mx-auto">
        <header class="mb-6">
            <h2 class="text-xl font-semibold text-gray-900 dark:text-gray-100">
                {{ __('Détails du Post') }}
            </h2>
        </header>

        <div class="bg-white dark:bg-gray-800 shadow sm:rounded-lg p-6">
            <div>
                <p class="font-semibold">Titre du Post:</p>
                <p>{{ $post->title }}</p>
            </div>

            <div class="mt-4">
                <p class="font-semibold">Contenu:</p>
                <p>{{ $post->content }}</p>
            </div>

            <div class="mt-4">
                <p class="font-semibold">Description:</p>
                <p>{{ $post->description }}</p>
            </div>

            <div class="mt-4">
                <p class="font-semibold">Catégories:</p>
                <ul>
                    @foreach($post->categories as $category)
                        <li>{{ $category->title }}</li>
                    @endforeach
                </ul>
            </div>

            <div class="mt-4">
                <p class="font-semibold">Auteur:</p>
                <p>{{ $post->author->name }}</p>
            </div>

        </div>
    </section>
</x-app-layout>
