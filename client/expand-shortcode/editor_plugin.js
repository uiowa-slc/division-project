


( function() {

    tinymce.create( 'tinymce.plugins.expander_plugin', {
        /**
         * @param {tinymce.Editor} editor Editor instance that the plugin is initialized in.
         * @param {string} url Absolute URL to where the plugin is located.
         */
        init : function( editor, url ) {
            //alert(url);
            editor.addButton( 'expander-button', {
                title: editor.getLang( 'expander.tooltip', 'Insert Expanding Content' ),
                cmd: 'add_accordion',
                image: url + '/icon.png'
                // icon: 'info'
            } );

            editor.addCommand( 'add_accordion', function(){

                editor.windowManager.open( {
                    title: 'Insert Expanding Content',
                    body: [

                            {
                                type: 'textbox',
                                name: 'title',
                                label: 'Heading',
                            },
                            {
                                type: 'textbox',
                                name: 'content',
                                label: 'Content',
                                minWidth: 300,
                                minHeight: 200,
                                multiline: true
                            },

                    ],
                    onsubmit: function( e ) {
                        editor.insertContent( '[expand title="' + e.data.title + '"]<br />error');
                        editor.insertContent( e.data.content);
                        editor.insertContent( '[/expand]<br />');
                        console.log(e.data.content);
                    }
                });

                // editor.execCommand( 'mceInsertContent', false, clear_placeholder );
            } );

            editor.on( 'BeforeSetContent', function( event ) {
                 if ( event.content ) {

                    event.content = event.content.replace(new RegExp('\r?\n','g'), '<br />');
                    // console.log(event.content);
                //     var re_clear_html = new RegExp( clear_html, 'g' );
                //     var re_clear_html_no_semicolon = new RegExp( clear_html_no_semicolon, 'g' );
                //     event.content = event.content.replace( re_clear_html, clear_placeholder );

                //     *
                //      * Under certain circumstances, TinyMCE will strip the semicolon from `<br style="clear: both;">.
                //      * Also replace this.
                     
                //     event.content = event.content.replace( re_clear_html_no_semicolon, clear_placeholder );
                //     /**
                //      * Replace `<div style="clear: (left|right|both);"></div>` with placeholder too.
                //      * This HTML markup has been used until version 1.1.
                //      */
                //     event.content = event.content.replace( /<div style="clear:(.+?)"><\/div>/g, clear_placeholder );
                }
            });

            editor.on( 'PostProcess', function( event ) {
                // if ( event.get ) {
                //     event.content = event.content.replace( /<img[^>]+>/g, function( image ) {
                //         var string;

                //         if ( image.indexOf( 'mce-tinymce-clear-float' ) !== -1 ) {
                //             string = clear_html;
                //         }
                //         return string || image;
                //     } );
                // }
            } );
        },

    } );

    // Register plugin
    tinymce.PluginManager.add( 'expander', tinymce.plugins.expander_plugin );
} )();