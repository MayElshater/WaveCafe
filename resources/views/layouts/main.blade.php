<!DOCTYPE html>
<html lang="en">
<head>
    @include('includes.head') <!-- Include your head section -->
</head>
<body>
  <div class="tm-container">
    <div class="tm-row">
      <!-- Site Header -->
      @include('includes.header') <!-- Include your header -->

      <main class="tm-main">
        @yield('content') <!-- Yield content section for dynamic content -->
      </main>

      @include('includes.footer') <!-- Include your footer -->
    </div>
  </div>
    
  <!-- Background video -->
  @include('includes.footerjs') <!-- Include your JavaScript at the end of body -->
  @yield('scripts')
</body>
</html>
