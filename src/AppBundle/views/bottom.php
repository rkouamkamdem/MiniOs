<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"
        integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS"
        crossorigin="anonymous"></script>

<script type="text/javascript">
    $(function() {

        $('#submitFormInscription').click(function() {
            //alert('je passe par ici !!!'); return;

            //Récupération de l'url qui fera office de requête'
            var url = $(this).data('url');

            //Je récupère le contenu de mon champs email
            var email = $('#emailInscription').val(); //$(this).data('id');

            $.post(url, { email : email },function(request)
            {
                //var request = JSON.request
                //Ici je récupère mes données JSON envoyés par mon controller[AppBundle\Controller\ValidInscriptionController.php]
                var objet = eval('(' + request + ')');

                var nom = objet['user'][0]["nom"];
                var prenom = objet['user'][0]["prenom"];
                var emailResponse = objet['user'][0]["email"];
                var username = objet['user'][0]["username"];
                var password = objet['user'][0]["password"];

                if( emailResponse == email ){
                    $('#warningInscription').css({"background-color": "red", "font-size": "200%", "color": "white"});
                    //css({"background-color": "red", "font-size": "200%", "color": "white"});
                    $("p").css("color", "white");//$('#warningInscription').css("color", "#FFF");
                    $('#warningInscription').show("slow");
                    $('#warningInscription').html("<h6>Attention l'adresse mail [<b>"+email+"</b>] appartient déjà à un autre utilisateur!!!</h6>");
                    return;
                    // Prevent form submission
                    //event.preventDefault();
                }
                else
                {
                    $('#formInscriptionId').submit();
                }
                //alert('je passe par ici !!! 222 email == ['+email+'] et url == ['+url+'] '); //return;
                //alert(request);
            });
        });
    });
</script>

</body>
</html>