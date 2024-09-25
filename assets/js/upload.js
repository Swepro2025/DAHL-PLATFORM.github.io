var infinite_news_file_frame;

jQuery(function($){

    // Uploads
    jQuery(document).on('click', 'input.select-img', function( event ){
        var $this = $(this);

        event.preventDefault();

        var InfiniteNewsImage = wp.media.controller.Library.extend({
            defaults :  _.defaults({
                id: 'author-insert-image',
                title: $this.data('uploader_title'),
                allowLocalEdits: false,
                displaySettings: true,
                displayUserSettings: false,
                multiple : false,
                library: wp.media.query({ type: 'image' })
            }, wp.media.controller.Library.prototype.defaults)
        });

        // Create the media frame.
        infinite_news_file_frame = wp.media.frames.infinite_news_file_frame = wp.media({
            button: {
                text: jQuery(this).data('uploader_button_text'),
            },
            state: 'author-insert-image',
            states: [
                new InfiniteNewsImage()
                ],
            multiple: false  // Set to true to allow multiple files to be selected
        });

        // When an image is selected, run a callback.
        infinite_news_file_frame.on('select', function() {
            var state = infinite_news_file_frame.state('author-insert-image');
            var selection = state.get('selection');
            var display = state.display(selection.first()).toJSON();
            var obj_attachment = selection.first().toJSON();
            display = wp.media.string.props(display, obj_attachment);

            var imageField = $this.siblings('.img');
            var imgurl = display.src;

            // Copy image URL
            imageField.val(imgurl);

            // Trigger change event on the image field to update the customize-preview panel
            imageField.trigger('change');
        });

        // Finally, open the modal
        infinite_news_file_frame.open();
    });

});
