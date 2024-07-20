<div class="tm-video-wrapper">
      <i id="tm-video-control-button" class="fas fa-pause"></i>
      <video autoplay muted loop id="tm-video">
          <source src="{{asset('assets/video/wave-cafe-video-bg.mp4')}}" type="video/mp4">
      </video>
  </div>

  <script src="{{ asset('assets/js/jquery-3.4.1.min.js') }}"></script>    
<script>
  $(document).ready(function() {

function setVideoSize() {
  const vidWidth = 1920;
  const vidHeight = 1080;
  const windowWidth = window.innerWidth;
  const windowHeight = window.innerHeight;
  const tempVidWidth = windowHeight * vidWidth / vidHeight;
  const tempVidHeight = windowWidth * vidHeight / vidWidth;
  const newVidWidth = Math.max(tempVidWidth, windowWidth);
  const newVidHeight = Math.max(tempVidHeight, windowHeight);

  $('#tm-video').css({ width: newVidWidth, height: newVidHeight });
}

function openTab(evt, id) {
  $('.tm-tab-content').hide();
  $('#' + id).show();
  $('.tm-tab-link').removeClass('active');
  $(evt.currentTarget).addClass('active');
}

function initPage() {
  let pageId = location.hash || sessionStorage.getItem('activePage');
  if (pageId) {
    console.log('Page ID:', pageId); // Debug statement
    highlightMenu($(`.tm-page-link[href="${pageId}"]`));
    showPage($(pageId));
  } else {
    pageId = $('.tm-page-link.active').attr('href');
    showPage($(pageId));
  }
}

function highlightMenu(menuItem) {
  $('.tm-page-link').removeClass('active');
  menuItem.addClass('active');
}

function showPage(page) {
  console.log('Showing page:', page.attr('id')); // Debug statement
  $('.tm-page-content').hide();
  page.show();
}

$('.tm-page-link').click(function(event) {
  if (window.innerWidth > 991) event.preventDefault();
  highlightMenu($(this));
  showPage($(this.hash));
  sessionStorage.setItem('activePage', this.hash);
});

$('.tm-tab-link').click(function(e) {
  e.preventDefault();
  openTab(e, $(this).data('id'));
});

$('.tm-tab-link.active').click();

setVideoSize();
let resizeTimeout;
$(window).resize(function() {
  clearTimeout(resizeTimeout);
  resizeTimeout = setTimeout(setVideoSize, 100);
});

$("#tm-video-control-button").click(function() {
  const video = document.getElementById("tm-video");
  if (video.paused) {
    video.play();
    $(this).removeClass().addClass("fas fa-pause");
  } else {
    video.pause();
    $(this).removeClass().addClass("fas fa-play");
  }
});
});

</script>
