<!doctype html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Security Mercado Pago</title>
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
  </head>
  <body>
   

    <form id="form-checkout" action="/payment" method="POST" >
        @csrf
        <div id="form-checkout__cardNumber" class="container"></div>
        <div id="form-checkout__expirationDate" class="container"></div>
        <div id="form-checkout__securityCode" class="container"></div>
        <input type="text" id="form-checkout__cardholderName" placeholder="Titular do cartão" />
        <select id="form-checkout__issuer" name="issuer">
          <option value="" disabled selected>Banco emissor</option>
        </select>
        <select id="form-checkout__installments" name="installments">
          <option value="" disabled selected>Parcelas</option>
        </select>
        <select id="form-checkout__identificationType" name="identificationType">
          <option value="" disabled selected>Tipo de documento</option>
        </select>
        <input type="text" id="form-checkout__identificationNumber" name="identificationNumber" placeholder="Número do documento" />
        <input type="email" id="form-checkout__email" name="email" placeholder="E-mail" />
    
        <input id="token" name="token" type="hidden">
        <input id="paymentMethodId" name="paymentMethodId" type="hidden">
        <input id="transactionAmount" name="transactionAmount" type="hidden" value="100">
        <input id="description" name="description" type="hidden" value="Nome do Produto">
        <input type="submit" value="Go" id="form-checkout__submit">
       
      </form>

    





      <div id="resultado">
        <h1>Resultado</h1>
      </div>














    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
  </body>
</html>