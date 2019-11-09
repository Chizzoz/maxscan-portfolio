(function($) {
    "use strict";

    $(document).ready(function(){


        $(document).on('click', '.fa_tb_close', function(e){
            var $self = $(this);
            tb_remove();
            $('.themify_search').val('');
            $('.themify_search').trigger('change');
        });

        $(document).on('keyup change', '.themify_search', function() {
            var searchVal = $(this).val();
            var filterItems = $('li.fa_grab_init[data-icon]');

            if ( searchVal != '' ) {
                filterItems.addClass('hidden');
                $('li.fa_grab_init[data-icon*="' + searchVal.toLowerCase() + '"]').removeClass('hidden');
            } else {
                filterItems.removeClass('hidden');
            }
        });

        $(document).on('click', '.fa_grab_init', function(e){
            e.preventDefault();

            var $self = $(this),
                $icon = $self.attr('data-icon'),
                $id = $self.closest('.fa-all-thing-wrapper').attr('input-id');

                $self.addClass('active_fa').siblings().removeClass('active_fa');
                if ( "none" == $icon ) {
                    $('#'+$id).val('');
                    $('#'+$id).prev('.thickbox_special').find('span').html(logisticoWLocalize.select_icon);
                } else {
                    $('#'+$id).val($icon);
                    $('#'+$id).prev('.thickbox_special').find('span').html('<i class="fa '+$icon+'" aria-hidden="true"></i>');
                }
                
                $('.fa_sepcial_wfield').trigger('change');

        })


        $(document).on('click', '.thickbox_special', function(e) {
            e.preventDefault();

            var wrap_parent = $(this).closest('.logistico-repeater-info-wrapper'),
                data_type = wrap_parent.attr('data-field-id');
            
            if( data_type === "social_links" ) {
                var $self = $(this),
                $all_icons = $('#fa_all_markup_wrap'),
                $fa_markup = $all_icons.find('.fa-all-thing-wrapper'),
                $the_id_el = $(this).next('.fa_append_element'),
                $input = $self.closest('.single-widget-icon-wrapper').find('.fa_sepcial_wfield'),
                $input_id = $input.attr('id'),
                $input_val = $input.val(),
                $the_id = $the_id_el.attr('id');

                $the_id_el.append($fa_markup);

                tb_show("", "#TB_inline?&width=753&height=700&inlineId="+$the_id+"");

                if ( $input_val.length > 0 && "none" != $input_val  ) {
                    $('.active_fa').removeClass('active_fa');
                    $fa_markup.find('li[data-icon="'+$input_val+'"]').addClass('active_fa')
                }
                $('#TB_window').addClass('pixiefy-TB_window');
                $fa_markup.attr('input-id', $input_id).clone().appendTo("#TB_ajaxContent");
                return false;
            } else {
                var $self = $(this),
                $parent = $self.closest('.single-widget-icon-wrapper'),
                $img = $parent.find('img'),
                $remover = $parent.find('.sl-widget-media-remove'),
                $input = $parent.find('.sl_media_input');
            
                var file_frame = wp.media.frames.file_frame = wp.media({
                    title: logisticoWLocalize.upload,
                    library: {
                        type: 'image'
                    },
                    button: {
                        text: logisticoWLocalize.select_img
                    },
                    multiple: false
                });
                
                file_frame.on('select', function(){
                    var attachment = file_frame.state().get('selection').first().toJSON();
                    $input.val(attachment.url);
                    if ( $img.length ) {
                        $img.attr('src', attachment.url);
                    } else {
                        $self.before('<div class="repeater-thumb-wrap"><img src="' + attachment.url + '"></div>');
                    }
                    if ( $remover.length ) {
                        $remover.css('display', 'inline-block');
                    } else {
                        $self.after('<button style="display: inline-block;" class="sl-widget-media-remove button">'+ logisticoWLocalize.logisticoWLocalize +'</button>');
                    }
                    $input.trigger('change');
                });
                
                file_frame.open();
            }
            
        });

        // jQuery ui sortable init
        $( ".logistico-repeater-info" ).sortable({
            stop:function(event, ui) {
                $('.logistico_special-wfield').trigger('change');
            }
        });
        $( ".logistico-repeater-info" ).disableSelection();

        // Changed repater title
        $(document).on('change paste keyup', 'input.sl-repater-title-in', function(){
            var $value = $(this).val(),
                $i_index = $(this).closest('.single-repeater-field-wrap').index() + 1,
                $item = $(this).closest('.single-repeater-field-wrap').find('.single-repater-title');

            if ( $value.length > 0 && $value.length > 25 ) {
                $value = $value.substr(0, 25) + '...';
            }

            if ( $value.length > 0 ) {
                $item.html( $value );
            } else {
                $item.html( 'Item #<span class="repeater_num">'+ $i_index +'</span>' );
            }
        })

        // Remove repeater single
        $(document).on('click', '.repeater-control-remove', function(e){
            e.preventDefault();

            var $self = $(this),
                $item = $self.closest('.single-repeater-field-wrap');

            $item.slideUp("normal", function(){ 
                $(this).remove(); 

                $('.logistico-repeater-info').find('.single-repeater-field-wrap').each(function(index){
                    var $current = $(this),
                        $number = $current.find('.repeater_num'),
                        $wrapper = $current.closest('.logistico-repeater-info-wrapper'),
                        $the_field_id = $wrapper.attr('data-field-id'),
                        $inputs = $current.find('input');

                        var $set_index = index + 1;

                        if ($number.length) {
                            $number.text($set_index);
                        }
                        $inputs.each(function(){
                            var $name = $(this).attr('name');
                            var changed_name = $name.replace(/\["+the_field_id+"](\[(.*?)\])/g, "["+the_field_id+"]["+index+"]")
                            $(this).attr('name', changed_name);
                        });
                        $('.logistico_special-wfield').trigger('change');
                });
            });

            return false;
        })

        // Add new repeater group
        $(document).on('click', '.logistico-widget-add-item', function(e){
            e.preventDefault();
            var $self = $(this),
                $widget = $self.closest('.widget.open'),
                $widget_id = $widget.attr('id'),
                $wrapper = $self.closest('.logistico-repeater-info-wrapper'),
                $the_widget_id = $wrapper.attr('data-id-name'),
                $the_field_id = $wrapper.attr('data-field-id'),
                $placeholder = $wrapper.attr('data-placeholder'),
                $subtitle_placeholder = $wrapper.attr('data-subtitle-placeholder'),
                $widget_arr = $widget_id.split($the_widget_id+"-").reverse(),
                $unique_id = $widget_arr[0],
                
                $container = $wrapper.find('.logistico-repeater-info'),
                $open = $container.find('.repater_open'),
                $item = $container.find('.single-repeater-field-wrap');

            var $index = 0;
            if ($item.length) {
                $index = $item.length;

                $item.each(function(i){
                    var $current = $(this);
                    if($current.find('.repater_open').length) {
                        $current.find('.repater_open').removeClass('repater_open').next('.single-repater-content').slideUp();
                    }
                });
            }

            var wrap_parent = $self.closest('.logistico-repeater-info-wrapper'),
            data_type = wrap_parent.attr('data-field-id');

            var $sub_title = '<input type="text" class="sl-repater-sub_title-in" placeholder="'+$subtitle_placeholder+'" name="widget-'+$the_widget_id+'['+$unique_id+']['+$the_field_id+']['+$index+'][sub_title]">';

            if( data_type === "social_links" ) {
                $sub_title = '';
            }
            
            var $num_index = $index + 1;
             $container.append('<div class="single-repeater-field-wrap"><div class="single-repater-title widget-'+$the_widget_id+'-'+$unique_id+'-'+$the_field_id+'-'+$index+'-title">'+ logisticoWLocalize.item +' #<span class="repeater_num">'+$num_index+'</span></div><div class="single-repater-content"><div class="single-widget-icon-wrapper"><a class="button thickbox_special"><span>'+ logisticoWLocalize.select_icon +'</span></a> <input class="widget-'+$the_widget_id+'-'+$index+'-thumb fa_sepcial_wfield sl_media_input" id="widget-'+$the_widget_id+'-'+$unique_id+'-'+$the_field_id+'-'+$index+'-thumb-id" name="widget-'+$the_widget_id+'['+$unique_id+']['+$the_field_id+']['+$index+'][thumb]" type="hidden" value=""/><div class="fa_append_element" id="contact_info_icons-widget-'+$the_widget_id+'-'+$unique_id+'-'+$the_field_id+'-'+$index+'-thumb-id" style="display: none"></div><br /><br /></div> <input type="text" class="sl-repater-title-in" placeholder="'+$placeholder+'" name="widget-'+$the_widget_id+'['+$unique_id+']['+$the_field_id+']['+$index+'][title]"> '+$sub_title+'<div class="repater-alighment"> <button type="button" class="button-link button-link-delete repeater-control-remove">'+ logisticoWLocalize.delete +'</button></div></div></div>').find('.widget-'+$the_widget_id+'-'+$unique_id+'-'+$the_field_id+'-'+$index+'-title').addClass('repater_open').next('.single-repater-content').slideDown();
            return false;
        });

        // Repeater field accordion
        $(document).on('click', '.single-repater-title', function(e){
            e.preventDefault();

            var $self = $(this),
                $parent = $self.closest('.single-repeater-field-wrap'),
                $wrapper = $self.closest('.logistico-repeater-info'),
                $siblings = $wrapper.find('.repater_open');

            if( $self.hasClass('repater_open') ) {
                $self.removeClass('repater_open');
                $self.next('.single-repater-content').slideUp();
            } else {
                $siblings.removeClass('repater_open').next('.single-repater-content').slideUp();
                $self.addClass('repater_open');
                $self.next('.single-repater-content').slideDown();
            }
            return false;
        });

        // Media file upload init
        $(document).on('click', '.sl-widget-up-btn', function(e){
            e.preventDefault();
            
            var $self = $(this),
                $parent = $self.closest('.single-widget-uploader'),
                $img = $parent.find('img'),
                $remover = $parent.find('.sl-widget-media-remove'),
                $input = $parent.find('.sl_media_input');
            
            var file_frame = wp.media.frames.file_frame = wp.media({
                title: logisticoWLocalize.upload,
                library: {
                    type: 'image'
                },
                button: {
                    text: logisticoWLocalize.select_img
                },
                multiple: false
            });
            
            file_frame.on('select', function(){
                var attachment = file_frame.state().get('selection').first().toJSON();
                $input.val(attachment.url);
                if ( $img.length ) {
                    $img.attr('src', attachment.url);
                } else {
                    $parent.append('<img src="' + attachment.url + '">');
                }
                if ( $remover.length ) {
                    $remover.css('display', 'inline-block');
                } else {
                    $self.after('<button style="display: inline-block;" class="sl-widget-media-remove button" data-url="'+ logisticoWLocalize.home_url +'">'+ logisticoWLocalize.remove_img +'</button>');
                }
                $input.trigger('change');
            });
            
            file_frame.open();
            
        });

        // Media remove
        $(document).on('click', '.sl-widget-media-remove', function(e){
            e.preventDefault();

            var $self = $(this),
                $parent = $self.closest('.single-widget-uploader');

                if( $self.closest('.single-widget-icon-wrapper').length ) {
                    $parent = $self.closest('.single-widget-icon-wrapper');
                }

                var $input = $parent.find('.sl_media_input'),
                $img = $parent.find('img');

                if ( $parent.length && $img.length && $img.attr('src').length ) {
                    $img.slideUp("normal", function(){
                        $(this).remove();
                        $input.val('');
                        $self.hide();
                        $input.trigger('change');
                    });
                }

            return false;
        });

    });

})(jQuery);
