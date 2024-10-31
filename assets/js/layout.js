;
    // Get data from backend
    
    
    var layout = wp_proshots_image_layout_data.image_layout;
    //var margin = wp_proshots_image_layout_data.image_margin;
    //console.log(margin);
    console.log(wp_proshots_image_layout_data.image_layout)

    // Library Initialized

    var InfiniteGrid = eg.InfiniteGrid;

    const ig = new InfiniteGrid(".my-container", {
        isOverflowScroll: false,
        horizontal: false,
        useFit: false,
        useRecycle: true,
        
    });

        // Check condition to select layout type

        if (layout == 'gridlayout') {
            var gridlayout = InfiniteGrid.GridLayout;

            ig.setLayout(gridlayout, {
                margin: 10,
                align: "center",
            });
            
            console.log('Grid Layout Applied');   
        } 

        else if (layout == 'justifiedlayout') {
            var justifiedlayout = InfiniteGrid.JustifiedLayout;

            ig.setLayout(justifiedlayout, {
                margin: 10,
                column: [1,wp_proshots_image_layout_data.image_column],
            });

            console.log('Justified Layout Applied');
        }


        else if (layout == 'squarelayout') {
            var squarelayout = InfiniteGrid.SquareLayout;

            ig.setLayout(squarelayout, {
                margin: 10,
                column: 3,
            });

            console.log('Square Layout Applied');
        }



        ig.layout();


        //deferimg('img.attachment-post-thumbnail size-post-thumbnail wp-post-image', 100);