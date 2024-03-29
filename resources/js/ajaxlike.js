$(function () {
    var like = $('.balloon');
    var likePostId;
    
    like.on('click', function () {
        var $this = $(this);
        likePostId = $this.data('postid');
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: '/ajaxlike',  //routeの記述
            type: 'POST', //受け取り方法の記述（GETもある）
            data: {
                'post_id': likePostId //コントローラーに渡すパラメーター
            },
        })
        
        .click(function() {
            console.log('クリックされました！');
        })

        .on('click', function (){
            console.log('クリックされました！');
        })


        // Ajaxリクエストが成功した場合
        .done(function (data) {
            //lovedクラスを追加
            $this.toggleClass('loved'); 
            //.likesCountの次の要素のhtmlを「data.postLikesCount」の値に書き換      
            $this.next('.likesCount').html(data.postLikesCount); 
        })

        // Ajaxリクエストが失敗した場合
        .fail(function (data, xhr, err) {
            //ここの処理はエラーが出た時にエラー内容をわかるようにしておく。
            //とりあえず下記のように記述しておけばエラー内容が詳しくわかります。笑
            console.log('エラー');
            console.log(err);
            console.log(xhr);
        });
        
        return false;
    });
});