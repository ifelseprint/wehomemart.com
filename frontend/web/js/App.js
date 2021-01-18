(function ($) {
	"use strict";

	var App = function () {
		var o = this; // Create reference to this instance
		$(document).ready(function () {
			o.initialize();
		}); // Initialize app when document is ready

	};
	var p = App.prototype;

	// =========================================================================
	// INIT
	// =========================================================================

	p.initialize = function () {
		// Init events
		this._eventModalView();
		this._eventModalMember();
		this._eventModalQuotation();
	};

	p.initializeInPjax = function() {
        this._eventModalMember();
        this._eventModalQuotation();
	};

	// =========================================================================
	// EVENT GOBAL MODAL
	// =========================================================================
    p._eventModalView = function () {
        $(".btn-modal-view").click(function() {
            $('#loadingOverlay').show();
            $('#modal-view')
                .find('#modal-content-view')
                .load($(this).attr('value'),function () {
                	
                    $('#modal-view').modal('show');
                    $('#loadingOverlay').hide();
            });
        });
    };

    p._eventModalMember = function () {
        $(".btn-modal-member").click(function() {
            $('#loadingOverlay').show();
            $('#modal-member')
                .find('#modal-content-member')
                .load($(this).attr('value'),function () {
                	
                    $('#modal-member').modal('show');
                    $('#loadingOverlay').hide();
            });
        });

        $('.submit-member').click(function (e){

            var form = $('#formMember');
            form.validate({
                errorElement: 'div',
                errorPlacement: function (error, element) {
                    error.addClass('invalid-feedback');
                    if(element.attr('type')=='checkbox'){
                        element.parent().next().append(error);
                    }else{
                        element.next().append(error);
                    }
                },
                highlight: function (element, errorClass, validClass) {
                    $(element).addClass('is-invalid');
                },
                unhighlight: function (element, errorClass, validClass) {
                    $(element).removeClass('is-invalid');
                }
            });


            if(form.valid()) {
                $('.submit-member').attr('disabled','disabled').find("i").removeClass('fa fa-floppy-o').addClass('fa fa-spin fa-spinner');
                $('#loadingOverlay').show();
                $.ajax({
                    url    : form.attr('action'),
                    type   : form.attr('method'),
                    data   : new FormData(form[0]),
                    enctype: 'multipart/form-data',
                    processData: false,
                    contentType: false,
                    success: function (response) 
                    {
                    	$('.submit-member').removeAttr('disabled').find("i").removeClass('fa fa-spin fa-spinner').addClass('fa fa-floppy-o');
                        $('#loadingOverlay').hide();

                        var dataJson = $.parseJSON(response);
                        if(dataJson.status==true){
						    Swal.fire(
				        		'Success!',
				        		dataJson.response,
				        		'success'
				        	).then(function(){
				        		location.reload();
				        	});
                        }else{

				        	var html = '';
				        	$.each(dataJson.response, function( index, value ) {
				        		if(typeof value[0] !== "undefined" && value[0]!=='' && value[0]!==null){
				        			html += value[0]+'<br>';
				        		}
				        	});

				        	Swal.fire({
					            title: 'Error!',
					            html:
					            '<code>'+html+'</code>',
					            type: 'error',
					        });
                        }
                        
                    },
                    error  : function () 
                    {
                        console.log('internal server error');
                    }
                });
            }
        });

        $('.submit-member-login').click(function (e){

            var form = $('#formMemberLogin');
            form.validate({
                errorElement: 'div',
                errorPlacement: function (error, element) {
                    error.addClass('invalid-feedback');
                    if(element.attr('type')=='checkbox'){
                        element.parent().next().append(error);
                    }else{
                        element.next().append(error);
                    }
                },
                highlight: function (element, errorClass, validClass) {
                    $(element).addClass('is-invalid');
                },
                unhighlight: function (element, errorClass, validClass) {
                    $(element).removeClass('is-invalid');
                }
            });


            if(form.valid()) {
                $('.submit-member-login').attr('disabled','disabled').find("i").removeClass('fa fa-floppy-o').addClass('fa fa-spin fa-spinner');
                $('#loadingOverlay').show();
                $.ajax({
                    url    : form.attr('action'),
                    type   : form.attr('method'),
                    data   : new FormData(form[0]),
                    enctype: 'multipart/form-data',
                    processData: false,
                    contentType: false,
                    success: function (response) 
                    {
                    	$('.submit-member-login').removeAttr('disabled').find("i").removeClass('fa fa-spin fa-spinner').addClass('fa fa-floppy-o');
                        $('#loadingOverlay').hide();

                        var dataJson = $.parseJSON(response);

                        if(dataJson.status==true){
						    Swal.fire(
				        		'Success!',
				        		dataJson.response,
				        		'success'
				        	).then(function(){
				        		location.reload();
				        	});
                        }else{

				        	var html = dataJson.response;
				        	Swal.fire({
					            title: 'Error!',
					            html:
					            '<code>'+html+'</code>',
					            type: 'error',
					        });
                        }
                        
                    },
                    error  : function () 
                    {
                        console.log('internal server error');
                    }
                });
            }
        });

    };
    p._eventModalQuotation = function () {

    	$(".checked_delivery").click(function() {
    		var checked_delivery = $(this).val();
    		if(checked_delivery=='2'){
    			$("#box-delivery").show();
    			$("#box-delivery input.required").attr('required',true);
    		}else{
    			$("#box-delivery").hide();
    			$("#box-delivery input").attr('required',false);
    		}
    	});

    	$(".btn-modal-quotation").click(function() {
            $('#loadingOverlay').show();
            $('#modal-quotation')
                .find('#modal-content-quotation')
                .load($(this).attr('value'),function () {
                    $('#modal-quotation').modal('show');
                    $('#loadingOverlay').hide();
            });
        });

        $('.submit-quotation').click(function (e){

            var form = $('#formQuotation');
            form.validate({
                errorElement: 'div',
                errorPlacement: function (error, element) {
                    error.addClass('invalid-feedback');
                    if(element.attr('type')=='checkbox' || element.attr('type')=='radion'){
                        element.parent().next().append(error);
                    }else{
                        element.next().append(error);
                    }
                },
                highlight: function (element, errorClass, validClass) {
                    $(element).addClass('is-invalid');
                },
                unhighlight: function (element, errorClass, validClass) {
                    $(element).removeClass('is-invalid');
                }
            });


            if(form.valid()) {
                $('.submit-quotation').attr('disabled','disabled').find("i").removeClass('fa fa-floppy-o').addClass('fa fa-spin fa-spinner');
                $('#loadingOverlay').show();
                $.ajax({
                    url    : form.attr('action'),
                    type   : form.attr('method'),
                    data   : new FormData(form[0]),
                    enctype: 'multipart/form-data',
                    processData: false,
                    contentType: false,
                    success: function (response) 
                    {
                    	$('.submit-quotation').removeAttr('disabled').find("i").removeClass('fa fa-spin fa-spinner').addClass('fa fa-floppy-o');
                        $('#loadingOverlay').hide();

                        var dataJson = $.parseJSON(response);
                        if(dataJson.status==true){
						    Swal.fire(
				        		'Success!',
				        		dataJson.response,
				        		'success'
				        	).then(function(){
				        		location.reload();
				        	});
                        }else{

				        	var html = '';
				        	$.each(dataJson.response, function( index, value ) {
				        		if(typeof value[0] !== "undefined" && value[0]!=='' && value[0]!==null){
				        			html += value[0]+'<br>';
				        		}
				        	});

				        	Swal.fire({
					            title: 'Error!',
					            html:
					            '<code>'+html+'</code>',
					            type: 'error',
					        });
                        }
                        
                    },
                    error  : function () 
                    {
                        console.log('internal server error');
                    }
                });
            }
        });

    };

    p.OnlyNumbers = function(e) {
    	var keynum;
    	var keychar;
    	var numcheck;

    	if(window.event)
    	{
    		keynum = e.keyCode;
    	}
    	else if(e.which)
    	{
    		keynum = e.which;
    	}
    	if(keynum != 8){
    		keychar = String.fromCharCode(keynum);
    		numcheck = /\d/;
    		return numcheck.test(keychar);
    	}
    }
	// =========================================================================
	// DEFINE NAMESPACE
	// =========================================================================

	window.appWEHOME = window.appRI || {};
	window.appWEHOME.App = new App;
}(jQuery)); // pass in (jQuery):
