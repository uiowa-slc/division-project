


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
                                maxWidth: 300,
                                minHeight: 200,
                                multiline: true
                            },
                            {
                              type: 'label', // component type
                              level: 'info',
                              text: 'Formatting, images, and links can be added after clicking OK',

                            }

                    ],
                    onsubmit: function( e ) {
                        
                        var content = 
                        '<div>[expand title="' + e.data.title + '"]<div>' + e.data.content +'</div>[/expand]</div>';

                        editor.insertContent(content);
                        

                        // console.log(content);
                    }
                });

                // editor.execCommand( 'mceInsertContent', false, clear_placeholder );
            } );

            editor.on( 'BeforeSetContent', function( event ) {
                 if ( event.content ) {

                    // event.content = event.content.replace(new RegExp('\r?\n','g'), '<br />');

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