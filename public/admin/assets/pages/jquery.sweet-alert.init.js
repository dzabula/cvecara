
/**
* Theme: Syntra - Bootstrap 4 Web App kit
* Author: Mannat-themes
* SweetAlert
*/
function writeMoney(value) {
   
    const formatted = value.toLocaleString('en-US', { maximumFractionDigits: 0 });
    return formatted.replace(/,/g, '.') + " RSD";
}


!function ($) {
    "use strict";

    var SweetAlert = function () {
    };

    //examples
    SweetAlert.prototype.init = function () {

        //Basic
        $('#sa-basic').on('click', function () {
            swal('Any fool can use a computer').catch(swal.noop)
        });

        //A title with a text under
        $('#sa-title').click(function () {
            swal(
                'The Internet?',
                'That thing is still around?',
                'question'
            )
        });

        //Success Message
        $('.sa-success').click(function () {
            var current = $(this)
            let id = $(this).attr("data-id")
            let idStatus = $(this).attr("data-status-id")

            $.ajax({
                url:urlToChangeStatusInvoice,
                method:"PATCH",
                dataType:"JSON",
                data:{
                    "id":id,
                    "id_status":idStatus,
                    "_token":csrf
                },
                success:function(data){
                    var price = $("#total-price-"+id).text();
                    var totalProfit = $("#total-profit").attr("data-profit");
                    var price_ = price.replace(".", "").replace(",","");
                    var totalProfit_ = totalProfit.replace(".", "").replace(",","");
                    
                    console.log("data",data);
                    console.log("price",price);
                    console.log("totalProfit",totalProfit);
                    console.log("price_",price_);
                    console.log("totalPRofit_",totalProfit_);
                    if(data.status == "Isporuceno"){
                        console.log("Uslo u 'Isporuceno'");
                        $("#total-profit").html(writeMoney(parseFloat(totalProfit_) + parseFloat(price_)));
                        $("#total-profit").attr("data-profit",parseFloat(totalProfit_) + parseFloat(price_))
                    }
                    else if(data.status == "Nije poslato"){
                        console.log("Uslo u 'Nije poslato'")
                        $("#total-profit").html(writeMoney(parseFloat(totalProfit_) - parseFloat(price_)));
                        $("#total-profit").attr("data-profit",parseFloat(totalProfit_) - parseFloat(price_))

                    }


                    var txt = data.status == "Nije poslato" ? "Posalji" : ( data.status == "Isporuceno" ? "Isporuceno" : "Isporuci");
                    $("#status-"+id).html(data.status);
                    current.html(txt);
                    current.attr("data-status-id",data.id)
                    swal(
                        {
                            title: 'Akcija je uspeno izvrsena',
                            text: '',
                            type: 'success',
                            confirmButtonColor: '#4fa7f3'
                        }
                    )
                },
                error:function(xhr){
                    console.log(xhr)
                    swal(
                        'Problem!',
                        'Greksa prilikom izmene statusa. Kontaktirajte glavnog administratora',
                        'error'
                    )

                }
            })

        });

        //Warning Message
        $('.sa-warning').click(function () {
            let id = $(this).attr("data-id")
            var currentObj = $(this);
            console.log(id)
            swal({
                title: 'Da li ste sigurni ?',
                text: "",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#4fa7f3',
                cancelButtonColor: '#d57171',
                confirmButtonText: 'Da, obrisi'
            }).then(function () {

                $.ajax({
                    url:urlToDeleteInvoice,
                    method:"POST",
                    dataType:"JSON",
                    data:{
                        "id":id,
                      "_token":csrf
                    },
                    success:function(data){
                        if(currentObj.attr("data-item-type") =="product"){
                            currentObj.html("Vrati na stanje");
                        }else {
                            currentObj.parent().parent().remove();
                            console.log("uspesno")
                            swal(
                                'Izbrisano!',
                                'Porudzbina je uspesno izbrisana.',
                                'success'
                            )
                        }
                    },
                    error:function(xhr){
                        console.log(xhr)
                        swal(
                            'Problem!',
                            'Greksa prilikom brisanja. Kontaktirajte glavnog administratora',
                            'error'
                        )

                    }
                })
            })
        });

        //Parameter
        $('#sa-params').click(function () {
            swal({
              title: 'Are you sure?',
              text: "You won't be able to revert this!",
              type: 'warning',
              showCancelButton: true,
              confirmButtonColor: '#3085d6',
              cancelButtonColor: '#d33',
              confirmButtonText: 'Yes, delete it!',
              cancelButtonText: 'No, cancel!',
              confirmButtonClass: 'btn btn-success',
              cancelButtonClass: 'btn btn-danger',
              buttonsStyling: false,
              reverseButtons: true
            }).then((result) => {
              if (result.value) {
                swal(
                  'Deleted!',
                  'Your file has been deleted.',
                  'success'
                )
              // result.dismiss can be 'cancel', 'overlay',
              // 'close', and 'timer'
              } else if (result.dismiss === 'cancel') {
                swal(
                  'Cancelled',
                  'Your imaginary file is safe :)',
                  'error'
                )
              }
            })
        });



        //Auto Close Timer
        $('#sa-close').click(function () {
            swal({
                title: 'Auto close alert!',
                text: 'I will close in 2 seconds.',
                timer: 2000
            }).then(
                function () {
                },
                // handling the promise rejection
                function (dismiss) {
                    if (dismiss === 'timer') {
                        console.log('I was closed by the timer')
                    }
                }
            )
        });

        //custom html alert
        $('#custom-html-alert').click(function () {
            swal({
                title: '<i>HTML</i> <u>example</u>',
                type: 'info',
                html: 'You can use <b>bold text</b>, ' +
                '<a href="//coderthemes.com/">links</a> ' +
                'and other HTML tags',
                showCloseButton: true,
                showCancelButton: true,
                confirmButtonClass: 'btn btn-success',
                cancelButtonClass: 'btn btn-danger m-l-10',
                confirmButtonText: '<i class="fa fa-thumbs-up"></i> Great!',
                cancelButtonText: '<i class="fa fa-thumbs-down"></i>'
            })
        });

        //Custom width padding
        $('#custom-padding-width-alert').click(function () {
            swal({
                title: 'Custom width, padding, background.',
                width: 600,
                padding: 100,
                background: '#fff url(//subtlepatterns2015.subtlepatterns.netdna-cdn.com/patterns/geometry.png)'
            })
        });

        //Ajax
        $('#ajax-alert').click(function () {
            swal({
                title: 'Submit email to run ajax request',
                input: 'email',
                showCancelButton: true,
                confirmButtonText: 'Submit',
                showLoaderOnConfirm: true,
                confirmButtonClass: 'btn btn-success',
                cancelButtonClass: 'btn btn-danger m-l-10',
                preConfirm: function (email) {
                    return new Promise(function (resolve, reject) {
                        setTimeout(function () {
                            if (email === 'taken@example.com') {
                                reject('This email is already taken.')
                            } else {
                                resolve()
                            }
                        }, 2000)
                    })
                },
                allowOutsideClick: false
            }).then(function (email) {
                swal({
                    type: 'success',
                    title: 'Ajax request finished!',
                    html: 'Submitted email: ' + email
                })
            })
        });

        //chaining modal alert
        $('#chaining-alert').click(function () {
            swal.setDefaults({
                input: 'text',
                confirmButtonText: 'Next &rarr;',
                showCancelButton: true,
                animation: false,
                progressSteps: ['1', '2', '3']
            })

            var steps = [
                {
                    title: 'Question 1',
                    text: 'Chaining swal2 modals is easy'
                },
                'Question 2',
                'Question 3'
            ]

            swal.queue(steps).then(function (result) {
                swal.resetDefaults()
                swal({
                    title: 'All done!',
                    html: 'Your answers: <pre>' +
                    JSON.stringify(result) +
                    '</pre>',
                    confirmButtonText: 'Lovely!',
                    showCancelButton: false
                })
            }, function () {
                swal.resetDefaults()
            })
        });

        //Error
        $('#sa-error').on('click', () => {
        swal('Oops...', 'Something went wrong!', 'error')
        })

        //long-text

        $('#long-text').on('click', () => {
            swal({
              imageUrl: './assets/images/general/robot.jpg',
              imageHeight: 1512,
              imageAlt: 'A tall image'
            })
          })

        //position

        $('#position').on('click', () => {
             swal({
              position: 'top-end',
              type: 'success',
              title: 'Your work has been saved',
              showConfirmButton: false,
              timer: 1500
            })
          })

        //custom-image

         $('#custom-image').on('click', () => {
            swal({
              title: 'Sweet!',
              text: 'Modal with a custom image.',
              imageUrl: 'https://unsplash.it/400/200/?random',
              imageWidth: 400,
              imageHeight: 200,
              imageAlt: 'Custom image',
              animation: false
            })
          })
         //custom-width-padding-background

         $('#custom-img-bg').on('click', () => {
            swal({
              title: 'Custom width, padding, background.',
              width: 600,
              padding: 100,
              background: '#fff url(https://bit.ly/1Nqn9HU)'
            })
          })


        //Danger
        $('#dynamic-alert').click(function () {
            swal.queue([{
                title: 'Your public IP',
                confirmButtonText: 'Show my public IP',
                text: 'Your public IP will be received ' +
                'via AJAX request',
                showLoaderOnConfirm: true,
                preConfirm: function () {
                    return new Promise(function (resolve) {
                        $.get('https://api.ipify.org?format=json')
                            .done(function (data) {
                                swal.insertQueueStep(data.ip)
                                resolve()
                            })
                    })
                }
            }])
        });


    },
        //init
        $.SweetAlert = new SweetAlert, $.SweetAlert.Constructor = SweetAlert
}(window.jQuery),

//initializing
    function ($) {
        "use strict";
        $.SweetAlert.init()
    }(window.jQuery);
