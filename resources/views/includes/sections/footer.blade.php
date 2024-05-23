
      </div>
      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>copyright &copy; <script> document.write(new Date().getFullYear()); </script> 
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

  <script src="{{ asset('admin/js/js.js')}}"></script>
  <script src="{{ asset('admin/js/vendor/jquery.min.js')}}"></script>
  <script src="{{ asset('admin/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{ asset('admin/js/vendor/jquery.easing.min.js')}}"></script>
  <script src="{{ asset('admin/js/ruang-admin.min.js')}}"></script>
   @stack('scripts')