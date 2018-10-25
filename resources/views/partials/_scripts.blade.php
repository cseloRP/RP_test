<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
<script id="dsq-count-scr" src="//rpscms.disqus.com/count.js" async></script>

{!! app('html')->script('js/smartphoto.min.js') !!}
{!! app('html')->script('js/jquery.lazy.min.js') !!}


<script>
    document.addEventListener('DOMContentLoaded',function(){
        new SmartPhoto(".gallery-image",{
            resizeStyle: 'fit'
        });
    });

    $(function() {
        $('.lazy').lazy();
    });
</script>