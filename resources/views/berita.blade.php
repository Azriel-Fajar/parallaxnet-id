<x-app-layout cssFile="berita">
    <main>
        <div class="container">
            <x-back-button :href="route('home')" />
            <x-news />
        </div>
    </main>
</x-app-layout>
