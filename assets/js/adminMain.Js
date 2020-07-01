;(function () {

    // Delete article button
    $(".deleteNewsBtn").on("click", (e) => {
        let tar = $(e.target);
        let newsID = tar.attr('newsid');
        let validate = confirm("Voulez-vous vraiment supprimer cet article ?");
        if (validate) {
            let Url = '/phpBlog/admin/delete/' + newsID;
            $.ajax({ url: Url,
                data: {action: ''},
                type: 'post',
                success: function(output) {
                    document.location.reload(true)
                }
            });
        }
    })

    // Delete comment button
    $(".deleteComBtn").on("click", (e) => {
        let tar = $(e.target);
        let comID = tar.attr('comID');

        let validate = confirm("Voulez-vous vraiment supprimer ce commentaire ?");
        if (validate) {
            let Url = '/phpBlog/admin/deleteComment/' + comID;
            $.ajax({ url: Url,
                data: {action: ''},
                type: 'post',
                success: function(output) {
                    document.location.reload(true)
                }
            });
        }
    })
    
    // Add color to comment cards
    let commentList = $(".comCards");
    commentList.each((i, elt) => {
        let reports = $(elt).attr('reports');
        let percent = Math.floor(((reports * 4)*255/100))
        let g = Math.floor(255-percent);
        let r = Math.floor(percent)
        $(elt).css('background-color', 'rgb('+r+', '+g+', 0, 0.3)');
    });

}());