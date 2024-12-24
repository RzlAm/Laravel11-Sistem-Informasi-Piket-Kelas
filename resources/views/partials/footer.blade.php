<footer class="bg-dark text-white">
  <div class="container-fluid py-5 text-center">
    <div class="row">
      <p>Made with ❤️ by <a href="https://www.instagram.com/rzlam_in/" target="_blank">@rzlam_in</a></p>
    </div>
  </div>
</footer>

<script src="{{ config('app.url') }}/bootstrap/js/bootstrap.min.js"></script>
<script>
  document.addEventListener('DOMContentLoaded', function() {
    var toastElements = document.querySelectorAll('.toast');
    toastElements.forEach(function(toastElement) {
      var toast = new bootstrap.Toast(toastElement);
      toast.show();
    });
  });
</script>
</body>

</html>
</body>

</html>
