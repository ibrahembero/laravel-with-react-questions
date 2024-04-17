<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Show All Questions') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h1>Show All Questions</h1>
                    {{ __("You're here to list all questions !") }}
                </div>
                @if ($questions->count() > 0)
                    <ul class="list-group">
                        @foreach ($questions as $question)
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                <span class="badge bg-primary rounded-pill">{{ $question->question_title}}</span>
                            </li>
                        @endforeach
                    </ul>

         @else
            <div class="alert alert-info">There are no questions yet.</div>
        @endif
            </div>
        </div>
    </div>
</x-app-layout>
