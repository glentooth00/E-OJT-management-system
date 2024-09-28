@extends('includes.layouts.department')

@section('page-title', 'Reports')

@section('content')
<style>
    .gallery {
    display: flex;
    flex-wrap: wrap;
    justify-content: flex-start; /* Adjust alignment as needed */
}

.image-container {
    margin: 10px; /* Space between images */
}

</style>
<div class="container-fluid" id="container-wrapper">
    <div class="row justify-content-start">
        <div class="col">
            @foreach ($students as $student)
                <h1 class="mb-3">{{ $student->fullname }}'s Weekly Reports</h1>
            @endforeach

            @php
                // Group images by week number
                $groupedImages = $images->groupBy('week_number');
            @endphp

            @foreach ($groupedImages as $week => $imagesForWeek)
                <h2 class="mt-4 bg-blue p-2 border border-primary rounded-right font-weight-bold">Week {{ $week }}</h2>
                <div class="gallery d-flex flex-wrap justify-content-start ">
                    @if($imagesForWeek->isEmpty())
                        <p>No images available for Week {{ $week }}.</p>
                    @else
                        @foreach ($imagesForWeek as $image)
                            <div class="image-container m-2" style="flex: 0 1 200px; max-width: 200px; height: 200px; overflow: hidden; position: relative; cursor: pointer;">
                                <img src="{{ asset('storage/' . $image->file_path) }}" alt="Image" class="img-fluid" style="width: 100%; height: 100%; object-fit: cover;" 
                                    data-toggle="modal" 
                                    data-target="#imageModal" 
                                    data-full="{{ asset('storage/' . $image->file_path) }}">
                                </div>
                                {{-- <div>
                                    <p>{{$image->activity_description}}</p>
                                </div> --}}
                        @endforeach
                    @endif
                </div>
            @endforeach
        </div>
    </div>
</div>

<!-- Modal for displaying full image -->
<div class="modal fade" id="imageModal" tabindex="-1" aria-labelledby="imageModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="imageModalLabel">Image</h5>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-lg-8 pull-right">
                         <img src="" id="fullImage" alt="Full Image" width="740">
                    </div>
                    <div class="col-lg-4">
                        <div>
                            @if (empty($image->activity_description))
                                <div>
                                    NO UPLOADS
                                </div>
                            @else
                                <h5>{{$image->activity_description}}</h5>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    document.querySelectorAll('.image-container img').forEach(image => {
        image.addEventListener('click', function() {
            const fullImageSrc = this.getAttribute('data-full'); // Use the data attribute for full source
            document.getElementById('fullImage').src = fullImageSrc; // Set it to the modal image
            const imageModal = new bootstrap.Modal(document.getElementById('imageModal'));
            imageModal.show(); // Show the modal
        });
    });
</script>




@endsection

