<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<script src="https://rawgit.com/padolsey/jQuery-Plugins/master/sortElements/jquery.sortElements.js"></script>
<script>
    var domain = document.location.origin;
     $(".remove-product").click(function(){
        var id = $(this).data('id');
        if(confirm('Are you sure to remove this product ?'))
        {
            $.ajax({
               url: domain + '/product/delete_product.php',
               type: 'GET',
               data: {id: id},
               error: function() {
                  alert('Something is wrong');
               },
               success: function(data) {
                    window.location.href = domain + '/index.php'
               }
            });
        }
    });
    $(".remove-user").click(function(){
        var id = $(this).data('id');
        if(confirm('Are you sure to remove this user ?'))
        {
            $.ajax({
               url: domain + '/user/delete_user.php',
               type: 'GET',
               data: {id: id},
               error: function() {
                  alert('Something is wrong');
               },
               success: function(data) {
                    window.location.href = domain + '/user'
               }
            });
        }
    });
</script>
<script>
    var table = $('table');
    
    $('#title_header, #price_header')
        .each(function(){
            
            var th = $(this),
                thIndex = th.index(),
                inverse = false;
            
            th.click(function(){
                table.find('td').filter(function(){
                    
                    return $(this).index() === thIndex;
                    
                }).sortElements(function(a, b){
                    
                    return $.text([a]) > $.text([b]) ?
                        inverse ? -1 : 1
                        : inverse ? 1 : -1;
                    
                }, function(){
                    
                    // parentNode is the element we want to move
                    return this.parentNode; 
                    
                });
                
                inverse = !inverse;
                    
            });
                
        });

</script>
</body>
</html>