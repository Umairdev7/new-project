<!DOCTYPE html>
<html lang="en">
<head>

	<title>Profile Page</title>

	<!-- Required meta tags always come first -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="x-ua-compatible" content="ie=edge">

	<!-- Main Font -->
    <script src="js/libs/webfontloader.min.js"></script>
    <script>
        WebFont.load({
            google: {
                families: ['Roboto:300,400,500,700:latin']
            }
        });
    </script>

	<!-- Bootstrap CSS -->
	<link rel="stylesheet" type="text/css" href="{{ asset('Bootstrap/dist/css/bootstrap-reboot.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('Bootstrap/dist/css/bootstrap.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('Bootstrap/dist/css/bootstrap-grid.css') }}">

	<!-- Main Styles CSS -->
	<link rel="stylesheet" type="text/css" href="{{ asset('css/main.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('css/fonts.min.css') }}">

    {{-- Dropify  --}}
    {{-- <link rel="stylesheet" href="dist/css/demo.css"> --}}
    <link rel="stylesheet" href="dist/css/dropify.min.css">
    <link rel="stylesheet" href="dist/css/dropify.css">
    {{-- End Dropify  --}}

    {{-- Dropzone --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.3/min/dropzone.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.3/min/dropzone.min.js"></script>
    {{-- End Dropzone --}}

</head>
<body class="page-has-left-panels page-has-right-panels">



<!-- Preloader -->

{{-- @include('partial.preloader') --}}

<!-- ... end Preloader -->


@include('partial.sidebar_left')


@include('partial.sidebar_right')


@include('partial.header')


<div class="header-spacer"></div>

@yield('content')

<!-- Window-popup Update Header Photo -->
@include('partial.update_header_photo')

<!-- Playlist Popup -->
@include('partial.playlist')

<a class="back-to-top" href="#">
	<img src="{{ asset('svg-icons/back-to-top.svg') }}" alt="arrow" class="back-icon">
</a>

<!-- Window-popup-CHAT for responsive min-width: 768px -->
@include('partial.chat')


<!-- JS Scripts -->
<script src="{{ asset('/js/jQuery/jquery-3.4.1.js') }}"></script>
<script src="{{ asset('/js/libs/jquery.appear.js') }}"></script>
<script src="{{ asset('/js/libs/jquery.mousewheel.js') }}"></script>
<script src="{{ asset('/js/libs/perfect-scrollbar.js') }}"></script>
<script src="{{ asset('/js/libs/jquery.matchHeight.js') }}"></script>
<script src="{{ asset('/js/libs/svgxuse.js') }}"></script>
<script src="{{ asset('/js/libs/imagesloaded.pkgd.js') }}"></script>
<script src="{{ asset('/js/libs/Headroom.js') }}"></script>
<script src="{{ asset('/js/libs/velocity.js') }}"></script>
<script src="{{ asset('/js/libs/ScrollMagic.js') }}"></script>
<script src="{{ asset('/js/libs/jquery.waypoints.js') }}"></script>
<script src="{{ asset('/js/libs/jquery.countTo.js') }}"></script>
<script src="{{ asset('/js/libs/popper.min.js') }}"></script>
<script src="{{ asset('/js/libs/material.min.js') }}"></script>
<script src="{{ asset('/js/libs/bootstrap-select.js') }}"></script>
<script src="{{ asset('/js/libs/smooth-scroll.js') }}"></script>
<script src="{{ asset('/js/libs/selectize.js') }}"></script>
<script src="{{ asset('/js/libs/swiper.jquery.js') }}"></script>
<script src="{{ asset('/js/libs/moment.js') }}"></script>
<script src="{{ asset('/js/libs/daterangepicker.js') }}"></script>
<script src="{{ asset('/js/libs/fullcalendar.js') }}"></script>
<script src="{{ asset('/js/libs/isotope.pkgd.js') }}"></script>
<script src="{{ asset('/js/libs/ajax-pagination.js') }}"></script>
<script src="{{ asset('/js/libs/ajax-pagination.js') }}"></script>
<script src="{{ asset('/js/libs/Chart.js') }}"></script>
<script src="{{ asset('/js/libs/chartjs-plugin-deferred.js') }}"></script>
<script src="{{ asset('/js/libs/circle-progress.js') }}"></script>
<script src="{{ asset('/js/libs/loader.js') }}"></script>
<script src="{{ asset('/js/libs/run-chart.js') }}"></script>
<script src="{{ asset('/js/libs/jquery.magnific-popup.js') }}"></script>
<script src="{{ asset('/js/libs/jquery.gifplayer.js') }}"></script>
<script src="{{ asset('/js/libs/mediaelement-and-player.js') }}"></script>
<script src="{{ asset('/js/libs/mediaelement-playlist-plugin.min.js') }}"></script>
<script src="{{ asset('/js/libs/sticky-sidebar.js') }}"></script>
<script src="{{ asset('/js/libs/ion.rangeSlider.js') }}"></script>
<script src="{{ asset('/js/libs/leaflet.js') }}"></script>
<script src="{{ asset('/js/libs/MarkerClusterGroup.js') }}"></script>

<script src="{{ asset('/js/main.js') }}"></script>
<script src="{{ asset('/js/libs-init/libs-init.js') }}"></script>
<script defer src="{{ asset('/fonts/fontawesome-all.js') }}"></script>

<script src="{{ asset('/Bootstrap/dist/js/bootstrap.bundle.js') }}"></script>

{{-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function () {

    // Upload Photo → Trigger File Input
    $('.upload-photo-item').first().on('click', function (e) {
        e.preventDefault();
        $('#fileInput').click();
    });

    // File Selected → Preview + AJAX Upload
    $('#fileInput').on('change', function () {
        let file = this.files[0];
        if (!file) return;

        let reader = new FileReader();
        reader.onload = function (e) {
            $('#headerImage').attr('src', e.target.result);
        };
        reader.readAsDataURL(file);

        let formData = new FormData($('#uploadForm')[0]);
        formData.append('_token', $('meta[name="csrf-token"]').attr('content'));

        $.ajax({
            url: "{{ route('update.header') }}",
            type: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            success: function () {
                $('#update-header-photo').modal('hide');
            },
            error: function () {
                alert('Upload failed.');
            }
        });
    });

    // Confirm from My Photos
    $('#choose-from-my-photo .btn.btn-primary').on('click', function (e) {
        e.preventDefault();
        let selectedImg = $('#choose-from-my-photo input[type=radio]:checked')
            .closest('label')
            .find('img')
            .attr('src');

        if (!selectedImg) {
            alert('Please select a photo.');
            return;
        }

        $('#headerImage').attr('src', selectedImg);

        $.ajax({
            url: "{{ route('update.header') }}",
            type: 'POST',
            data: {
                _token: $('meta[name="csrf-token"]').attr('content'),
                photo_url: selectedImg
            },
            success: function () {
                $('#choose-from-my-photo').modal('hide');
            },
            error: function () {
                alert('Failed to update from library.');
            }
        });
    });

});
</script> --}}

<script>
    $(document).ready(function() {
    // Handle the "Update Header Photo" modal
    $('#update-header-photo .upload-photo-item').on('click', function(e) {
        e.preventDefault();
        if ($(this).hasClass('disabled')) return;

        if ($(this).data('target') === '#choose-from-my-photo') {
            $('#update-header-photo').modal('hide');
            $('#choose-from-my-photo').modal('show');
        } else {
            // This would be the "Upload Photo" option
            triggerFileUpload();
        }
    });

    // Handle photo selection in "Choose from My Photos" tab
    $('#choose-from-my-photo .custom-radio input').on('change', function() {
        // Enable the confirm button when a photo is selected
        $('#choose-from-my-photo .btn-primary').removeClass('disabled');
    });

    // Handle album selection in "Albums" tab
    $('#choose-from-my-photo .choose-photo-item figure').on('click', function() {
        // In a real app, this would open the album to show photos
        // For demo, we'll just enable the confirm button
        $('#choose-from-my-photo .btn-primary').removeClass('disabled');
    });

    // Confirm photo selection
    $('#choose-from-my-photo .btn-primary').on('click', function(e) {
        e.preventDefault();
        if ($(this).hasClass('disabled')) return;

        // Get the selected photo (simplified for demo)
        let selectedPhoto;
        if ($('#home').hasClass('active')) {
            selectedPhoto = $('#choose-from-my-photo .custom-radio input:checked').closest('.custom-radio').find('img').attr('src');
        } else {
            // For albums, we'd need more complex logic to get the actual photo
            selectedPhoto = $('#choose-from-my-photo .choose-photo-item figure img').first().attr('src');
        }

        // Update the header photo (simplified for demo)
        if (selectedPhoto) {
            $('.profile-header').css('background-image', 'url(' + selectedPhoto + ')');
            showSuccessMessage('Header photo updated successfully!');
        }

        // Close the modal
        $('#choose-from-my-photo').modal('hide');
    });

    // Cancel button
    $('#choose-from-my-photo .btn-secondary').on('click', function(e) {
        e.preventDefault();
        $('#choose-from-my-photo').modal('hide');
    });

    // Function to trigger file upload
    function triggerFileUpload() {
        // Create a file input element
        const fileInput = $('<input type="file" accept="image/*" style="display: none;">');

        fileInput.on('change', function() {
            if (this.files && this.files[0]) {
                const reader = new FileReader();

                reader.onload = function(e) {
                    // Update the header photo
                    $('.profile-header').css('background-image', 'url(' + e.target.result + ')');
                    showSuccessMessage('Header photo updated successfully!');
                };

                reader.readAsDataURL(this.files[0]);
            }
        });

        // Trigger the file selection dialog
        fileInput.trigger('click');
    }

    // Helper function to show success message
    function showSuccessMessage(message) {
        // In a real app, you might use a toast notification
        alert(message); // Simplified for demo
    }
});
</script>

        {{-- Dropify  --}}
        <script src="dist/js/dropify.min.js"></script>
        <script src="dist/js/dropify.js"></script>
        <script>
            $(document).ready(function(){
                // Basic
                $('.dropify').dropify();

                // Translated
                $('.dropify-fr').dropify({
                    messages: {
                        default: 'Glissez-déposez un fichier ici ou cliquez',
                        replace: 'Glissez-déposez un fichier ou cliquez pour remplacer',
                        remove:  'Supprimer',
                        error:   'Désolé, le fichier trop volumineux'
                    }
                });

                // Used events
                var drEvent = $('#input-file-events').dropify();

                drEvent.on('dropify.beforeClear', function(event, element){
                    return confirm("Do you really want to delete \"" + element.file.name + "\" ?");
                });

                drEvent.on('dropify.afterClear', function(event, element){
                    alert('File deleted');
                });

                drEvent.on('dropify.errors', function(event, element){
                    console.log('Has Errors');
                });

                var drDestroy = $('#input-file-to-destroy').dropify();
                drDestroy = drDestroy.data('dropify')
                $('#toggleDropify').on('click', function(e){
                    e.preventDefault();
                    if (drDestroy.isDropified()) {
                        drDestroy.destroy();
                    } else {
                        drDestroy.init();
                    }
                })
            });
        </script>
        {{-- End Dropify  --}}

        {{-- Dropzone --}}
        <script>
Dropzone.options.postDropzone = {
    autoProcessQueue: false,     // don't upload right away
    paramName: "images",         // Laravel will see this as "images[]"
    uploadMultiple: true,
    parallelUploads: 5,
    maxFilesize: 2,              // MB
    acceptedFiles: 'image/*',
    addRemoveLinks: true,
    dictDefaultMessage: "Drop images here or click to upload 📸",

    init: function () {
        let myDropzone = this;
        let submitButton = document.querySelector("#submit-all");

        submitButton.addEventListener("click", function (e) {
            e.preventDefault();
            e.stopPropagation();
            myDropzone.processQueue();
        });

        // send text area value with each file
        this.on("sending", function(file, xhr, formData) {
            formData.append("body", document.querySelector("textarea[name=body]").value);
        });

        this.on("successmultiple", function(files, response) {
            window.location.reload(); // refresh page to show new post, or redirect
        });
    }
};
</script>
        {{-- End Dropzone --}}


</body>
</html>
