@extends('includes.layouts.supervisor')

@section('page-title', 'Reports')

@section('content')
<style>
    .gallery {
        display: flex;
        flex-wrap: wrap;
        justify-content: flex-start;
    }

    .image-container {
        margin: 10px;
        flex: 0 1 300px; /* Adjust to control the width of each report card */
        max-width: 300px;
        height: 200px;
        overflow: hidden;
        position: relative;
    }

    .weekly-reports-container {
        display: flex;
        flex-wrap: wrap;
        gap: 20px; /* Spacing between cards */
        justify-content: flex-start;
    }

    .weekly-report-card {
        flex: 0 1 calc(25% - 20px); /* 4 cards per row */
        max-width: calc(25% - 20px); /* Ensure they fit nicely */
        margin-bottom: 20px; /* Add some space at the bottom */
    }

    /* Ensure the layout is responsive */
    @media (max-width: 1200px) {
        .weekly-report-card {
            flex: 0 1 calc(33.333% - 20px); /* 3 cards per row on medium screens */
            max-width: calc(33.333% - 20px);
        }
    }

    @media (max-width: 768px) {
        .weekly-report-card {
            flex: 0 1 calc(50% - 20px); /* 2 cards per row on smaller screens */
            max-width: calc(50% - 20px);
        }
    }

    @media (max-width: 576px) {
        .weekly-report-card {
            flex: 0 1 100%; /* 1 card per row on extra small screens */
            max-width: 100%;
        }
    }
</style>

<div class="container-fluid" id="container-wrapper">
    <div class="row justify-content-start">
        <div class="col">
            {{-- Loop through students --}}
            @foreach ($students as $student)
                <h1 class="mb-3 border p-3 border">{{ $student->fullname }}'s Weekly Reports</h1>
            @endforeach

            @php
                // Group images by week number
                $groupedImages = $images->groupBy('week_number');
            @endphp

            @if($groupedImages->isEmpty())
                {{-- If no reports found --}}
                <div class="alert alert-warning">
                    <h4>No reports found for this student.</h4>
                </div>
                <a href="{{ url()->previous() }}" class="btn btn-secondary">Back</a>
            @else
                {{-- Weekly reports arranged from left to right --}}
                <div class="weekly-reports-container">
                    {{-- Loop through each week --}}
                    @foreach ($groupedImages as $week => $imagesForWeek)
                        <div class="card weekly-report-card">
                            <h5 class="card-header text-white" style="background-color: #4267B2;">Week {{ $week }}</h5>
                            <div class="card-body">
                                @if($imagesForWeek->isEmpty())
                                    <p>No images available for Week {{ $week }}.</p>
                                @else
                                    {{-- Show only the first image as a thumbnail --}}
                                    @php
                                        $firstImage = $imagesForWeek->first();
                                    @endphp
                                    <div class="image-container">
                                        <img src="{{ asset('storage/' . $firstImage->file_path) }}" alt="Image" class="img-fluid" style="width: 100%; height: 100%; object-fit: cover;" 
                                            data-toggle="modal" 
                                            data-target="#weekModal" 
                                            data-week="{{ $week }}">
                                    </div>

                                    {{-- Add description section below thumbnail --}}
                                    <div class="mt-2">
                                        <p>{{ $firstImage->activity_description }}</p>
                                    </div>

                                    {{-- Button to view more images --}}
                                    <a href="{{ route('supervisor.interns.summary', [$firstImage->student_id, $firstImage->day_no, $firstImage->day, $firstImage->week_number]) }}" 
                                        class="btn btn-block mt-3 text-light" 
                                        style="background-color: #4267B2;">
                                        View Reports for Week {{ $week }}
                                     </a>
                                     
                                    
                                    
                                    
                                @endif
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>
    </div>
</div>


<!-- Modal for displaying all images for the week -->
<div class="modal fade" id="weekModal" tabindex="-1" aria-labelledby="weekModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="weekModalLabel">Images</h5>
            </div>
            <div class="modal-body">
                <div class="gallery d-flex flex-wrap justify-content-start" id="weekImagesGallery">
                    <!-- Images will be dynamically injected here -->
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    document.querySelectorAll('button[data-week]').forEach(button => {
        button.addEventListener('click', function() {
            const week = this.getAttribute('data-week');
            const imagesForWeek = @json($groupedImages); // Inject all images grouped by week
            const weekImages = imagesForWeek[week]; // Get images for this week

            const galleryContainer = document.getElementById('weekImagesGallery');
            galleryContainer.innerHTML = ''; // Clear the gallery

            weekImages.forEach(image => {
                const imgElement = document.createElement('img');
                imgElement.src = '/storage/' + image.file_path;
                imgElement.classList.add('img-fluid', 'm-2');
                imgElement.style.width = '200px'; // Set size for images in the modal
                imgElement.style.height = '200px';
                imgElement.style.objectFit = 'cover';

                galleryContainer.appendChild(imgElement);
            });
        });
    });
</script>

@endsection
