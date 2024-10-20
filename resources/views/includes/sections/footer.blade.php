<br>
<br>
</div>
<!-- Footer -->
<footer class="sticky-footer bg-white">
    <div class="container my-auto">
        <div class="copyright text-center my-auto">
            <span>copyright &copy;
                <script>
                    document.write(new Date().getFullYear());
                </script>
                {{-- <b><a href="https://indrijunanda.gitlab.io/" target="_blank">indrijunanda</a></b> --}}
            </span>
        </div>
    </div>
</footer>
<!-- Footer -->
</div>
</div>

<!-- Scroll to top -->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>
<!-- JS (place this before the closing </body> tag) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.11.6/umd/popper.min.js"
    integrity="sha384-oBqDVmMz4fnFO9gybGPFQcJLc+2onE7GZO6XA5lF7UrFJe0vg3Bb0YYT6Stm+5Vv" crossorigin="anonymous">
</script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/js/bootstrap.min.js"
    integrity="sha384-cu2+mzxA4yuc4pTaa+z1RZfRJUpgLf26PqzzymM5r7dALQi2A4zWc8GxEjkSw+h0" crossorigin="anonymous">
</script>


<!-- Bootstrap JS and dependencies -->
{{-- <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script> --}}
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="{{ asset('admin/js/js.js') }}"></script>
<script src="{{ asset('admin/js/vendor/jquery.min.js') }}"></script>
<script src="{{ asset('admin/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('admin/js/vendor/jquery.easing.min.js') }}"></script>
<script src="{{ asset('admin/js/ruang-admin.min.js') }}"></script>
@stack('scripts')
