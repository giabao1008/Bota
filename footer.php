<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<script>
    var domain = document.location.origin;
     $(".remove").click(function(){
        var id = $(this).data('id');
        if(confirm('Are you sure to remove this product ?'))
        {
            $.ajax({
               url: domain + '/delete_product.php',
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
</script>
</body>
</html>