@extends('layouts.app')

@section('content')
    <h1>Create Outfit</h1>

    <form action="{{ route('outfit.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="form-group">
            <label for="name">Outfit Name</label>
            <input type="text" name="name" id="name" class="form-control" required>
        </div>

        <div class="wardrobe-container">
            @foreach ($wardrobeItems as $wardrobeItem)
                <div class="wardrobe-item">
                    <img src="{{ asset('storage/' . $wardrobeItem->image) }}" alt="{{ $wardrobeItem->name }}" class="item-image">
                    <div class="item-details">
                        <h3 class="item-name">{{ $wardrobeItem->name }}</h3>
                        <p class="item-description">{{ $wardrobeItem->description }}</p>
                        <input type="checkbox" name="wardrobe_items[]" value="{{ $wardrobeItem->id }}">
                    </div>
                </div>
            @endforeach
        </div>

        <div id="drop-area">
            <div class="upload-label">Drag and drop an image here to upload</div>
            <input type="file" name="image" id="image-input" accept="image/*" required>
            <button type="submit" id="upload-button">Create Outfit</button>
        </div>
    </form>

    <script>
        // Drag and drop functionality
        var dropArea = document.getElementById('drop-area');

        dropArea.addEventListener('dragenter', function (event) {
            event.preventDefault();
            dropArea.classList.add('drag-over');
        });

        dropArea.addEventListener('dragover', function (event) {
            event.preventDefault();
            dropArea.classList.add('drag-over');
        });

        dropArea.addEventListener('dragleave', function () {
            dropArea.classList.remove('drag-over');
        });

        dropArea.addEventListener('drop', function (event) {
            event.preventDefault();
            dropArea.classList.remove('drag-over');
            handleDrop(event.dataTransfer.files);
        });

        // Upload button functionality
        var uploadButton = document.getElementById('upload-button');
        var imageInput = document.getElementById('image-input');

        uploadButton.addEventListener('click', function () {
            imageInput.click();
        });

        imageInput.addEventListener('change', function () {
            handleDrop(imageInput.files);
        });

        // Handle dropped files
        function handleDrop(files) {
            // Perform any necessary processing or validation
        }
    </script>
@endsection
