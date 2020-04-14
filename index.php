<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    
    <title>Utilizando API Receita Federal</title>
  </head>
  <body>
    <div class="row">
        <div class="col-md-4">
           
        </div>
        <div class="col-md-4"><br><br>  
            <div class="form-group row">
                <div class="col-md-12">
                    <label>CNPJ</label>
                    <input type="text" onblur="checkCnpj(this.value)" class="form-control" data-mask="00.000.000/0000-00" data-mask-reverse="true" maxlength="18">
                </div>
            </div>
            <div class="form-group row">
                <div class="col-md-6">
                    <label>Razão Social</label>
                    <input type="text" id="razaosocial" class="form-control">
                </div>
                <div class="col-md-6">
                    <label>Fantasia</label>
                    <input type="text" id="fantasia" class="form-control">
                </div>
            </div>
            <div class="form-group row">
                <div class="col-md-6">
                    <label>Logradouro</label>
                    <input type="text" id="logradouro" class="form-control">
                </div>
                <div class="col-md-6">
                    <label>Número</label>
                    <input type="text" id="numero" class="form-control">
                </div>
            </div>
            <div class="form-group row">
                <div class="col-md-6">
                    <label>Município</label>
                    <input type="text" id="municipio" class="form-control">
                </div>
                <div class="col-md-6">
                    <label>UF</label>
                    <input type="text" id="uf" class="form-control">
                </div>
            </div>
            <div class="form-group row">
                <div class="col-md-6">
                    <button class="btn btn-primary">Salvar</button>
                </div>
            </div>
        </div>

        <div class="col-md-4">
           
        </div>
    </div>
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.0/jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.js"></script>
  
    <script type="text/javascript">
        function checkCnpj(cnpj){

            $.ajax({
                url:    "https://www.receitaws.com.br/v1/cnpj/"+cnpj.replace(/[^0-9]/g,'')+"",
                type:   "GET",
                dataType:"jsonp",
                //JSONP ou "JSON with padding" é um complemento ao formato de dados JSON. 
                //Ele provê um método para enviar requisições de dados de um servidor para um 
                //domínio diferente, uma coisa proibida pelos navegadores típicos por causa da 
                //Política de mesma origem.
                success: function( data ){

                    console.log(data);

                    if(data.nome == undefined){
                        alert(data.status + ' ' + data.message);
                    } else {
                        document.getElementById('razaosocial').value = data.nome;
                        document.getElementById('fantasia').value = data.fantasia;
                        document.getElementById('logradouro').value = data.logradouro;
                        document.getElementById('numero').value = data.numero;
                        document.getElementById('municipio').value = data.municipio;
                        document.getElementById('uf').value = data.uf;
                    }
                }
            });
        }
    </script>
  </body>
</html>