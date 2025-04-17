<!doctype html>
<html lang="en">
  <!--begin::Head-->
  @include('admin.partials.link')
  <!--end::Head-->
  <!--begin::Body-->
  <body class="layout-fixed sidebar-expand-lg bg-body-tertiary">
    <!--begin::App Wrapper-->
    <div class="app-wrapper">
      <!--begin::Header-->
      @include('admin.partials.navbar')
      <!--end::Header-->
      <!--begin::Sidebar-->
      @include('admin.partials.sidebar')
      <!--end::Sidebar-->
      <!--begin::App Main-->
      <main class="app-main">
        @yield('content')
      </main>
      <!--end::App Main-->
      <!--begin::Footer-->
      @include('admin.partials.footer')
      <!--end::Footer-->
    </div>

   @include('admin.partials.scripts')

  </body>
  <!--end::Body-->
</html>
