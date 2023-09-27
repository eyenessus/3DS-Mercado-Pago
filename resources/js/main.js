import $ from "jquery";

$(function () {
   
    $(window).on("message", (e) => {
        if (e.originalEvent.data.status === "COMPLETE") {
            window.location.href = "http://127.0.0.1:8000/";
        }
    });    
    $("#form-checkout").on("submit", function (event) {
        let dados = $("#form-checkout").serialize();
        if (dados) {
            $.post({
                method: "POST",
                url: "http://127.0.0.1:8000/payment",
                data: dados,
                dataType: "json",
                success: (dados) => {
                    if (
                        dados.status === "pending" &&
                        dados.status_detail === "pending_challenge"
                    ) {
                        localStorage.setItem('paymentId',dados.id)
                        doChallenge(dados)

                    } else if (dados.status === "approved") {
                        console.log("Pagamento concluido");
                    }
                },
                error: (error) => {
                    console.log(error);
                },
            });
        }
        event.preventDefault();
    });

    function doChallenge(payment) {
        try {
            const {
                status,
                status_detail,
                three_ds_info: {
                    creq,
                    external_resource_url
                },
            } = payment;
            if (status === "pending" && status_detail === "pending_challenge") {
                var iframe = document.createElement("iframe");
                iframe.name = "myframe";
                iframe.id = "myframe";
                iframe.height = "500px";
                iframe.width = "600px";
                document.body.appendChild(iframe);

                var idocument = iframe.contentWindow.document;

                var myform = idocument.createElement("form");
                myform.name = "myform";
                myform.setAttribute("target", "myframe");
                myform.setAttribute("method", "post");
                myform.setAttribute("action", external_resource_url);

                var hiddenField = idocument.createElement("input");
                hiddenField.setAttribute("type", "hidden");
                hiddenField.setAttribute("name", "creq");
                hiddenField.setAttribute("value", creq);
                myform.appendChild(hiddenField);
                iframe.appendChild(myform);

                myform.submit();
            }
        } catch (error) {
            console.log(error);
            alert("Error doing Challenge, try again later.");
        }
    }

    init();
    async function init() {
        console.log('esta chegando até aqui ')
        const id = localStorage.getItem("paymentId");
       
        try {
          const response = await fetch("https://api.mercadopago.com/v1/payments/" + id, {
            method: "GET",
            headers:{
                'Authorization': 'Bearer '
            }
          });
          const result = await response.json();
          console.log(result)
          $('#resultado').append("Pagamento " + result.id + " -> Status: " + result.status)
          if (result.status != 200) throw new Error("error getting payment");
        } catch (error) {
          console.log(error)
        }
       }
    

   
   
   
});
