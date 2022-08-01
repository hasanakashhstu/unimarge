<div>
    @push('styles')
        <style>
            .tox-notification {
                display: none !important
            }

        </style>
    @endpush

    <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>

    <script>
        const tinymceHelper = {
            init: function(selector) {
                tinymce.init({
                    selector: selector,
                    plugins: [
                        'advlist autolink lists link image charmap print preview',
                        'searchreplace fullscreen',
                        'insertdatetime table paste image wordcount'
                    ],
                    toolbar: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
                    image_title: true,
                    automatic_uploads: true,
                    file_picker_types: 'image',
                    // URL of our upload handler (for more details check: https://www.tiny.cloud/docs/configure/file-image-upload/#images_upload_url)
                    file_picker_callback: function(cb, value, meta) {
                        let input = document.createElement('input');
                        input.setAttribute('type', 'file');
                        input.setAttribute('accept', 'image/*');

                        /*
                            Note: In modern browsers input[type="file"] is functional without
                            even adding it to the DOM, but that might not be the case in some older
                            or quirky browsers like IE, so you might want to add it to the DOM
                            just in case, and visually hide it. And do not forget do remove it
                            once you do not need it anymore.
                        */

                        input.onchange = function() {
                            let file = this.files[0];

                            let reader = new FileReader();
                            reader.onload = function() {
                                /*
                                    Note: Now we need to register the blob in TinyMCEs image blob
                                    registry. In the next release this part hopefully won't be
                                    necessary, as we are looking to handle it internally.
                                */

                                let formData, imageOldUrl;
                                imageOldUrl = document.querySelector(
                                    'div[class=tox-control-wrap] > input[type=url]').value;
                                formData = new FormData();
                                formData.append('image', file);
                                formData.append('imageOldUrl', imageOldUrl);
                                formData.append('_token', "{{ csrf_token() }}");
                                $.ajax({
                                        type: 'POST',
                                        url: "{{ route('tinymce.uploadImage') }}",
                                        data: formData,
                                        processData: false,
                                        contentType: false,
                                    })
                                    .done(function(data) {
                                        swal({
                                            title: '',
                                            text: 'Successfully image uploaded.',
                                            icon: 'success',
                                        });

                                        cb(data.imageUrl, {
                                            title: file.name
                                        });
                                    })
                                    .fail(function(data) {
                                        try {
                                            let errors = JSON.parse(data.responseText)
                                                .errors;

                                            if (errors.image) {
                                                swal({
                                                    title: '',
                                                    text: errors.image[0],
                                                    icon: 'error',
                                                });
                                            } else if (errors.imageOldUrl) {
                                                swal({
                                                    title: '',
                                                    text: errors.imageOldUrl[0],
                                                    icon: 'error',
                                                });
                                            } else {
                                                swal({
                                                    title: '',
                                                    text: 'Something went wrong. Please, reload the page!',
                                                    icon: 'error',
                                                });
                                            }
                                        } catch (error) {
                                            swal({
                                                title: '',
                                                text: error.message,
                                                icon: 'error',
                                            });
                                        }
                                    });

                            };
                            reader.readAsDataURL(file);
                        };

                        input.click();
                    },
                });
            },
        };
    </script>

</div>
