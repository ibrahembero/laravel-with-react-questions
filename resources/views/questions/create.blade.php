<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Add Question') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h1>Add Question</h1>
                    {{ __("You're here to add question !") }}
                </div>
                <form action="{{ route('questions.store') }}" method="POST" style="padding: 20px" enctype="multipart/form-data">
                    @csrf
                    
                    <div style="margin: 10px">
                        <x-input-label for="question_title" :value="__('Question Title')" />
                        <x-text-input id="question_title" class="block mt-1 w-full" type="text" name="question_title" :value="old('question_title')" required autofocus autocomplete="question_title" />
                    </div>
                    <div style="margin: 10px">
                        <x-input-label for="image" :value="__('Image (Optional)')" />
                        <x-text-input id="image" class="block mt-1 w-full" type="file" name="image"  />
                    </div>
            
                    <button type="submit" class="btn btn-primary">Create Question</button>
                </form>
                {{-- <div class="p-6 text-gray-900">
                    {{ __("You're here to add question !") }}
                </div> --}}
            </div>
        </div>
    </div>
</x-app-layout>
